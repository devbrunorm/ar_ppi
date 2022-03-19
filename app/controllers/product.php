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

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view('product/add', []);
        }
        else if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            $request = $_POST;
            $request["price"] = MonetaryValue::string_to_value($request["price"]);
            Product::insert($request);
            $this->index();
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
            $product = Product::update($request);
            $response_array['status'] = 'success';
            $response_attay['product'] = $product;
            return json_encode($response_array);
        }
    }

    public function delete($id)
    {
        Product::delete($id);
        $this->view('product/index', ["products" => $products]);
    }
}
?>