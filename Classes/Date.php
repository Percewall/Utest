<?php

Class Date {

	protected $_dateTime = null;

	const DATE_FORMAT_SQL = 'Y-m-d';
	const TIME_FORMAT_SQL = ' H:i:s';

	public function __construct($time=0){
		$this->_dateTime = new DateTime();
		//$this->_dateTime->setTimezone(new DateTimeZone('UTC'));
		$this->_dateTime->setTimezone(new DateTimeZone(date_default_timezone_get()));
		if ($time !== null) {
			$time = ( $time !== 0 ? $time : time() );
			$this->time = $time;			
		}
	}

	public static function getDefault()
	{
		static $i = null;
		if (!$i) {
			$i = new self(0);
		}
		return $i;
	}

	public function now(){
		return $this->_datetime;
	}

	public function toSql()
	{
		return date(self::DATE_FORMAT_SQL.self::TIME_FORMAT_SQL, $this->time);
	}
}