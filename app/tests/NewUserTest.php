<?php
class NewUserTest extends Testcase {
	public function testSuccessful()
	{
		$username = 'newuser';
		$password = 'laravel';
		$location = 'San Diego, CA';
		$user = new User();
		$validation = $user->validate(array(
			'username' => $username,
			'passwd' => $password,
			'location' => $location
			));
		$this->assertTrue($validation->passes());
	}

	public function testDuplicate()
	{
		$username = 'david';
		$password = 'laravel';
		$location = 'San Diego, CA';
		$user = new User();
		$validation = $user->validate(array(
			'username' => $username,
			'passwd' => $password,
			'location' => $location
			));
		$this->assertTrue($validation->fails());
	}

	public function testNotEnoughUsernameLength()
	{
		$username = 'test';
		$password = 'laravel';
		$location = 'San Diego, CA';
		$user = new User();
		$validation = $user->validate(array(
			'username' => $username,
			'passwd' => $password,
			'location' => $location
			));
		$this->assertTrue($validation->fails());
	}

	public function testNoUsername()
	{
		$username = '';
		$password = 'laravel';
		$location = 'San Diego, CA';
		$user = new User();
		$validation = $user->validate(array(
			'username' => $username,
			'passwd' => $password,
			'location' => $location
			));
		$this->assertTrue($validation->fails());
	}

	public function testNotEnoughPasswordLength()
	{
		$username = 'test2';
		$password = 'lara';
		$location = 'San Diego, CA';
		$user = new User();
		$validation = $user->validate(array(
			'username' => $username,
			'passwd' => $password,
			'location' => $location
			));
		$this->assertTrue($validation->fails());
	}

	public function testNoPassword()
	{
		$username = 'test2';
		$password = '';
		$location = 'San Diego, CA';
		$user = new User();
		$validation = $user->validate(array(
			'username' => $username,
			'passwd' => $password,
			'location' => $location
			));
		$this->assertTrue($validation->fails());
	}

	public function testNolocation()
	{
		$username = 'test2';
		$password = 'laravel';
		$location = '';
		$user = new User();
		$validation = $user->validate(array(
			'username' => $username,
			'passwd' => $password,
			'location' => $location
			));
		$this->assertTrue($validation->fails());
	}

}