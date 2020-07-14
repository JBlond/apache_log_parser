<?php

require 'ApacheLogParser.php';
require 'ApacheErrorLogParser.php';

$log_parser = new ApacheErrorLogParser("C:\\Users\\jblond\\Apache24\\logs\\error.log");
echo $log_parser->output();
