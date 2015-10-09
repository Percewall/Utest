<?php

class Autoloader {

    static public function loader($className) {
        $filename = APPLICATION_PATH . CLASS_PATH . str_replace("\\", "/", $className) . ".php";
        if (file_exists($filename)) {
            include($filename);
            if (class_exists($className)) {
                return TRUE;
            }
        }
        return FALSE;
    }
}
spl_autoload_register('Autoloader::loader');