apache_log_parser
=================

[![Code Climate](https://codeclimate.com/github/JBlond/apache_log_parser/badges/gpa.svg)](https://codeclimate.com/github/JBlond/apache_log_parser) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/95e87795-2d61-4ebd-9104-17f9e5cb3773/mini.png)](https://insight.sensiolabs.com/projects/95e87795-2d61-4ebd-9104-17f9e5cb3773) [![Codacy Badge](https://api.codacy.com/project/badge/grade/5cb737459e6f4720949e27a6f12ab427)](https://www.codacy.com/app/leet31337/apache_log_parser)

Apache log parser: Filter your logs for errors

Since httpd Apache 2.4 does not log the page errors in the error log as it used to be with 2.2 this parses the errors from the access log

Logformat combined is required

Parsing of 961k lines under a second
