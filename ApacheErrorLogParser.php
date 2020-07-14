<?php

/**
 * Class apache_error_log_parser
 */
class ApacheErrorLogParser extends ApacheLogParser
{

    /**
     * apache_error_log_parser constructor.
     * @param $file
     */
    public function __construct($file)
    {
        parent::__construct($file);
    }

    /**
     * Parse raw data and keep only errors
     * @access private
     */
    protected function parseData()
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
            switch ($type_input) {
                case "AH00094":
                    $type = 'Called Command line';
                    break;
                case "AH00418":
                    $type = 'Created child process';
                    break;
                case "AH00354":
                    $type = 'Starting worker threads';
                    break;
                case "AH00422":
                    $type = 'Parent: Received shutdown signal';
                    break;
                case "AH00424":
                    $type = 'Parent: Received restart signal';
                    break;
                case "AH00430":
                    $type = 'Child process exited successfully';
                    break;
                case "AH00455":
                    $type = 'resuming normal operations';
                    break;
                case "AH00456":
                    $type = 'version information';
                    break;
                case "AH00364":
                    $type = 'Child: All worker threads have exited';
                    break;
                default:
                    $type = $type_input;
            }
            $output = array('type' => $type_input, 'date' => $back['3'], 'info' => $back['5'], 'detail' => $type);
            $this->data[] = $output;
        }
    }
}
