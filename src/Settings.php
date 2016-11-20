<?php
namespace cbulock\chore_notify;

class Settings
{

	private $values;

	public function __construct() {

		$this->values = json_decode(file_get_contents('config.json'));

	}

	public function get() {
		return $this->values;
	}

}