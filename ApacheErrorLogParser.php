<?php

namespace jblond\Apache_Log_Parser;

/**
 * Class apache_error_log_parser
 */
class ApacheErrorLogParser extends ApacheLogParser
{
    /**
     * Parse raw data and keep only errors
     * @access private
     * @return void
     */
    protected function parseData(): void
    {
        $input = explode("\n", $this->content);
        $this->stats['rows'] = 0;
        $array_size = sizeof($input);
        for ($i = 0; $i < $array_size; $i++) {
            $this->stats['rows']++;
            $back = explode(" ", $input[$i]);

            if (!isset($back['9'])) { //new line in file / empty line
                continue;
            }

            $type_input = str_replace(':', '', $back['9']);
            $type = match ($type_input) {
                "AH00094" => 'Called Command line',
                "AH00418" => 'Created child process',
                "AH00354" => 'Starting worker threads',
                "AH00422" => 'Parent: Received shutdown signal',
                "AH00424" => 'Parent: Received restart signal',
                "AH00430" => 'Child process exited successfully',
                "AH00455" => 'resuming normal operations',
                "AH00456" => 'version information',
                "AH00364" => 'Child: All worker threads have exited',
                default => $type_input,
            };
            $output = array('type' => $type_input, 'date' => $back['3'], 'info' => $back['5'], 'detail' => $type);
            $this->data[] = $output;
        }
    }
}
