<?php
include('../config/function.php');
include('../config.php');

///SALVAR
if(isset($_POST['saveAdmin'])) {
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone']);
    $is_ban = validate($_POST['is_ban']) == true ? 1 : 0;

    if($name != '' && $email != '' && $password != '') {
        $emailCheck = mysqli_query($con, "SELECT * FROM admins WHERE email ='$email'");
        if($emailCheck && mysqli_num_rows($emailCheck) > 0) {
            redirect('admins-create.php', 'Email já está em uso por outro usuário!');
        }
        $bcrypt_password = password_hash($password, PASSWORD_BCRYPT);

        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $bcrypt_password,
            'phone' => $phone,
            'is_ban' => $is_ban,
        ];
        $result = insert('admins', $data);
        if($result) {
            redirect('admins.php', 'Admin criado com sucesso!');
        } else {
            redirect('admins-create.php', 'Alguma coisa deu errado!');
        }
    } else {
        redirect('admins-create.php', 'Por favor, preencha os campos obrigatórios');
    }
}

//UPDATE
if(isset($_POST['edit'])) {
    $adminId = validate($_POST['adminId']);

    $adminData = getById('admins', $adminId);
    if($adminData['status'] != 200) {
        redirect('admins-edit.php', 'Por favor, insira os campos obrigatórios');
    }

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone']);
    $is_ban = isset($_POST['is_ban']) ? 1 : 0;

    $EmailCheckQuery = "SELECT * FROM admins WHERE  email='$email' AND id!='$adminId'";
    $checkResult = mysqli_query($con, $EmailCheckQuery);
    if($checkResult && mysqli_num_rows($checkResult) > 0) {
        redirect('admins-edit.php', 'Email já está em uso');
    }

    if($password != '') {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    } else {
        $hashedPassword = $adminData['data']['password'];
    }

    if($name != '' && $email != '') {
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'phone' => $phone,
            'is_ban' => $is_ban,
        ];
        $result = insert('admins', $data);
        if($result) {
            redirect('admins.php', 'Admin criado com sucesso!');
        } else {
            redirect('admins-create.php', 'Alguma coisa deu errado!');
        }
    } else {
        redirect('admins-create.php', 'Por favor, preencha os campos obrigatórios');
    }
}

//process de mostrar a lista de admin
if(isset($_POST['create'])) {
    if(isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['is_ban'], $_POST['phone'])) {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $is_ban = mysqli_real_escape_string($con, $_POST['is_ban']);

        $sql = "INSERT INTO admins (name, email, password, phone, is_ban) VALUES ('$name', '$email', '$password', '$phone', '$is_ban')"; 

        if(mysqli_query($con, $sql)) {
            session_start();
            $_SESSION['create'] = "Dados inseridos com sucesso!";
            header('location: admins.php');
        } else {
            die('Something went wrong');
        }
    }
    if(isset($_POST['edit'])) {
        $id = mysqli_real_escape_string($con, $_POST['adminId']);
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $is_ban = mysqli_real_escape_string($con, $_POST['is_ban']) ? 1 : 0;

        $sqlUpdate = "UPDATE admins SET name = '$name', email='$email', phone='$phone', password = '$password', is_ban ='$is_ban' WHERE id='$id'";

        if(mysqli_query($con, $sqlUpdate)) {
            session_start();
            $_SESSION['update'] = "Dados atualizados com sucesso!";
            header("Location: admins.php");
        } else {
            die("Algo deu errado!");
        }
    }
}


//CATEGORIA  DE PRODUTOS----------------------------------------------
if(isset($_POST['saveCategory'])){

    $name = validate($_POST['name']);
    $description = validate($_POST['description']);
    $status = isset($_POST['status']) ? 1 : 0;

    $data = [
        'name' => $name,
        'description' => $description,
        'status' => $status,
        
    ];
    $result = insert('categories', $data);

    if($result) {
        redirect('categories.php', 'Categoria criada com sucesso!');
    } else {
        redirect('categories-create.php', 'Alguma coisa deu errado!');
    }
} 

