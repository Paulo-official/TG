<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Admins/Funcionários</h4>
            <a href="admins-create.php" class="btn btn-primary float-end">Adicionar Admin</a>
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
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Banido</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM admins";
                        $result = mysqli_query($con, $sql);

                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['is_ban']; ?></td>
                                <td>
                                    <a class="btn btn-success bnt-sm" href="admins-edit.php?id=<?php echo $row['id']; ?>">Editar</a>
                                    <a class="btn btn-danger bnt-sm" href="admins-delete.php?id=<?php echo $row['id']; ?>">Deletar</a>
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
