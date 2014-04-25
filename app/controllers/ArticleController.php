<?php
class ArticleController extends SiteController {
	

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
		$article = new Article();
		$title = Input::get('title');
		$content = Input::get('ta');
		$article->title = $title;
		$article->content = $content;
		$article->save();
		return Redirect::to('/');
	}

	public function postComment() {
		$user = $this->getUser();
		$comment = new Comment();
		$article_id = Input::get('id');
		$comments = Input::get('comments');
		$comment->article_id = $article_id;
		if ($user)
			$comment->user_id = $user->id;
		$comment->content = $comments;
		$comment->save();
		return Redirect::to('/article/' . $article_id);
	}
}