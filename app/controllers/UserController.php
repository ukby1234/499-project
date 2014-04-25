<?php
class UserController extends SiteController {
	public function showLogin() {
		$user = $this->getUser();
		$weather = $this->getWeather();
		if ($user)
			return Redirect::to('/');
		return View::make('Login', [
			'user' => NULL,
			'weather' => NULL
			]);
	}

	public function authentication() {
		$username = Input::get('username');
		$password = sha1(Input::get('passwd'));
		$user = User::where('username', '=', $username)->where('password', '=', $password)->get();
		if ($user->isEmpty()) {
			return Redirect::to('/login')->with('login', 'Login Failed. ');
		}
		else {
			Session::put('uid', $user->first()->id);
			return Redirect::to('/');
		}
	}

	public function profile() {
		$user = $this->getUser();
		$weather = $this->getWeather();
		if (!$user) 
			return Redirect::to('/');
		return View::make('Profile', [
			'user' => $user,
			'weather' => $weather
			]);
	}

	public function logout() {
		$user = $this->getUser();
		Session::forget('uid');
		if ($user)
			Cache::forget($user->id);
		return Redirect::to('/');
	}

	public function uploadAvatar() {
		$user = $this->getUser();
		if (!$user)
			return Redirect::to('/');
		$file = new UploadFile(Input::file('file'));
		$validator = $file->validate();
		if ($validator->fails()) {
			return Redirect::to('/profile')->with('errors', $validator->messages());  
		}
		else {
			$file->moveTo(__DIR__ . '/../../public/images/icons/', 'icon_' . $user->id);
			return Redirect::to('/');
		}
	}
}