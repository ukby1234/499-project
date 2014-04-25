<?php

class User extends Eloquent{
	public $timestamps = false;
	public static function validate($input) {
    return Validator::make($input, [
      'username' => 'required|alpha_num|min:5|Unique:users', 
      'passwd' => 'required|alpha_num|min:6', 
      'location' => 'required'
      ]);
  }
}