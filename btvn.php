<?php
class Father
{
	public static $user = "admin";
	private $password = "123456";
	protected static $home = "index.html";
	public function show(){
		echo self::$user;
	}
}
class ChildOne extends Father
{
	public static $user = "user1";
	private $password = "654321";
	protected static $home = "user1.html";
}
class ChildTwo extends Father
{
	public static $user = "user2";
	private $password = "654321";
	protected static $home = "user1.html";
}
class ChildThree extends Father
{
	public static $user = "user3";
	private $password = "654321";
	protected static $home = "user1.html";
}
class ChildFour extends Father
{
	public static $user = "user4";
	private $password = "654321";
	protected static $home = "user1.html";
}
class ChildFive extends Father
{
	public static $user = "user5";
	private $password = "654321";
	protected static $home = "user1.html";
}



?>