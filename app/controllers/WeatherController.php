<?php

class WeatherController extends BaseController {
	public function getWeather($location) {
		$json = Cache::get('weather-api');
		if (!$json) {
			$weatherapi = new API\WeatherAPI($location);
			$json = $weatherapi->get();
			Cache::put('weather-api', $json, 10);
		}

		header('Content-type: application/json');
		echo $json;
	}
}