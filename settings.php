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
 * Plugin administration pages are defined here.
 *
 * @package    tool_filterlog
 * @category   admin
 * @copyright  2021 TNG Consulting Inc. {@link https://www.tngconsulting.ca}
 * @author     Michael Milette
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    // phpcs:ignore Generic.CodeAnalysis.EmptyStatement.DetectedIf
    $settings = new admin_settingpage('tool_filterlog',  get_string('pluginname', 'tool_filterlog'));
    $ADMIN->add('tools', $settings);

    // TODO: Define the plugin settings page - {@link https://docs.moodle.org/dev/Admin_settings}.
    $options = array(
        -1   => new lang_string('always'),
        31   => new lang_string('numdays', '', 31),
        28   => new lang_string('numdays', '', 28),
        21   => new lang_string('numdays', '', 21),
        14   => new lang_string('numdays', '', 14),
        12   => new lang_string('numdays', '', 12),
        10   => new lang_string('numdays', '', 10),
        8    => new lang_string('numdays', '', 8),
        5    => new lang_string('numdays', '', 5),
        3    => new lang_string('numdays', '', 3),
        2    => new lang_string('numdays', '', 2),
        1    => new lang_string('numdays', '', 1),
        0    => new lang_string('never')
    );
    $settings->add(new admin_setting_configselect(
        'tool_filterlog/loglifetime',
        new lang_string('loglifetime', 'core_admin'),
        new lang_string('loglifetime_desc', 'tool_filterlog'),
        -1,
        $options
    ));

    $settings->add(new admin_setting_configtext(
        'tool_filterlog/userid',
        get_string('userid', 'grades'),
        new lang_string('userid_desc', 'tool_filterlog'),
        '0',
        PARAM_INT
    ));

    $settings->add(new admin_setting_configtext(
        'tool_filterlog/webservices',
        get_string('ws', 'report_log'),
        new lang_string('webservices_desc', 'tool_filterlog'),
        '',
        PARAM_TEXT
    ));

    $settings->add(new admin_setting_configtext(
        'tool_filterlog/logstorename',
        get_string('logstorename', 'tool_filterlog'),
        new lang_string('logstorename_desc', 'tool_filterlog'),
        'standard',
        PARAM_TEXT
    ));
}
