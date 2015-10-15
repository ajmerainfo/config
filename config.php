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

class Config
{
    private static $configList;

    public static function init($path, $file = '.config')
    {
        $filePath = rtrim($path, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$file;

        self::setConfigVariable($filePath);
    }

    public static function get($key, $defaultValue = null)
    {
        if (!isset(self::$configList))
            self::init( explode('vendor', __DIR__)[0] );

        if (array_key_exists($key, self::$configList))
        {
            return self::$configList[$key];
        }
        else
        {
            return $defaultValue;
        }
    }

    protected static function setConfigVariable($filePath)
    {
        // read file
        $lines = self::readFile($filePath);

        // Remove all lines start with hash (#) and dash (-)
        $lines = self::removeCommentFromLines($lines);

        // create new array with key and value
        self::$configList = array();
        foreach ($lines as $line) {
            self::$configList[ explode('=', $line, 2)[0] ] = explode('=', $line, 2)[1];
        }
    }

    private static function readFile($filePath)
    {
        // get current setting of auto_detect_line_endings
        $autodetect = ini_get('auto_detect_line_endings');

        ini_set('auto_detect_line_endings', '1');
        $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // set again setting of auto_detect_line_endings
        ini_set('auto_detect_line_endings', $autodetect);

        // return all lines
        return $lines;
    }

    private static function removeCommentFromLines($lines)
    {
        foreach ($lines as $key => $value) {
            $lines[$key] = trim($value);

            // Remove all lines start with hash (#), dash (-) and equal (=)
            if (trim($value)[0] === '#'
                || trim($value)[0] === '-'
                || trim($value)[0] === '=')
            {
                unset($lines[$key]);
            }
        }

        return $lines;
    }
}