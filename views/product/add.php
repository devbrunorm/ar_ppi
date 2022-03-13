<?php
    require_once("controllers/Product.php");
    require_once("View/Components/TextInputField.php");
    require_once("View/Components/TextAreaField.php");
?>

<div class="container border align-middle">
    <h1>Adicionar Produto</h1>
    <hr>
    <form method="POST" action="controllers/Product.php?q=insert">
        <div class="row">
            <?php 
                $input_name = new TextInputField("w-50 p-3", "name", "name", "Produto", "Nome do produto:", "Nome");
                $input_price = new TextInputField("w-50 p-3", "price", "price", "Preço", "Preço:", "R$");
                echo $input_name->html;
                echo $input_price->html;
            ?>
        </div>
        <div class="row">
            <?php 
                $input_code = new TextInputField("w-25 p-3", "code", "code", "000000000", "Código de barras:", "Código");
                $input_expiration_date = new TextInputField("w-25 p-3", "expiration-date", "expiration-date", "01/01/2000", "Data de Validade:", "Validade");
                $input_manufacturer = new TextInputField("w-50 p-3", "manufacturer", "manufacturer", "Companhia LTDA.", "Fabricante", "Fabricante");
                echo $input_code->html;
                echo $input_expiration_date->html;
                echo $input_manufacturer->html;
            ?>
        </div>
        <?php 
            $textarea_description = new TextAreaField("w-100 p-1.5", "description", "description", "Descrição", "Descrição do Produto:", "Descrição");
            echo $textarea_description->html;
        ?>
        <div class="row">
            <input class="btn btn-success" type="submit" value="Submit">
            <button type="button" class="btn btn-danger w-25 m-3">Cancelar</button>
        </div>
    </form>
</div>