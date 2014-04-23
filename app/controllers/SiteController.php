<?php

class SiteController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showIndex() {
		$user = $this->getUser();
		$weather = $this->getWeather();
		return View::make('index', [
			'user' => $user,
			'weather' => $weather
			]);
	}

	public function showArticleList() {
		$articles = Article::all();
		$user = $this->getUser();
		$weather = $this->getWeather();
		return View::make('ArticleList', [
      'articles' => $articles,
      'user' => $user,
      'weather' => $weather
      ]);
	}

	public function showArticle($id) {
		$article = Article::find($id);
		$user = $this->getUser();
		$weather = $this->getWeather();
		$comments = Comment::where('article_id', '=', $id)->get();
		return View::make('Article', [
			'article' => $article,
			'comments' => $comments,
			'c' => 0,
			'user' => $user,
			'weather' => $weather
			]);
	}

	public function postArticle() {
		$article = Article::find($id);
		$user = $this->getUser();
		$weather = $this->getWeather();
		$comments = Comment::where('article_id', '=', $id)->get();
		return View::make('Article', [
			'article' => $article,
			'comments' => $comments,
			'c' => 0,
			'user' => $user,
			'weather' => $weather
			]);
	}
	
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
		Session::forget('uid');
		return Redirect::to('/');
	}

	private function getUser() {
		$uid = Session::get('uid');
		$user = NULL;
		if ($uid)
			$user = User::find($uid);
		return $user;
	}

	private function getWeather() {
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