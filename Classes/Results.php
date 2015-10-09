<?php 

class Results {

	public function parseToFile() {		

		$json = Utils::ParseXml('logfile.xml');
		$tests = json_decode($json, true);
		$data = array();						
		$results = array(
			'name' => $tests['testsuite']['@attributes']['name'],
			'totalTest' => $tests['testsuite']['@attributes']['name'],
			'assertions' => $tests['testsuite']['@attributes']['assertions'],
			'failures' => $tests['testsuite']['@attributes']['failures'],
			'errors' => $tests['testsuite']['@attributes']['errors'],
			'time' => $tests['testsuite']['@attributes']['time'],
		);						
		foreach ($tests['testsuite']['testsuite']['testcase'] as $test) {		
			$data_test = array(				
				'name' => $test['@attributes']['name'],
				'class' => $test['@attributes']['class'],
				'assertions' => $test['@attributes']['assertions'],
				'time' => $test['@attributes']['time'],
			);				
			$data[Date::getDefault()->toSql()]['tests'][] = $data_test;			
		}
		$data[Date::getDefault()->toSql()]['results'] = $results;
		
		Utils::saveFile($data, DATA_PATH.'data/output.json');		
	}
}