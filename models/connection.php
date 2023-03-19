<?php
error_reporting(0);
class Connection{

	public function connect(){

		$link = new PDO("mysql:host=localhost;dbname=pos-english", "root", "");

		$link -> exec("set names utf8");

		return $link;
	}

}