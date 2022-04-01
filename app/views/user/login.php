<?php 
require_once("../app/views/components/TextInputField.php"); 
require_once("../app/views/components/PasswordField.php"); 
?>
<div class="container border align-middle w-50">
    <h1>Login</h1>
    <hr>
    <form method="POST" action="login">
        <?php 
            $input_username = new TextInputField("w-100 p-3", "username", "username", "Usuário", "Usuário:", '<i class="fa-solid fa-user"></i>');
            $input_password = new PasswordField("w-100 p-3", "password", "password", "Senha", "Senha:", '<i class="fa-solid fa-lock"></i>');
            echo $input_username->html;
            echo $input_password->html;
        ?>
        <div class="row">
            <input class="btn btn-success w-25 m-3" type="submit" value="Login">
            <button type="button" class="btn btn-primary w-25 m-3" onclick="register()">Registra-se</button>
        </div>
    </form>
</div>
<script>
    function register() {
        $.ajax({
            type: 'GET',
            url: 'http://localhost/ar_ppi/public/user/register',
            data: {},
            success: function(data){
                window.location.href = 'http://localhost/ar_ppi/public/user/register';
            }
        });
    }
</script>