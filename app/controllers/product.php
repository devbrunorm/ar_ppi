<?php
require_once "../app/models/Product.php";
require_once "../app/utils/monetaryValue.php";
class ProductController extends Controller 
{
    public function index()
    {   
        $products = Product::listAll();

        $this->view('product/index', ["products" => $products]);
    }

    public function show($id)
    {   
        $product = Product::show($id);

        $this->view('product/show', ["product" => $product]);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view('product/add', []);
        }
        else if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            $request = $_POST;
            $request["price"] = MonetaryValue::string_to_value($request["price"]);
            $request["expiration_date"] = $request["expiration-date"];
            Product::insert($request);
            // header("Location: http://localhost/ar_ppi/public/product/index");
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view('product/edit', $id);
        }
        else if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            $request = $_POST;
            $request["price"] = MonetaryValue::string_to_value($request["price"]);
            $request["expiration_date"] = $request["expiration-date"];
            Product::update($request);
            // header("Location: http://localhost/ar_ppi/public/product/index");
        }
    }

    public function delete($id)
    {
        Product::delete($id);
        $this->view('product/index', ["products" => $products]);
    }
}
?>