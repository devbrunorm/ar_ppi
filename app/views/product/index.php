<div class="container border align-middle">
    <div class="row d-flex justify-content-between">
        <h1 class="mb-2 ml-3">Produtos</h1>
        <button class="btn btn-success mb-2 mt-2 mr-3" onclick="addProduct()"><i class="fa-solid fa-plus mr-2"></i>Adicionar</button>
    </div>
    <table class="table">
    <thead clas="table-borderless">
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Código</th>
        <th scope="col">Nome</th>
        <th scope="col">Preço</th>
        <th scope="col">Fabricante</th>
        <th scope="col">Descrição</th>
        <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data["products"] as $product): ?>
            <tr>
                <th scope="row"><?php echo $product->id ?></th>
                <td><a href="http://localhost/ar_ppi/public/product/show/<?= $product->id ?>"><?php echo $product->code ?></a></td>
                <td><a href="http://localhost/ar_ppi/public/product/show/<?= $product->id ?>"><?php echo $product->name ?></a></td>
                <td><?php echo "R$ ".MonetaryValue::value_to_string($product->price) ?></td>
                <td><?php echo $product->manufacturer?$product->manufacturer:"-" ?></td>
                <td><?php echo $product->description?$product->description:"-" ?></td>
                <td>
                    <button type="button" class="btn btn-warning" onclick="editProductId(<?= $product->id ?>)"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button type="button" class="btn btn-danger" onclick="deleteProductId(<?= $product->id ?>)"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
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

    function editProductId(id) {
        $.ajax({
            type: 'GET',
            url: 'http://localhost/ar_ppi/public/product/edit/'+id,
            data: { 
                "id" : id
            },
            success: function(data){
                window.location.href = 'http://localhost/ar_ppi/public/product/edit/'+id;
            }
        });
    }

    function showProductId(id) {
        $.ajax({
            type: 'GET',
            url: 'http://localhost/ar_ppi/public/product/show/'+id,
            data: { 
                "id" : id
            },
            success: function(data){
                window.location.href = 'http://localhost/ar_ppi/public/product/show/'+id;
            }
        });
    }

    function deleteProductId(id) {
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