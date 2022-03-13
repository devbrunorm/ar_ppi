<?php
    var_dump($_GET);
    $classe = $_GET['class'];
    $metodo = $_GET['acao'];

    require_once("controllers/'.$classe.'.php");
    require_once("utils/monetaryValue.php");

    $products = $_REQUEST['products'];
    
    $classe::$metodo();
?>
    <div class="container border align-middle">
        <h1>Produtos</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                </tr>
            </thead>
            <tbody>
    <?php foreach ($products as $product): ?>
                <tr>
                <th scope="row"> <?= $product->id ?></th>
                <td> <?= $product->code ?></td>
                <td> <?= $product->name ?></td>
                <td> <?= $product->price?></td>
                </tr>
    <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>