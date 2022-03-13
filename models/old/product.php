<?php
set_include_path("../");
require_once("utils/monetaryValue.php");
require_once("View/product/index.php");
require_once("PDO.php");

final class Product {
    private int|null $id;
    private string $name;
    private float|int $price;
    private string $code;
    private string|null $expiration_date;
    private string|null $manufacturer;
    private float|int|null $quantity;
    private string|null $description;

    public function __construct(int|null $id, string $name, float|int|string $price, string $code, string|null $expiration_date, 
        string|null $manufacturer, float|int|null $quantity, string|null $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $this->validate_price($price);
        $this->code = $code;
        $this->expiration_date = $expiration_date;
        $this->manufacturer = $manufacturer;
        $this->quantity = $quantity;
        $this->description = $description;
    }

    public function validate_price($value)
    {
		if (gettype($value) == "string") {
			$value = MonetaryValue::string_to_value($value);
		}
		if ($value < 0) {
			throw new ErrorException("O preço não pode ser negativo");
		}
		else 
		{
			return $value;
		}
    }

    public function __get($atrib)
    {
        if ($atrib == "price")
        {
            return MonetaryValue::value_to_string($this->$atrib);
        } else {
            return $this->$atrib;
        }
        
    }

	static function getConnection(){
		$pdo = new usePDO();
		$cnx = $pdo->getInstance();
		return $cnx;
	}

	static function createTable($cnx){
		try{
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

	public static function select(){
		try{
			$cnx = Product::getConnection();
			Product::createTable($cnx);
			$result = $cnx->query("SELECT * FROM product");
			$products = $result->fetchAll();
			$products_array=[];
			foreach ($products as $result_product){
				$product = new Product(
					$result_product["id"], 
					$result_product["name"], 
					$result_product["price"], 
					$result_product["code"],
					$result_product["expiration_date"],
					$result_product["manufacturer"],
					$result_product["quantity"],
					$result_product["description"]
				);
				array_push($products_array, $product);
			}
			return $products_array;
		}
		catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
	}

	function insert($request){
		try{
			$cnx = Product::getConnection();
			Product::createTable($cnx);

			$product = new Product(null, $request["name"], $request["price"], $request["code"], $request["expiration-date"], 
			$request["manufacturer"], $request["description"]);

			$result = $cnx->exec("INSERT INTO product (name, price, code, expiration_date, manufacturer, description) 
			VALUES ('$product->name', $product->price, '$product->code', '$product->expiration_date', '$product->manufacturer', '$product->description');");

			return $result;
		}
		catch(PDOException $e)
		{
			return "Falha ao Inserir dados". "<br>".$sql;
		}
	}

	function update($request){

		try{
			$cnx = Product::getConnection();
			Product::createTable($cnx);

			$product = new Product($request["id"], $request["name"], $request["price"], $request["code"], $request["expiration-date"], 
			$request["manufacturer"], $request["description"]);

			$result = $cnx->exec("UPDATE product SET name='$product->name', price=$product->price, code='$product->code', 
			expiration_date='$product->expiration_date', manufacturer='$product->manufacturer', description='$product->description' 
			WHERE id=$product->id;");

			return $result;
		}
		catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
	}

	function delete($request){

		try{
			$cnx = Product::getConnection();
			Product::createTable($cnx);
			$id = $request['id'];
			$result = $cnx->query("DELETE FROM product WHERE id=$id;");

			return $result;
		}
		catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
	}
}

$get_request = boolval(count($_GET) != 0);
$post_request = boolval(count($_POST) != 0);

$q = array_key_exists("q", $_REQUEST) ? $_REQUEST["q"] : null;

switch ($q) {
    case null:
	case "read":
		if ($get_request) {
			$products = Product::select();
			ViewProduct::ViewProduct($products);
		}
		break;
	case "update":
		if ($get_request) {
			include("View/EditProduct.php");
		} else {
			Product::update($_REQUEST);
		}
		break;
	case "insert":
		if ($get_request) {
			include("View/AddProduct.php");
		} else {
			Product::insert($_REQUEST);
		}
		break;
	case "delete":
		if ($post_request) {
			Product::delete($_REQUEST);
		}
		echo "Registro deletado com sucesso";
		break;
}
?>