if(isset($_POST['updateCategory']))
{
    $categoryId = validate($_POST['categoryId']);

    $name = validate($_POST['name']);
    $description = validate($_POST['description']);
    $status = isset($_POST['status']) ? 1 : 0;

    $data = [
        'name' => $name,
        'description' => $description,
        'status' => $status,
        
    ];
    $result = update('categories',$categoryId, $data);

    if($result) {
        redirect('categories.php', 'Categoria atualizada com sucesso!');
    } else {
        redirect('categories-create.php', 'Alguma coisa deu errado!');
    }
} 
///SALVAR PRODUCTS
if(isset($_POST['saveProduct'])) {

    // Recuperar os dados do formulário
    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
    $status = isset($_POST['status']) ? 1 : 0;

    // Manipulação de imagem
    $finalImagem = "";
    if(isset($_FILES['imagem']) && $_FILES['imagem']['size'] > 0){
        $path = "../assets/uploads/products";
        $imagem_ext = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $filename = time().'.'.$imagem_ext;

        if(move_uploaded_file($_FILES['imagem']['tmp_name'], $path."/".$filename)){
            $finalImagem = "assets/uploads/products/" . $filename;
        } else {
            die("Erro ao fazer o upload da imagem.");
        }
    }

    // Inserir os dados no banco de dados
    $sqlInsert = "INSERT INTO products (category_id, name, description, price, quantity, imagem, status) VALUES ('$category_id', '$name', '$description', '$price', '$quantity', '$finalImagem', '$status')";

    if(mysqli_query($con, $sqlInsert)) {
        session_start();
        $_SESSION['success'] = "Produto adicionado com sucesso!";
        header("Location: products.php");
        exit;
    } else {
        die("Erro ao adicionar o produto: " . mysqli_error($con));
    }
}

//UPDATE PRODUCTS
if(isset($_POST['updateProduct'])) {

    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);

    $productData = getById('products',$product_id);
    if($productData){
        redirect('products.php','Nenhum dado encontrado!');
    }

    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
    $imagem = mysqli_real_escape_string($con, $_POST['imagem']);
    $status = mysqli_real_escape_string($con, $_POST['status']) ? 1 : 0;

    //imagem
    $finalImagem = "";
    if(isset($_FILES['imagem']) && $_FILES['imagem']['size'] > 0){
        $path = "../assets/uploads/products";
        $imagem_ext = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $filename = time().'.'.$imagem_ext;

        if(move_uploaded_file($_FILES['imagem']['tmp_name'], $path."/".$filename)){
            $finalImagem = "assets/uploads/products/" . $filename;
            $deleteImagem = "../".$productData['data']['imagem'];
            if(file_exists($deleteImagem)){
                unlink($deleteImagem);
        } else {
            die("Erro ao fazer o upload da imagem.");
        }
    }
    $sqlUpdate = "UPDATE products SET name = '$name', description='$description', price='$price', quantity = '$quantity', status ='$status', imagem ='$imagem' WHERE id='$id'";

    if(mysqli_query($con, $sqlUpdate)) {
        session_start();
        $_SESSION['update'] = "Dados atualizados com sucesso!";
        header("Location: products-edit.php");
    } else {
        die("Algo deu errado!");
    }
}

}


//SAVE CUSTOMER
if(isset($_POST['saveCustomers'])){
    if(isset($_POST['name'], $_POST['email'], $_POST['phone'])) {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);

        $emailCheck = mysqli_query($con,"SELECT * FROM customers WHERE email='$email'");
        if($emailCheck && mysqli_num_rows($emailCheck) > 0){
            redirect('customers.php', 'E-mail já está em uso!');
            exit(); 
        }

        $sql = "INSERT INTO customers (name, email, phone) VALUES ('$name', '$email', '$phone')";
        if(mysqli_query($con, $sql)) {
            session_start();
            $_SESSION['create'] = "Dados inseridos com sucesso!";
            header('location: customers.php');
            exit();
        } else {
            die('Something went wrong');
        }
    }
   
}
 //UPDATE CLIENTES
 if(isset($_POST['updateCustomers'])) {
    $customerId = mysqli_real_escape_string ($con, $_POST['customerId']);
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);


    $sqlUpdate = "UPDATE customers SET name = '$name', email='$email', phone='$phone' WHERE id='$id'";

    if(mysqli_query($con, $sqlUpdate)) {
        session_start();
        $_SESSION['update'] = "Dados atualizados com sucesso!";
        header("Location: customers.php");
    } else {
        die("Algo deu errado!");
    }
}



?>