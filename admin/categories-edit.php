<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Editar Categoria</h4>
            <a href="categories.php" class="btn btn-primary float-end">Voltar</a>
        </div>
        <div class="card-body">

            <form action="code.php " method="POST">
                <?php
                   if (isset($_GET['id'])) {
                    include "../config.php";
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM categories WHERE id=$id";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($result);
                ?>
                <input type="hidden" name="categoryId" value="<?php echo $row['id']; ?>">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Nome</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" />
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="name">Descrição</label>
                        <textarea name="description"  class="form-control" rows="3" value="<?php echo $row['description']; ?>"></textarea>
                    </div>

                    <div class="col-md-6">
                        <label>Status</label>
                        <br/>
                        <input type="checkbox" name="status" value="<?php  echo $row['status'] == true ? 'checked': ''; ?>" style="width: 30px;, height: 20px;">
                    </div>
                    
                    <div class="col-md-6 mb-3 text-end">
                        <br/>
                        <button type="submit" name="updateCategory" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
                <?php
                 }
                 else{
                        echo '<h4>' .$row['message']. '</h4>';
                 }
                 ?>
            </form>

        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>