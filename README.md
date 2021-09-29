<img src="pix/logo.png" align="right" />

FilterLog Admin Tool plugin for Moodle LMS
==========================================
![PHP](https://img.shields.io/badge/PHP-v7.0%20%2F%20v7.1%2F%20v7.2%2F%20v7.3%2F%20v7.4-blue.svg)
![Moodle](https://img.shields.io/badge/Moodle-v3.0.1%20to%20v3.11.x-orange.svg)
[![GitHub Issues](https://img.shields.io/github/issues/michael-milette/moodle-tool_filterlog.svg)](https://github.com/michael-milette/moodle-tool_filterlog/issues)
[![Contributions welcome](https://img.shields.io/badge/contributions-welcome-green.svg)](#contributing)
[![License](https://img.shields.io/badge/License-GPL%20v3-blue.svg)](#license)

# Table of Contents

- [Basic Overview](#basic-overview)
- [Requirements](#requirements)
- [Download FilterLog for Moodle](#download-filterlog-for-moodle)
- [Installation](#installation)
- [Usage](#usage)
- [Updating](#updating)
- [Uninstallation](#uninstallation)
- [Limitations](#limitations)
- [Language Support](#language-support)
- [Troubleshooting](#troubleshooting)
- [Frequently Asked Questions (FAQ)](#faq)
- [Contributing](#contributing)
- [Motivation for this plugin](#motivation-for-this-plugin)
- [Further information](#further-information)
- [License](#license)

# Basic Overview

FilterLog Admin Tool for Moodle LMS enables administrators to regularly shrink or eliminate logs for a specific user id. This can be very useful if your logs are being filled by Web Services.

**WARNING**: This ALPHA release has NOT been tested on many Moodle sites yet and should not be used on production Moodle sites at this time. Although we expect everything to work, if you find a problem, please help by reporting it in the [Bug Tracker](https://github.com/michael-milette/moodle-tool_filterlog/issues).

[(Back to top)](#table-of-contents)

# Requirements

This plugin requires Moodle 3.0.1+ from https://moodle.org/ .

[(Back to top)](#table-of-contents)

# Download FilterLog for Moodle

The most recent DEVELOPMENT release of FilterLog for Moodle LMS can be found at:
https://github.com/michael-milette/moodle-tool_filterlog

[(Back to top)](#table-of-contents)

# Installation

Install the plugin, like any other plugin, to the following folder:

    /admin/tool/filterlog

See https://docs.moodle.org/en/Installing_plugins for details on installing Moodle plugins.

[(Back to top)](#table-of-contents)

# Usage

**WARNING**: This ALPHA release has NOT been tested on many Moodle sites yet and should not be used on production Moodle sites at this time. Although we expect everything to work, if you find a problem, please help by reporting it in the [Bug Tracker](https://github.com/michael-milette/moodle-tool_filterlog/issues).

### Customizing or translating the plugin

You can customize the text appearing in the plugin using Moodle's language editor. Here is how to do it:

1. Navigate to Site Administration > Language > Language Customization.
2. Select the language you want to customize.
3. Click the **Open Language Pack for Editing** button.
4. Wait until the **Continue** button apppears. This may take a little time. Please be patient.
5. In the **Show Strings of These Components** field, scroll down and select **tool_filterlog.php**.
6. Click the **Show Strings** button.
7. Edit the language strings as needed.
9. Scroll to the bottom of the page and click the **Save changes to the language pack** button.

For more information on editing language strings in Moodle, visit: https://docs.moodle.org/en/Language_customisation.

[(Back to top)](#table-of-contents)

# Updating

There are no special considerations required for updating the plugin.

The first public ALPHA version was released on 2021-09-29.

For more information on releases since then, see
[CHANGELOG.md](https://github.com/michael-milette/moodle-tool_filterlog/blob/master/CHANGELOG.md).

[(Back to top)](#table-of-contents)

# Uninstallation

Uninstalling the plugin by going into the following:

Site Administration > Plugins > Manage plugins > FilterLog

...and click Uninstall. You may also need to manually delete the following folder:

    /admin/tool/filterlog

# Limitations

- You can only choose to remove log entries from a single user id from the standard log store.
- This does not work with the legacy log store.

# Language Support

This plugin includes support for the English language.

If you need a different language that is not yet supported, please contribute a translation using the Moodle AMOS Translation Toolkit for Moodle at
https://lang.moodle.org/

# Troubleshooting

If it is not working for you, check the following:

1. The most recent version of the plugin is installed.
2. You have check the plugin settings by going to Site Administration > Plugins > Admin Tools > FilterLog to ensure that you specified an ID (you cannot specify the admin ID = 0), and have set a rentention period.
3. You have ensured that the task is enabled and the time is set by going to Administration > Server > Scheduled Tasks > Log Table User Cleanup and clicked on the gear icon.
4. You have verified that cron is running the Moodle Task Scheduler each minute of the day.

# FAQ

## Answers to Frequently Asked Questions

IMPORANT: Although we expect everything to work, this ALPHA release has not been fully tested in every situation. If you find a problem, please help by reporting it in the [Bug Tracker](https://github.com/michael-milette/moodle-tool_filterlog/issues).

### Are there any security considerations?

There are no known security considerations at this time.

### How can I get answers to my questions?

Got a burning question that is not covered here? If you can't find your answer, submit your question in the Moodle forums or open a new issue on Github at:

https://github.com/michael-milette/moodle-tool_filterlog/issues

[(Back to top)](#table-of-contents)

# Contributing

If you are interested in helping, please take a look at our [contributing](https://github.com/michael-milette/moodle-tool_filterlog/blob/master/CONTRIBUTING.md) guidelines for details on our code of conduct and the process for submitting pull requests to us.

## Contributors

Michael Milette - Author and Lead Developer

# Motivation for this plugin

The development of this plugin was motivated through our own experience in Moodle development, features requested by out clients and topics discussed in the Moodle forums and Moodle Tracker. The project development was sponsored by CSA Group and is supported by TNG Consulting Inc.

[(Back to top)](#table-of-contents)

# Further Information

For further information regarding the tool_filterlog plugin, support or to report a bug, please visit the project page at:

https://github.com/michael-milette/moodle-tool_filterlog

[(Back to top)](#table-of-contents)

# License

Copyright © 2021 TNG Consulting Inc. - <link:www.tngconsulting.ca>

This file is part of FilterLog for Moodle - https://moodle.org/

FilterLog is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

FilterLog is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with FilterLog.  If not, see <https://www.gnu.org/licenses/>.

[(Back to top)](#table-of-contents)
