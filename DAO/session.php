<?php
class Session {
	var $link;
	
	public function __construct(){
		session_start();
	}
}