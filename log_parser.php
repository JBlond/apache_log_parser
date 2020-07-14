<?php

use jblond\Apache_Log_Parser\ApacheLogParser;

require 'ApacheLogParser.php';
$log_parser = new ApacheLogParser("/var/logs/apache2/vhost_access.log");
echo $log_parser->output();
