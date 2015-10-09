<?php

class Utils {

	/**
	 * [ParseXml description]
	 * @param [type] $url [description]
	 */
	public static function ParseXml ($url) {
		$fileContents= file_get_contents($url);
		$fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);
		$fileContents = trim(str_replace('"', "'", $fileContents));
		$simpleXml = simplexml_load_string($fileContents);
		$json = json_encode($simpleXml);
		return $json;
	}

	/**
	 * [GetProgCpuUsage description]
	 * @param [type] $program [description]
	 */
	public static function GetProgCpuUsage($program)
	{
	    if(!$program) return -1;
	    
	    $c_pid = exec("ps aux | grep ".$program." | grep -v grep | grep -v su | awk {'print $3'}");
	    return $c_pid;
	}

	/**
	 * [GetProgMemUsage description]
	 * @param [type] $program [description]
	 */
	public static function GetProgMemUsage($program)
	{
	    if(!$program) return -1;
	    
	    $c_pid = exec("ps aux | grep ".$program." | grep -v grep | grep -v su | awk {'print $4'}");
	    return $c_pid;
	}

	/**
	 * [saveFile description]
	 * @param  [type]  $data      [description]
	 * @param  [type]  $filename  [description]
	 * @param  boolean $overwrite [description]
	 * @return [type]             [description]
	 */
	public static function saveFile($data, $filename, $overwrite=false){
		if (is_file($filename) && $overwrite==true) {
			$fp = fopen($filename, 'w+');
		} elseif (is_file($filename) && $overwrite==false){
			$fp = fopen($filename, 'r+');
			$json = fread($fp, filesize($filename));
			$obj = json_decode($json, true);
			$data = array_merge($obj, $data);
			fclose($fp);
			$fp = fopen($filename, 'w+');
		} else {
			$fp = fopen($filename, 'a+');
		}
		if ($fp) {
			fwrite($fp, json_encode($data));
			fclose($fp);
		}
	}
}