<?php

use Application\core\Controller;

class Product extends Controller
{
  public function index()
  {
    $Product = $this->model('Product');
    $data = $Product::findAll();
    $this->view('product/index', ['products' => $data]);
  }

  public function show($id = null)
  {
    if (is_numeric($id)) {
      $Users = $this->model('Product');
      $data = $Users::findById($id);
      $this->view('product/show', ['product' => $data]);
    } else {
      $this->pageNotFound();
    }
  }
}