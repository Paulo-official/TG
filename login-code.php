<?php

require 'config/function.php';

if(isset($_POST['loginBtn']))
{
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
 
   if($email != '' && $password != '')
    {
        $query = "SELECT * FROM admins WHERE email ='$email' LIMIT 1 ";
        $result = mysqli_query($con,$query);
        if($result){

            if(mysqli_num_rows($result) ==1){

                $row = mysqli_fetch_assoc($result);
                $hashedPassword = $row['password'];

                if(password_verify($password,$hashedPassword)){
                    redirect('login.php','Senha incorreta!');
                }

                if($row['is_ban'] == 1){
                    redirect('login.php','Sua conta foi banida. Contacte seu admin.');
                }
                $_SESSION['loggedIn'] = true;
                $_SESSION['loggedInUser'] = [
                    'user_id' => $row['id'],
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'phone' => $row['phone'],
                ];
                redirect('../admin/index.php','Logado com sucesso!');


            }else{
            redirect('login.php','Endereço de email incorreto!');

            }
        }else{
            redirect('login.php','Algo deu errado!');

        }
    }else{
            redirect('login.php','Todos os campos são obrigatórios!');
    }
}

?>