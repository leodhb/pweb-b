<?php
class Connection {
	var $link;
	
	public function __construct(){
		$this->link = new mysqli("localhost", "root", "", "greenspace");
		if ($this->link->connect_errno) {
			printf("Conexão falhou: %s\n", $mysqli->connect_error);
			exit();
		}
	}
}