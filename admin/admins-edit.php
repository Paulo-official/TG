<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Editar Admin</h4>
            <a href="admins.php" class="btn btn-danger float-end">Voltar</a>
        </div>
        <div class="card-body">

            <form action="code.php" method="POST">
             <!-- PHP -->
                <?php
                    $row = null;

                    if (isset($_GET['id'])) {
                        include "../config.php";
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM admins WHERE id=$id";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                    }
                    ?>
                    <input type="hidden" name="adminId" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Nome</label>
                            <input type="text" name="name" value="<?php echo isset($row['name']) ? $row['name'] : ''; ?>" class="form-control" />
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="name">Email</label>
                            <input type="email" name="email" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>" class="form-control" />
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="password">Senha</label>
                            <input type="password" name="password" value="<?php echo isset($row['password']) ? $row['password'] : ''; ?>" class="form-control" />
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Telefone</label>
                            <input type="number" name="phone" value="<?php echo isset($row['phone']) ? $row['phone'] : ''; ?>" class="form-control" />
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="">Proibido?</label>
                            <input type="checkbox" name="is_ban" <?php echo isset($row['is_ban']) && $row['is_ban'] == true ? 'checked':''; ?> style="width:30px; height:20px;" />
                        </div>
                        <div class="col-md-12 mb-3 text-end">
                            <button type="submit" name="edit" class="btn btn-primary">Salvar Informações</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
