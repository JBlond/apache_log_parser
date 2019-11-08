<?php
require 'apache_log_parser.class.php';
require 'apache_error_log_parser.class.php';

$log_parser = new apache_error_log_parser("C:\\Users\\jblond\\Apache24\\logs\\error.log");
echo $log_parser->output();
