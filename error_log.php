<?php

use jblond\Apache_Log_Parser\ApacheErrorLogParser;

require 'vendor/autoload.php';

$log_parser = new ApacheErrorLogParser("C:\\Users\\jblond\\Apache24\\logs\\error.log");
echo $log_parser->output();
