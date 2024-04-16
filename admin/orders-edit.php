<?php include('includes/header.php'); ?>
<?php include "../config.php"; // Incluir config.php fora do bloco condicional ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Editar Pedidos</h4>
            <a href="orders.php" class="btn btn-primary float-end">Voltar</a>
        </div>
        <div class="card-body">

            <form action="orders-code.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <?php 
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM pedidos WHERE id=$id";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                        }
                    ?>
                    <div class="col-md-12 mb-3">
                        <label for="">Selecionar Produtos</label>
                        <select name="productId" class="form-select">
                            <?php
                            $query = "SELECT id, name FROM products";
                            $result = mysqli_query($con, $query);
                            if (mysqli_num_rows($result) > 0) {
                                while ($productId = mysqli_fetch_assoc($result)) {
                                    $selected = ($productId['id'] == $row['productId']) ? 'selected' : '';
                                    echo "<option value='" . $productId['id'] . "' $selected>" . $productId['name'] . "</option>";
                                }
                            } else {
                                echo "<option value=''>Nenhuma produto encontrado</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">Nome</label>
                        <input type="text" name="rua" placeholder="Nome da rua" value="<?php echo $row["rua"]; ?>"
                               class="form-control" />
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="name">Número</label>
                        <input type="text" class="form-control" name="numero" placeholder="Número"
                               value="<?php echo $row['numero']; ?>">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="name">Complemento</label>
                        <input type="text" name="complemento" value="<?php echo $row['complemento']; ?>" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="name">CEP</label>
                        <input type="number" name="cep" value="<?php echo $row['cep']; ?>" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="">Quantidade</label>
                        <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>" class="form-control">
                    </div>

                    <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                    <div class="col-md-6 mb-3 text-end">
                        <br />
                        <button type="submit" name="editOrder" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
