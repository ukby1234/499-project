<?php

class SiteController extends BaseController {
	public function showIndex() {
		$user = $this->getUser();
		$weather = $this->getWeather();
		return View::make('Index', [
			'user' => $user,
			'weather' => $weather
			]);
	}

	public function aboutme() {
		$user = $this->getUser();
		$weather = $this->getWeather();
		return View::make('Aboutme', [
			'user' => $user,
			'weather' => $weather
			]);
	}

	protected function getUser() {
		$uid = Session::get('uid');
		$user = NULL;
		if ($uid)
			$user = User::find($uid);
		return $user;
	}

	protected function getWeather() {
		$user = $this->getUser();
		if (!$user)
			return NULL;
		$json = Cache::get($user->id);
		if (!$json) {
			$weatherapi = new API\WeatherAPI($user->location);
			$json = $weatherapi->get();
			Cache::put($user->id, $json, 10);
		}
		return $json;
	}

}