<?php
require_once "DAO/ocorrenciaDAO.php";

class OcorrenciaController{
	public $ocorrenciaDAO;
	
	public function __construct(){
		$this->ocorrenciaDAO = new OcorrenciaDAO();
	}
	
	function inserir($titulo, $img_path, $categoria){
		return $this->ocorrenciaDAO->inserir($titulo, $img_path, $categoria);
	}
	
	function listar(){
		return $this->ocorrenciaDAO->listar();
	}
	
	function getPostsByCategory($id){
		return $this->ocorrenciaDAO->getPostsByCategory($id);
	}

	function getPostById($id){
		return $this->ocorrenciaDAO->getPostById($id);
	}
	
	function deletePostById($id){
		return $this->ocorrenciaDAO->deletePostById($id);
	}

	function modificar($id, $titulo, $img_path, $categoria){
		return $this->ocorrenciaDAO->modificar($id, $titulo, $img_path, $categoria);
	}
}