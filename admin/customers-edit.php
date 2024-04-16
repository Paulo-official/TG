<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Editar Clientes</h4>
            <a href="customers.php" class="btn btn-primary float-end">Voltar</a>
        </div>
        <div class="card-body">

            <form action="code.php " method="POST">
                <?php
                $row = null;
                    if (isset($_GET['id'])) {
                        include "../config.php";
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM customers WHERE id=$id";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);

                    }
                ?>
               <input type="hidden" name="customerId" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Nome</label>
                        <input type="text" name="name" value="<?php echo isset($row['name']) ? $row['name'] : ''; ?>" class="form-control" />
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email">Email</label>
                        <input type= "email" name="email" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>"  class="form-control"> </inout>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Telefone</label>
                        <input type="number" name="phone"  value="<?php echo isset($row['phone']) ? $row['phone'] : ''; ?>"  class="form-control">
                    </div>
                    <div class="col-md-6 mb-3 text-end">
                        <br/>
                        <button type="submit" name="updateCustomers" class="btn btn-primary">Salvar</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>