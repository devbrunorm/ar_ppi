<?php
require_once '../app/core/PDO.php';
class Product
{
    public $id;
    public $name;
    public $price;
    public $code;
    public $expiration_date;
    public $manufacturer;
    public $description;

    public function __construct($id,$name,$price,$code,$expiration_date,$manufacturer,$description)
    {
        $this->id              = $id; 
        $this->name            = $name;
        $this->price           = $price;
        $this->code            = $code;
        $this->expiration_date = $expiration_date;
        $this->manufacturer    = $manufacturer;
        $this->description     = $description;
    }

    public function __get($atrib)
    {
        return $this->$atrib;
    }

    public static function query($sql)
    {
            $pdo = new usePDO();
            $cnx = $pdo->getInstance();
            $cnx->exec(
            "CREATE TABLE IF NOT EXISTS product (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                name VARCHAR(50) NOT NULL,
                price DECIMAL(10,2) NOT NULL,
                code VARCHAR(50) NOT NULL,
                expiration_date DATE,
                manufacturer VARCHAR(50),
                description TEXT)"
            );
            $result = $cnx->query($sql);
            return $result;
    }

    public static function show($id) {
        $product = Product::query("SELECT id, name, price, code, expiration_date, manufacturer, description FROM product WHERE id = $id");
        $product = $product->fetchAll()[0];
        $product = new Product(
            $product["id"], 
            $product["name"], 
            $product["price"], 
            $product["code"],
            $product["expiration_date"],
            $product["manufacturer"],
            $product["description"]
        );
        return $product;
    }

    public static function listAll() {
        $products = Product::query("SELECT id, name, price, code, expiration_date, manufacturer, description FROM product");
        $products = $products->fetchAll();
        $products_array=[];
        foreach ($products as $result_product){
            $result_product = new Product(
                $result_product["id"], 
                $result_product["name"], 
                $result_product["price"], 
                $result_product["code"],
                $result_product["expiration_date"],
                $result_product["manufacturer"],
                $result_product["description"]
            );
            array_push($products_array, $result_product);
        }
        return $products_array;
    }

    public static function insert($request) {
        $request["expiration-date"] = (($request["expiration-date"] == null) || ($request["expiration-date"] == "")) ? "NULL" : date('Y-m-d', strtotime(str_replace("/", "-", $request["expiration-date"]))); 
        $request["manufacturer"]    = (($request["manufacturer"] == null) || ($request["manufacturer"] == "")) ? "NULL" : $request["manufacturer"];
        $request["description"]     = (($request["description"] == null) || ($request["description"] == "")) ? "NULL" : $request["description"];
        $product = new Product(null, $request["name"], $request["price"], $request["code"], $request["expiration-date"], 
            $request["manufacturer"], $request["description"]);

        $query_1 = "INSERT INTO product(name, price, code";
        $query_2 = ") VALUES ('$product->name', $product->price, '$product->code'";
        $query_3 = ");";

        if ($product->expiration_date != "NULL") {
            $query_1 = $query_1.", expiration_date";
            $query_2 = $query_2.", '$product->expiration_date'";
        }
        if ($product->manufacturer != "NULL") {
            $query_1 = $query_1.", manufacturer";
            $query_2 = $query_2.", '$product->manufacturer'";
        }
        if ($product->description != "NULL") {
            $query_1 = $query_1.", description";
            $query_2 = $query_2.", '$product->description'";
        }

        try {
            $product = Product::query($query_1.$query_2.$query_3);
        }
        catch(Exception $e){
            echo $e;
        }
    }

    public static function update($request) {
        $request["expiration-date"] = (($request["expiration-date"] == null) || ($request["expiration-date"] == "")) ? "NULL" : date('Y-m-d', strtotime(str_replace("/", "-", $request["expiration-date"]))); 
        $request["manufacturer"]    = (($request["manufacturer"] == null) || ($request["manufacturer"] == null)) ? "NULL" : $request["manufacturer"];
        $request["description"]     = (($request["description"] == null) || ($request["description"] == "")) ? "NULL" : $request["description"];

        $product = new Product($request["id"], $request["name"], $request["price"], $request["code"], $request["expiration-date"], 
            $request["manufacturer"], $request["description"]);

        if ($product->expiration_date != "NULL") {
            $product->expiration_date = '\''.$product->expiration_date.'\''; 
        }
        if ($product->manufacturer != "NULL") {
            $product->manufacturer = '\''.$product->manufacturer.'\'';
        }
        if ($product->description != "NULL") {
            $product->description = '\''.$product->description.'\'';
        }

        try {
            $product = Product::query("UPDATE product SET 
            name = '$product->name', 
            price = $product->price,
            code = '$product->code', 
            expiration_date = $product->expiration_date, 
            manufacturer = $product->manufacturer,  
            description = $product->description
            WHERE id = $product->id");
            return $product;
        }
        catch(Exception $e){
            echo $e;
        }
    }

    public static function delete($id) {
        try {
            $product = Product::query("DELETE FROM product WHERE id=$id;");
        }
        catch(Exception $e){
            echo $e;
        }
    }
}
?>