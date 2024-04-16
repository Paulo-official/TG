<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Pedidos</h4>
            <a href="order-create.php" class="btn btn-primary float-end">Adicionar novo pedido</a>
        </div>
        <div class="card-body">
            <?php
            if (isset($_SESSION["create"])) {
            ?>
                <div class="alert alert-success">
                    <?php
                    echo $_SESSION["create"];
                    ?>
                </div>
            <?php
                unset($_SESSION["create"]);
            }
            ?>
            <?php
            if (isset($_SESSION["update"])) {
            ?>
                <div class="alert alert-success">
                    <?php
                    echo $_SESSION["update"];
                    ?>
                </div>
            <?php
                unset($_SESSION["update"]);
            }
            ?>
            <?php
            if (isset($_SESSION["delete"])) {
            ?>
                <div class="alert alert-success">
                    <?php
                    echo $_SESSION["delete"];
                    ?>
                </div>
            <?php
                unset($_SESSION["delete"]);
            }
            ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>Rua</th>
                        <th>Número</th>
                        <th>Complemento</th>
                        <th>Cep</th>
                        <th>Quantidade</th>
                        <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM pedidos";
                        $result = mysqli_query($con, $sql);

                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['rua']; ?></td>
                                <td><?php echo $row['numero']; ?></td>
                                <td><?php echo $row['complemento']; ?></td>
                                <td><?php echo $row['cep']; ?></td>
                                <td><?php echo $row['quantity']; ?></td>
                                <td>
                                    <a class="btn btn-success bnt-sm" href="orders-edit.php?id=<?php echo $row['id']; ?>">Editar</a>
                                    <a class="btn btn-danger bnt-sm" href="orders-delete.php?id=<?php echo $row['id']; ?>">Deletar</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
