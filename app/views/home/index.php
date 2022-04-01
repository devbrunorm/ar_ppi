<div class="container align-middle">
    <div class="card">
        <div class="card-header">
            <h1>Bem vindo, <?= $_SESSION["username"] ?>!</h1>
        </div>
        <div class="card-body row">
            <div class="w-25 p-2">
                <button class="btn btn-success w-100" onclick="addProduct()">
                        <span><i class="fa-solid fa-box"></i></span>
                        <p>Cadastrar novo produto</p>
                </button>
            </div>
            <div class="w-25 p-2">
                <button class="btn btn-primary w-100" onclick="listProduct()">
                        <span><i class="fa-solid fa-boxes-stacked"></i></span>
                        <p>Consultar produtos</p>
                </button>
            </div>
            <div class="w-25 p-2">
                <button class="btn btn-warning w-100" onclick="listUser()">
                        <span><i class="fa-solid fa-user"></i></span>
                        <p>Gerenciar usuários</p>
                </button>
            </div>
            <div class="w-25 p-2">
                <button class="btn btn-danger w-100" onclick="logout()">
                        <span><i class="fa-solid fa-right-from-bracket"></i></span>
                        <p>Logout</p>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function addProduct() {
        $.ajax({
            type: 'GET',
            url: 'http://localhost/ar_ppi/public/product/add',
            data: {},
            success: function(data){
                window.location.href = 'http://localhost/ar_ppi/public/product/add';
            }
        });
    }

    function listProduct() {
        $.ajax({
            type: 'GET',
            url: 'http://localhost/ar_ppi/public/product/index',
            data: {},
            success: function(data){
                window.location.href = 'http://localhost/ar_ppi/public/product/index';
            }
        });
    }

    function listUser() {
        $.ajax({
            type: 'GET',
            url: 'http://localhost/ar_ppi/public/user/index',
            data: {},
            success: function(data){
                window.location.href = 'http://localhost/ar_ppi/public/user/index';
            }
        });
    }
</script>