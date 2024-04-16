<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Adicionar Clientes</h4>
            <a href="customers.php" class="btn btn-primary float-end">Voltar</a>
        </div>
        <div class="card-body">

            <form action="code.php " method="POST">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Nome</label>
                        <input type="text" name="name" required class="form-control" />
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email">Email</label>
                        <input type= "email" name="email"  class="form-control"> </inout>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Telefone</label>
                        <input type="number" name="phone"  class="form-control">
                    </div>
                    <div class="col-md-6 mb-3 text-end">
                        <br/>
                        <button type="submit" name="saveCustomers" class="btn btn-primary">Salvar</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>