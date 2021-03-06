<?php

class xIniException extends Exception {}
class xIni
{
    
    public function __construct($configFileName = NULL) {
        $this->parseIniFile($configFileName);
    }

    public function parseIniFile($configFile) {
        if(! file_exists($configFile))
            throw new xIniException("File $configFile dosen't exists");

        $parsed = parse_ini_file($configFile);

        foreach($parsed as $configLine => $value) {
            $path = explode('.',$configLine);
            $data = $this;
            foreach($path as $index => $part) {
                if($index < count($path) -1) {
                    if(!isset($data->$part))
                        $data->$part = new stdClass();

                    $data = $data->$part;
                }
                else
                    $data->$part = $value;
            }
        }
    }
}
