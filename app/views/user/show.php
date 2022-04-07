<?php 
    require_once "../app/models/Product.php";
    require_once("../app/views/components/TextInputField.php"); 
    require_once("../app/views/components/PasswordField.php"); 
    $id = explode("/", $_GET["url"])[2];
    $user = User::show($id);
?>
<div class="container border align-middle w-50">
    <h1>Visualizar Usuário</h1>
    <hr>
    <form method="GET" action="../index">
        <input hidden value="<?= $id ?>" id="id" name="id" />
        <?php 
            $input_name = new TextInputField("w-100 p-3", "name", "name", "Nome", "Nome:", '<i class="fa-solid fa-person"></i>', $user->name, true);
            $input_username = new TextInputField("w-100 p-3", "username", "username", "Usuário", "Usuário:", '<i class="fa-solid fa-user"></i>', $user->username, true);
            echo $input_name->html;
            echo $input_username->html;
        ?>
        <div class="row">
            <input class="btn btn-primary w-25 m-3" type="submit" value="Retornar">
        </div>
    </form>
</div>