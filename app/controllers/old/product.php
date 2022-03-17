<?php
    set_include_path("../");
    require_once 'models/product.php';

    class ProductController {
        public static function list() {
            $products = Product::select();

            $_REQUEST['products'] = $products;

            require_once 'View/product/index.php';
        }

        public static function add() {
            $products = Product::select();

            $_REQUEST['products'] = $products;

            require_once 'View/product/index.php';
        }
    }
?>