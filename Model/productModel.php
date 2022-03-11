<?php
require_once("../Model/PDO.php");

class ProductModel {

    private $pdo;

    function __construct(){
        $this->pdo = new usePDO();
        $this->pdo->createDB();
    }

	function createTable(){
		try{
			$cnx = $this->pdo->getInstance();
			$sql = "CREATE TABLE IF NOT EXISTS product (
				id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
				name VARCHAR(50) NOT NULL,
                price DECIMAL(10,2) NOT NULL,
				code VARCHAR(50) NOT NULL,
				expiration_date DATE,
				manufacturer VARCHAR(50),
				quantity DECIMAL(10,5),
				description TEXT
			)";

			$cnx->exec($sql);
		}
		catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
	}

	function insert($sql){
		try{
			$cnx = $this->pdo->getInstance();
			$this->createTable();
			$cnx->exec($sql);
		}
		catch(PDOException $e)
		{
			return "Falha ao Inserir dados". "<br>".$sql;
		}
	}

	function select($sql){

		try{
			$cnx = $this->pdo->getInstance();
			$this->createTable();
			$result = $cnx->query($sql);

			return $result;
		}
		catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
	}

	function update($sql){

		try{
			$cnx = $this->pdo->getInstance();
			$this->createTable();
			$result = $cnx->query($sql);

			return $result;
		}
		catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
	}

	function delete($sql){

		try{
			$cnx = $this->pdo->getInstance();
			$this->createTable();
			$result = $cnx->query($sql);

			return $result;
		}
		catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
	}
}
?>