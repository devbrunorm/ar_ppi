<?php 
    require_once "../app/models/Product.php";
    require_once("../app/views/components/TextInputField.php"); 
    require_once("../app/views/components/PasswordField.php"); 
    $id = explode("/", $_GET["url"])[2];
    $user = User::show($id);
?>
<div class="container border align-middle w-50">
    <h1>Editar Usuário</h1>
    <hr>
    <form method="POST" action="../edit/<?=$id?>">
        <input hidden value="<?= $id ?>" id="id" name="id" />
        <?php 
            $input_name = new TextInputField("w-100 p-3", "name", "name", "Nome", "Nome:", '<i class="fa-solid fa-person"></i>', $user->name);
            $input_username = new TextInputField("w-100 p-3", "username", "username", "Usuário", "Usuário:", '<i class="fa-solid fa-user"></i>', $user->username, false, true);
            $input_password = new PasswordField("w-100 p-3", "password", "password", "Senha", "Senha:", '<i class="fa-solid fa-lock"></i>', false);
            echo $input_name->html;
            echo $input_username->html;
            echo $input_password->html;
        ?>
        <div class="row">
            <input class="btn btn-success w-25 m-3" type="submit" value="Editar">
        </div>
    </form>
</div>