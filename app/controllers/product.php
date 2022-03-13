<?php
class Product extends Controller 
{
    public function index($name = '')
    {
        $product = $this->model('Product');
        $product->name = $name;
        
        $this->view('product/index', ['name' => $user->name]);
    }
}
?>