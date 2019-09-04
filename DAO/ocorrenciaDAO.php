<?php
require_once 'connection.php';

class OcorrenciaDAO {
	public $connection;
	
	public function __construct(){
		$this->connection = new Connection();
	}
	

	function inserir($title, $img_path, $category){


		$sql = "SELECT cat_id FROM categorias WHERE cat_slug='$category'";
		$result = $this->connection->link->query($sql);


		if(mysqli_num_rows($result) == 0)
		{
			/*   INSERT AQUI    */
			$sql = "INSERT INTO categorias(cat_slug) VALUES ('$category')";
			$result = $this->connection->link->query($sql);
		}


			$sql = "SELECT * FROM categorias WHERE cat_slug='$category'";
			$result = $this->connection->link->query($sql);

			$getid = mysqli_fetch_assoc($result);
			$category_id = $getid['cat_id'];

			$sql = "INSERT INTO posts(post_title, post_featured_img, post_date, fk_cat_id) VALUES ('$title', '$img_path', current_timestamp(), $category_id)";
			$result = $this->connection->link->query($sql);
			return $result;
	}


	
	function listar(){
		$sql = "SELECT * FROM posts INNER JOIN categorias ON posts.fk_cat_id = categorias.cat_id ORDER BY post_date DESC";
		$result = $this->connection->link->query($sql);
		while($row = $result->fetch_array()){
			$rows[] = $row;
		}
		if(!empty($rows))
		{
			return $rows;
		}
		else
		{
			return 0;
		}
		
	}
	
	function modificar($id, $title, $img_path, $category){
		$sql = "SELECT * FROM categorias WHERE cat_slug='$category'";
		$result = $this->connection->link->query($sql);

		$getid = mysqli_fetch_assoc($result);
		$category_id = $getid['cat_id'];

		$sql = "UPDATE posts SET post_title='$title', post_featured_img='$img_path', fk_cat_id=$category_id WHERE post_id=$category_id";
		$result = $this->connection->link->query($sql);
		return $result;
	}
	
	function getPostsByCategory($id){
		$sql = "SELECT * FROM posts INNER JOIN categorias ON posts.fk_cat_id = categorias.cat_id WHERE cat_id=$id ORDER BY post_date DESC";
		$result = $this->connection->link->query($sql);
		while($row = $result->fetch_array()){
			$rows[] = $row;
		}
		if(!empty($rows))
		{
			return $rows;
		}
		else
		{
			return 0;
		}
		
	}

	function getPostById($id){
		$sql = "SELECT * FROM posts WHERE post_id=$id";
		$result = $this->connection->link->query($sql);
		return $result->mysqli_fetch_assoc();
	}

	function deletePostById($id){
		$sql = "DELETE FROM posts WHERE post_id=$id";
		$result = $this->connection->link->query($sql);
		return $result;
	}
		
}