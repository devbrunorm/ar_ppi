<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="http://localhost/ar_ppi/public/home/index">Sistema</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/ar_ppi/public/product/index" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Produtos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/ar_ppi/public/user/index" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Usuários
                </a>
            </li>
        </ul>
    </div>
    <?php if (isset($_SESSION["username"])) {?>
        <a class="nav-link"> <?= $_SESSION["username"] ?> </a>
        <a class="nav-link" onclick="logout()"> <?= "Logout" ?> </a>
    <?php } else { ?>
        <a class="nav-link" href="http://localhost/ar_ppi/public/user/login"> <?= "Login" ?> </a>
    <?php } ?>
</nav>
<script>
    function logout() {
        let logout_confirm = confirm("Deseja mesmo sair?");
        if (logout_confirm) {
                $.ajax({
                type: 'GET',
                url: 'http://localhost/ar_ppi/public/user/logout',
                data: {},
                success: function(data){
                    window.location.href = 'http://localhost/ar_ppi/public/user/logout';
                }
            });
        }
    }
</script>