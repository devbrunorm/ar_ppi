<?php 
require_once ("../Model/productModel.php");

$q = $_REQUEST["q"];

$productModel = new ProductModel();
$productModel->createTable();

switch ($q) {
    case "read":
    	$result = $productModel->select("SELECT * FROM product");
		print(json_encode($result->fetchAll()));
        break;
    case "update":
    	$id = $_REQUEST["id"];
		$name = $_REQUEST["name"];
    	$price = $_REQUEST["price"];
    	$code = $_REQUEST["code"];
		$expiration_date = $_REQUEST["expiration-date"];
		$manufacturer = $_REQUEST["manufacturer"];
		$description = $_REQUEST["description"];
    	$result = $productModel->update("UPDATE product SET name='$name', price=$price, code='$code', expiration_date='$expiration_date', manufacturer='$manufacturer', description='$description' WHERE id='$id'");
        echo "Registro id $id atualizado com sucesso";
        break;
    case "insert":
		print_r($_REQUEST);
		$name = $_REQUEST["name"];
    	$price = $_REQUEST["price"];
    	$code = $_REQUEST["code"];
		$expiration_date = $_REQUEST["expiration-date"];
		$manufacturer = $_REQUEST["manufacturer"];
		$description = $_REQUEST["description"];
    	$message = $productModel->insert("INSERT INTO product (name, price, code, expiration_date, manufacturer, description) 
    		VALUES ('$name', $price, '$code', '$expiration_date', '$manufacturer', '$description')");
    		//outros campos são ficticios somente para evitarmos de redesenhar o banco 

        if ($message != NULL) {
            //var_dump($message);
            header("location: ../index.php?mensagem=$message");
        }else{
            header("location: ../index.php?mensagem=Registro inserido com sucesso");
        }
        break;
    case "delete":
    	$id = $_REQUEST["id"];
    	$productModel->delete("DELETE FROM product WHERE id='$id'");
    	echo "Registro deletado com sucesso";
    	break;
}

?>