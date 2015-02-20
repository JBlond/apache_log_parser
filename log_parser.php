<?php
require 'apache_log_parser.class.php';
$log_parser = new apache_log_parser("/var/logs/apache2/vhost_access.log");
echo $log_parser->output();
