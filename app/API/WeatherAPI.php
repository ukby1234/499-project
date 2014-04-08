<?php
namespace API;

class WeatherAPI {
	protected $location;
	public function __construct($location) {
		$this->location = $location;
	}

	public function get() {
		$url = "http://api.openweathermap.org/data/2.5/weather?q=" . $this->location;
		$json = file_get_contents($url);
		return $json;
		//return json_decode($json);
	}
}