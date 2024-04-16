<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Editar Produtos</h4>
            <a href="products.php" class="btn btn-primary float-end">Voltar</a>
        </div>
        <div class="card-body">

            <form action="code.php " method="POST" enctype="multpart/form-data">

                <input type="hidden" name="product_id" value="<?php  echo $row['id']; ?>">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Selecionar Categoria</label>
                        <select name="category_id" class="form-select">
                            <?php
                            $query = "SELECT id, name FROM categories";
                            $result = mysqli_query($con, $query);
                             if (mysqli_num_rows($result) > 0) {
                         while ($category = mysqli_fetch_assoc($result)) {
                             $selected = ($category['id'] == $row['category_id']) ? 'selected' : '';
                            echo "<option value='" . $category['id'] . "' $selected>" . $category['name'] . "</option>";
                      }
                         } else {
                             echo "<option value=''>Nenhuma categoria encontrada</option>";
                         }
                         mysqli_close($con);
                        ?>
                        </select>

                        <?php 
                            if (isset($_GET['id'])) {
                                include "../config.php";
                                $id = $_GET['id'];
                                $sql = "SELECT * FROM products WHERE id=$id";
                                $result = mysqli_query($con, $sql);
                                $row = mysqli_fetch_array($result);
                        
                            }
                        ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">Nome do produto</label>
                        <input type="text" name="name" value="<?php  echo $row['name']; ?>" required
                            class="form-control" />
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="name">Descrição</label>
                        <textarea name="description" class="form-control" rows="3"><?php echo $row['description']; ?></textarea>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="name">Preço*</label>
                        <input type="text" name="price" value="<?php echo $row['price']; ?>" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="name">Quantidade*</label>
                        <input type="text" name="quantity" value="<?php echo $row['quantity']; ?>" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="">Imagem</label>
                        <input type="file" name="imagem" class="form-control">
                        <img src="../<?php echo $row['imagem']; ?>" style="width:40px; height:40px;" alt="" />
                    </div>

                    <div class="col-md-6">
                        <label>Status</label>
                        <br />
                        <input type="checkbox" name="status"
                            value="<?php  echo $row['status'] == true ? 'checked': ''; ?>"
                            style="width: 30px;, height: 20px;">
                    </div>

                    <div class="col-md-6 mb-3 text-end">
                        <br />
                        <button type="submit" name="updateProduct" class="btn btn-primary">Salvar</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>

