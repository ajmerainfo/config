<?php
/**
 * Config.php
 *
 * Created by Keyur Ajmera.
 * User: Keyur Ajmera
 * Date: 10/12/2015
 * Time: 5:09 PM
 *
 * Read .config file and load all variables
 */

namespace Ajmerainfo;

class Config
{
    protected $configList;
    protected $file;

    public function __construct($path, $file = '.config')
    {
        $this->file = $file;

        $filePath = rtrim($path, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$file;

        $this->setConfigVariable($filePath);
    }

    protected function setConfigVariable($path)
    {
        // get current setting of auto_detect_line_endings
        $autodetect = ini_get('auto_detect_line_endings');

        ini_set('auto_detect_line_endings', '1');
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // set again setting of auto_detect_line_endings
        ini_set('auto_detect_line_endings', $autodetect);

        // Remove all lines start with hash (#) and dash (-)
        foreach ($lines as $key => $value) {
            $lines[$key] = trim($value);

            if (trim($value)[0] === '#' || trim($value)[0] === '-') {
                unset($lines[$key]);
            }
        }

        // create new array with key and value
        $configList = array();
        foreach ($lines as $line) {
            $configList[ explode('=', $line, 2)[0] ] = explode('=', $line, 2)[1];
        }

        // set variable from config file
        foreach ($configList as $key => $value) {
            define($key, $value);
        }
    }
}