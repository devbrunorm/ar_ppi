<div class="container border align-middle">
    <div class="row d-flex justify-content-between">
        <h1 class="mb-2 ml-3">Usuários</h1>
        <button class="btn btn-success mb-2 mt-2 mr-3" onclick="addUser()"><i class="fa-solid fa-plus mr-2"></i>Adicionar</button>
    </div>
    <table class="table">
    <thead clas="table-borderless">
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Usuário</th>
        <th scope="col">Nome</th>
        <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data["users"] as $user): ?>
            <tr>
                <th scope="row"><?php echo $user->id ?></th>
                <td><a href="http://localhost/ar_ppi/public/user/show/<?= $user->id ?>"><?php echo $user->username ?></a></td>
                <td><?php echo $user->name?$user->name:"-" ?></td>
                <td>
                    <button type="button" class="btn btn-warning" onclick="editUserId(<?= $user->id ?>)"><i class="fa-solid fa-pen-to-square"></i></button>
                    <?php if ($user->id != $_SESSION["id"]) { ?>
                        <button type="button" class="btn btn-danger" onclick="deleteUserId(<?= $user->id ?>)"><i class="fa-solid fa-trash"></i></button>
                    <?php } else { ?>
                        <button type="button" class="btn btn-danger" disabled><i class="fa-solid fa-trash"></i></button>
                    <?php } ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>
<script>
    function addUser() {
        $.ajax({
            type: 'GET',
            url: 'http://localhost/ar_ppi/public/user/add',
            data: {},
            success: function(data){
                window.location.href = 'http://localhost/ar_ppi/public/user/add';
            }
        });
    }

    function editUserId(id) {
        $.ajax({
            type: 'GET',
            url: 'http://localhost/ar_ppi/public/user/edit/'+id,
            data: { 
                "id" : id
            },
            success: function(data){
                window.location.href = 'http://localhost/ar_ppi/public/user/edit/'+id;
            }
        });
    }

    function deleteUserId(id) {
        $.ajax({
            type: 'GET',
            url: "delete/"+id,
            data: { 
                "id" : id
            },
            success: function(data){
                alert("Deletado com sucesso!");
                window.location.reload(true);
            }
        });
    }
</script>