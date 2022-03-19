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
    public $quantity;
    public $description;

    public function __construct($id,$name,$price,$code,$expiration_date,$manufacturer,$quantity,$description)
    {
        $this->id              = $id; 
        $this->name            = $name;
        $this->price           = $price;
        $this->code            = $code;
        $this->expiration_date = $expiration_date;
        $this->manufacturer    = $manufacturer;
        $this->quantity        = $quantity;
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
                quantity DECIMAL(10,5),
                description TEXT)"
            );
            $result = $cnx->query($sql);
            return $result;
    }

    public static function view($id) {
        $product = Product::query("SELECT id, name, price, code, expiration_date, manufacturer, quantity, description FROM product WHERE id = $id");
        $product = $product->fetchAll()[0];
        $product = new Product(
            $product["id"], 
            $product["name"], 
            $product["price"], 
            $product["code"],
            $product["expiration_date"],
            $product["manufacturer"],
            $product["quantity"],
            $product["description"]
        );
        return $product;
    }

    public static function listAll() {
        $products = Product::query("SELECT id, name, price, code, expiration_date, manufacturer, quantity, description FROM product");
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
                $result_product["quantity"],
                $result_product["description"]
            );
            array_push($products_array, $result_product);
        }
        return $products_array;
    }

    public static function insert($request) {

        $request["expiration-date"] = (($request["expiration-date"] == null) || ($request["expiration-date"] == "")) ? "NULL" : $request["expiration-date"]; 
        $request["manufacturer"]    = (($request["manufacturer"] == null) || ($request["manufacturer"])) ? "NULL" : $request["manufacturer"];
        // $request["quantity"]        = ($request["quantity"] == null) ? "NULL" : $request["quantity"];
        $request["description"]     = (($request["description"] == null) || ($request["description"] == "")) ? "NULL" : $request["description"];

        $product = new Product(null, $request["name"], $request["price"], $request["code"], $request["expiration-date"], 
        $request["manufacturer"], null, $request["description"]);

        try{
            $product = Product::query("INSERT INTO product(name, price, code, expiration_date, manufacturer, quantity, description) 
            VALUES ('$product->name', $product->price, '$product->code', $product->expiration_date, $product->manufacturer, NULL, $product->description);");
        }
        catch(Exception $e){
            echo $e;
        }
    }

    public static function update($request) {
        $request["expiration_date"] = (($request["expiration_date"] == null) || ($request["expiration_date"] == "")) ? "NULL" : $request["expiration_date"]; 
        $request["manufacturer"]    = (($request["manufacturer"] == null) || ($request["manufacturer"])) ? "NULL" : $request["manufacturer"];
        // $request["quantity"]        = ($request["quantity"] == null) ? "NULL" : $request["quantity"];
        $request["description"]     = (($request["description"] == null) || ($request["description"] == "")) ? "NULL" : $request["description"];

        $product = new Product($request["id"], $request["name"], $request["price"], $request["code"], $request["expiration_date"], 
        $request["manufacturer"], null, $request["description"]);

        try{
            $product = Product::query("UPDATE product SET 
            name = '$product->name', 
            price = $product->price,
            code = '$product->code', 
            expiration_date = $product->expiration_date, 
            manufacturer = $product->manufacturer, 
            quantity = NULL, 
            description = $product->description
            WHERE id = $product->id");
            return $product;
        }
        catch(Exception $e){
            echo $e;
        }
    }

    public static function delete($id) {
        try{
            $product = Product::query("DELETE FROM product WHERE id=$id;");
        }
        catch(Exception $e){
            echo $e;
        }
    }
}
?>