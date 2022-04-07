<?php
    require_once ("../app/models/Product.php");
    require_once ("../app/utils/monetaryValue.php");
    require_once("../app/views/components/TextInputField.php");
    require_once("../app/views/components/TextAreaField.php");
    $id = explode("/", $_GET["url"])[2];
    $product = Product::show($id);
    if (!empty($product->expiration_date)) {
        $data_array = explode("-", $product->expiration_date);
        $product->expiration_date = implode("/", array_reverse($data_array));
    }
?>

<div class="container border align-middle">
    <h1>Editar Produto</h1>
    <hr>
    <form method="POST" action="../edit/<?= $product->id ?>">
        <input hidden value="<?= $id ?>" id="id" name="id" />
        <div class="row">
            <?php 
                $input_name = new TextInputField("w-50 p-3", "name", "name", "Produto", "Nome do produto:", '<i class="fa-solid fa-box"></i>', $product->name, false, true);
                $input_price = new TextInputField("w-50 p-3", "price", "price", "Preço", "Preço:", "R$", MonetaryValue::value_to_string($product->price), false, true);
                echo $input_name->html;
                echo $input_price->html;
            ?>
        </div>
        <div class="row">
            <?php 
                $input_code = new TextInputField("w-25 p-3", "code", "code", "000000000", "Código de barras:", '<i class="fa-solid fa-barcode"></i>', $product->code, false, true);
                $input_expiration_date = new TextInputField("w-25 p-3", "expiration-date", "expiration-date", "01/01/2000", "Data de Validade:", '<i class="fa-solid fa-tag"></i>', $product->expiration_date);
                $input_manufacturer = new TextInputField("w-50 p-3", "manufacturer", "manufacturer", "Companhia LTDA.", "Fabricante", '<i class="fa-solid fa-screwdriver"></i>', $product->manufacturer);
                echo $input_code->html;
                echo $input_expiration_date->html;
                echo $input_manufacturer->html;
            ?>
        </div>
        <?php 
            $textarea_description = new TextAreaField("w-100 p-1.5", "description", "description", "Descrição", "Descrição do Produto:", '<i class="fa-solid fa-file-lines"></i>', $product->description);
            echo $textarea_description->html;
        ?>
        <div class="row">
            <input class="btn btn-success w-25 m-3" type="submit" value="Editar">
            <button type="button" class="btn btn-danger w-25 m-3" onclick="returnToIndex()">Cancelar</button>
        </div>
    </form>
</div>
<script>
    function returnToIndex() {
        $.ajax({
            type: 'GET',
            url: 'http://localhost/ar_ppi/public/product/index',
            data: {},
            success: function(data){
                window.location.href = 'http://localhost/ar_ppi/public/product/index';
            }
        });
    }
</script>