<div class="container border align-middle">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Código</th>
        <th scope="col">Nome</th>
        <th scope="col">Preço</th>
        </tr>
    </thead>
        <tbody>
            <?php foreach($data["products"] as $product): ?>
                <tr>
                <th scope="row"><?php echo $product->id ?></th>
                <td><?php echo $product->code ?></td>
                <td><?php echo $product->name ?></td>
                <td><?php echo $product->price ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>