<?php

require_once("Base/Config.php");

class automaticTest {

	public function run(){		
		exec('phpunit', $output, $return_var);
		$return_var=0;
		if ($return_var==0){
			Results::parseToFile();						
		}
	}
}

$automaticTest = new automaticTest();
$automaticTest->run();