<?php  

class usePDO {

	//Algumas variáveis com dados sobre o Banco. 
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname="ar_ppi";
	private $instance; // instância de conexão, usada no Singleton

	// método que retorna a instância de conexão
	function getInstance(){
		if(empty($instance)){
			$instance = $this->connection();
		}
		return $instance;
	}

	//método que cria a instância de conexão. 
	private function connection(){
		try {
			$conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname",$this->username,$this->password); //Criando um objeto PDO
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //atribuindo modo de erro do PDO.
			return $conn;
		}
		catch(PDOException $e)
		{
			echo "Connection failed: " . $e->getMessage() . "<br>";
			if(strpos($e->getMessage(), "Unknown database '$this->dbname'")){
				echo "Conexão nula, criando o banco pela primeira vez". "<br>";
				$conn = $this->createDB();
				return $conn;
			}
			else
				die("Connection failed: " . $e->getMessage() . "<br>");
		}
	}

	//Métodos do CRUD
	function createDB(){
		try{
			$cnx = new PDO("mysql:host=$this->servername", $this->username,$this->password);
			$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "CREATE DATABASE IF NOT EXISTS $this->dbname";
			$cnx->exec($sql);
			return $cnx;
		}
		catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
	}
}
?>