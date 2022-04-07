<?php
    require_once("../app/views/components/TextInputField.php");
    require_once("../app/views/components/TextAreaField.php");
?>

<div class="container border align-middle">
    <h1>Adicionar Produto</h1>
    <hr>
    <form method="POST" action="add">
        <div class="row">
            <?php 
                $input_name = new TextInputField("w-50 p-3", "name", "name", "Produto", "Nome do produto:", '<i class="fa-solid fa-box"></i>', null, false, true);
                $input_price = new TextInputField("w-50 p-3", "price", "price", "Preço", "Preço:", "R$", null, false, true);
                echo $input_name->html;
                echo $input_price->html;
            ?>
        </div>
        <div class="row">
            <?php 
                $input_code = new TextInputField("w-25 p-3", "code", "code", "000000000", "Código de barras:", '<i class="fa-solid fa-barcode"></i>', null, false, true);
                $input_expiration_date = new TextInputField("w-25 p-3", "expiration-date", "expiration-date", "01/01/2000", "Data de Validade:", '<i class="fa-solid fa-tag"></i>');
                $input_manufacturer = new TextInputField("w-50 p-3", "manufacturer", "manufacturer", "Companhia LTDA.", "Fabricante", '<i class="fa-solid fa-screwdriver"></i>');
                echo $input_code->html;
                echo $input_expiration_date->html;
                echo $input_manufacturer->html;
            ?>
        </div>
        <?php 
            $textarea_description = new TextAreaField("w-100 p-1.5", "description", "description", "Descrição", "Descrição do Produto:", '<i class="fa-solid fa-file-lines"></i>');
            echo $textarea_description->html;
        ?>
        <div class="row">
            <input class="btn btn-success w-25 m-3" type="submit" value="Adicionar">
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