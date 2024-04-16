<?php
include('includes/header.php');
?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Produtos</h4>
            <a href="products-create.php" class="btn btn-primary float-end">Adicionar Produtos</a>
        </div>
        <div class="card-body">
            <?php
            $sql = "SELECT * FROM products";
            $result = mysqli_query($con, $sql);
            if (!$result) {
                die("Erro ao buscar produtos: " . mysqli_error($con));
            }

            // Verifica se há produtos a serem exibidos
            if (mysqli_num_rows($result) > 0) {
            ?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Imagem</th>
                                <th>Status</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td>
                                        <img src="<?php echo $row['imagem']; ?>" style="width:50px;height:50px;" alt="Imagem do Produto">
                                    </td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td>
                                        <a class="btn btn-success bnt-sm" href="products-edit.php?id=<?php echo $row['id']; ?>">Editar</a>
                                        <a class="btn btn-danger bnt-sm" href="products-delete.php?id=<?php echo $row['id']; ?>">Deletar</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php
            } else {
                echo "<p>Nenhum produto encontrado.</p>";
            }
            ?>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
