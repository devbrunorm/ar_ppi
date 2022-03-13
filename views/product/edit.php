<?php
    require_once("./classes/product.php");
    require_once("./View/Components/TextInputField.php");
    require_once("./View/Components/TextAreaField.php");
?>

<div class="container border align-middle">
<h1>Editar Produto</h1>
<hr>
<div class="row">
    <?php 
        $input_name = new TextInputField("w-50 p-3", "product-name", "Produto", "Nome do produto:", "Nome");
        $input_price = new TextInputField("w-50 p-3", "product-price", "Preço", "Preço:", "R$");
        echo $input_name->html;
        echo $input_price->html;
    ?>
</div>
<div class="row">
    <?php 
        $input_codebar = new TextInputField("w-25 p-3", "product-codebar", "000000000", "Código de barras:", "Código");
        $input_expiration_date = new TextInputField("w-25 p-3", "product-expiration-date", "01/01/2000", "Data de Validade:", "Validade");
        $input_manufacturer = new TextInputField("w-50 p-3", "product-manufacturer", "Companhia LTDA.", "Fabricante", "Fabricante");
        echo $input_codebar->html;
        echo $input_expiration_date->html;
        echo $input_manufacturer->html;
    ?>
</div>
<?php 
    $textarea_description = new TextAreaField("w-100 p-1.5", "product-description", "Descrição", "Descrição do Produto:", "Descrição");
    echo $textarea_description->html;
?>
<div class="row">
    <button type="button" class="btn btn-success w-25 m-3">Adicionar</button>
    <button type="button" class="btn btn-danger w-25 m-3">Cancelar</button>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>