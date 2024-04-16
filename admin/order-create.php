<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Criar Pedido</h4>
            <a href="orders.php" class="btn btn-primary float-end">Voltar</a>
        </div>
        <div class="card-body">

            <form action="orders-code.php" method="POST">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Selecione o produto</label>
                        <select name="product_id" class="form-select">
                            <option value="">Selecione o Produto</option>
                            <?php
                            $query = "SELECT id, name FROM products";
                            $result =  mysqli_query($con, $query);
                            if (mysqli_num_rows($result) > 0) {
                                // Loop através das linhas da consulta
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                }
                            } else {
                                echo "<option value=''>Nenhum produto encontrado</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Quantidade</label>
                        <input type="number" name="quantity" value="1" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="name">Nome da rua</label>
                        <input type="text" class="form-control" name="rua" placeholder="Nome da rua">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Número</label>
                        <input type="number" class="form-control" name="numero" placeholder="Número">
                    </div>

                    <div class="col-md-6">
                        <label>Complemento</label>
                        <input type="text" class="form-control" name="complemento" placeholder="Complemento">
                    </div>

                    <div class="col-md-6">
                        <label>CEP</label>
                        <input type="number" class="form-control" name="cep" placeholder="CEP">
                    </div>

                    <div class="col-md-12 mb-3 text-end">
                        <br/>
                        <button type="submit" name="Create" class="btn btn-success">Salvar</button>
                    </div>
                </div>
                        
            </form>
            

        </div>
    </div>
   
</div>
<?php include('includes/footer.php'); ?>
