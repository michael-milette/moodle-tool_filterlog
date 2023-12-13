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
 * Plugin language strings are defined here.
 *
 * @package    tool_filterlog
 * @category   string
 * @copyright  2021 TNG Consulting Inc. {@link https://www.tngconsulting.ca}
 * @author     Michael Milette
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'FilterLog';
$string['privacy:metadata'] = 'The FilterLog plugin does not store any personal data about any user.';
$string['loglifetime_desc'] = 'This specifies the length of time you want to keep logs about the specified user activity, up to a maximum of the value set in the Standard Log settings. Older logs are automatically deleted for the specified user. Example use might be to delete log entries caused by Web Services.';
$string['userid_desc'] = 'Caution: Be absolutely sure about the Moodle id of the user whose logs you want to trim or you may accidently affect the logs and analytics for a regular user.';
$string['webservices_desc'] = 'Put in the web service functions you want to remove from the log. Separated with ,';
$string['taskcleanup'] = 'Log table user cleanup';
