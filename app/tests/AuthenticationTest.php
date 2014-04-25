<?php

class AuthenticationTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */

	public function testSuccessfulAuthentication()
	{
		$username = 'david';
		$password = sha1('laravel');
		$user = User::where('username', '=', $username)->where('password', '=', $password)->get();
		$this->assertFalse($user->isEmpty());
		$this->assertEquals(count($user), 1);
	}

	public function testFailedAuthentication()
	{
		$username = 'david';
		$password = sha1('fakepassword');
		$user = User::where('username', '=', $username)->where('password', '=', $password)->get();
		$this->assertTrue($user->isEmpty());
	}

}