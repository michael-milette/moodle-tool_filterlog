<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Standard logstore trimmer for a specific user.
 *
 * @package    tool_filterlog
 * @copyright  2021 TNG Consulting Inc. {@link https://www.tngconsulting.ca}
 * @author     Michael Milette
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace tool_filterlog\task;

defined('MOODLE_INTERNAL') || die();

class cleanup_task extends \core\task\scheduled_task {

    /**
     * Get the descriptive name for this task (visible to admins).
     *
     * @return string
     */
    public function get_name() {
        return get_string('taskcleanup', 'tool_filterlog');
    }

    /**
     * Delete standard logstore records of the specified user id.
     *
     * @return null
     */
    public function execute() {
        global $DB;

        $loglifetime = (int)get_config('tool_filterlog', 'loglifetime');
        $userid = (int)get_config('tool_filterlog', 'userid');
        $webservices = get_config('tool_filterlog', 'webservices');
        if (!isset($loglifetime) || $loglifetime < 0 || empty($userid) || $userid < 0) {
            return;
        }
        $loglifetime = time() - ($loglifetime * 86400); // Value in days 60 seconds * 60 minutes * 24 hours.
        $criteria = [
        'lifetime' => $loglifetime,
        'id' => $userid
        ];

        if (strlen($webservices) > 3) {
            $webservices = explode(",",str_replace(' ','',$webservices));
            $ws_where = [];
            $ws_ins = [];

            foreach ($webservices AS $i => $ws) {
               $ws_where['ws'.$i] = $ws;
               array_push($ws_ins,"JSON_EXTRACT(other, '$.function') = :ws$i");
            }
            $criteria = array_merge($criteria,$ws_where);
            $where = "timecreated < :lifetime AND userid = :id AND (".implode(' OR ',$ws_ins).")";
        } else {
            $where = "timecreated < :lifetime AND userid = :id";
        }
        
        $start = time();
        $end = $start + 298; // Don't want the script to abort before we finish up.
        $looptime = -1;
        $table = 'logstore_vericate_log';
        while ($min = $DB->get_field_select($table, 'MIN(timecreated)', $where , $criteria)) {
            // Delete in chunks of a day at a time to avoid long database transactions and thrashing.
            // If this cleanup plugin has just been enabled and the normal logstore standard clean-up is disabled and
            // you have years of logs, it might take a very long time to finish the trimming process, possibly even months.
            // In this case, you may want to do this manually instead and then optimize (mysql) or vaccuum (postgresql) to shrink your database table file size.
            $params = ['lifetime' => min($min + 3600 * 24, $loglifetime), 'id' => $userid];
            if (isset($ws_where)) {
                $params = array_merge($params,$ws_where);
            }
            
            $DB->delete_records_select($table, $where, $params);
            $time = time();
            if ($looptime == -1) {
                // Estimated future passes based on duration of first pass of the loop.
                $looptime = $time - $start;
            }
            if ($time > $end or $end < $time + $looptime) {
                // Exit out of loop if we don't have time for another pass.
                break;
            }
        }

        mtrace(" Deleted user log records from standard store.");
    }
}
