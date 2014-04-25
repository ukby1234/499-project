<?php
class AdminController extends SiteController {
	public function editor() {
		$user = $this->getUser();
		$weather = $this->getWeather();
		if (!$user || $user->id != 1)
			return Redirect::to('/');
		return View::make('Editor', [
			'user' => $user,
			'weather' => $weather
			]);
	}


	public function newUser() {
		$user = $this->getUser();
		$weather = $this->getWeather();
		if (!$user || $user->id != 1)
			return Redirect::to('/');
		return View::make('NewUser', [
			'user' => $user,
			'weather' => $weather
			]);
	}

	public function addUser() {
		$user = $this->getUser();
		if (!$user || $user->id != 1)
			return Redirect::to('/');
		$validation = User::validate(Input::all());
		if ($validation->passes()) {
			$user = new User();
			$user->username = Input::get('username');
			$user->password = sha1(Input::get('passwd'));
			$user->location = Input::get('location');
			$user->save();
			return Redirect::to('/');
		}
		else {
			return Redirect::to('/user')->with('register', $validation->messages());  
		}
	}
}