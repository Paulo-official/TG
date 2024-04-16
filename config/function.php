<?php 
session_start();


//input field validation
function validate($inputData){
    global $con;
    if(isset($inputData)) {
        $validateData = mysqli_real_escape_string($con, $inputData);
        return trim($validateData);
    } else {
        return '';
    }
}

//redireciona de uma página p outra página com uma mensagem
function redirect($url, $status){

    $_SESSION['status'] = $status;
    header('location:'.$url);
    exit(0);
} 

//mostrar a mensagem ou status depois de qualquer processo
// Mostrar a mensagem de status, se estiver definida
function alertMessage(){
if(isset($_SESSION['status'])){
    echo $_SESSION['status'];
    unset($_SESSION['status']); 
}
}

// inserir um dado na função
function insert($tableName, $data) {
    global $con;

    $table = validate($tableName);

    $columns = array_keys($data);
    $values = array_values($data);

    $escapedColumns = array_map(function($column) {
        return "`" . $column . "`";
    }, array_keys($data));

    $escapedValues = array_map(function($value) use ($con) {
        return "'" . mysqli_real_escape_string($con, $value) . "'";
    }, $data);

    $finalColumns = implode(', ', $escapedColumns);
    $finalValues = implode(', ', $escapedValues);

    $query = "INSERT INTO $table ($finalColumns) VALUES ($finalValues)";
    $result = mysqli_query($con, $query);

    return $result;
}

//update data
function update($tableName, $id, $data){
    global $con;

    $table = validate($tableName);
    $id = validate($id);

    $updateDataString = "";

    foreach ($data as $column => $value) {
        $updateDataString .= $column. '='. "'$value',";
    }

    $finalUpdateData = substr(trim($updateDataString),0,-1);

    $query = "UPDATE $table SET $finalUpdateData WHERE id='$id'";
    $result = mysqli_query($con,$query);
    return $result;
}

//get all
function getAll($tableName, $status = NULL){

    global $con;
    $table = validate($tableName);
    $status = validate($status);

    if($status == 'status'){
        $query = "SELECT * FROM $table WHERE status ='0'";
    }
    else{
        $query = "SELECT * FROM $table";

    }
    return mysqli_query($con, $query);

}

//update 
function getById($tableName, $id){
    global $con;

    $table = validate($tableName);
    $id = validate($id);

    $query = "SELECT * FROM $table WHERE id = '$id' LIMIT 1";
    $result = mysqli_query($con,$query);

    if($result){

        if(mysqli_num_rows($result) ==1){

            $row = mysqli_fetch_assoc($result);

            $response = [
                'status' => 200,
                'data' => $row,
                'message' => 'Registro encontrado'
            ];
            return $response;

        }else{
            $response = [
                'status' => 404,
                'message' => 'Nenhum dado encontrado!'
            ];
            return $response;
        }

    }else{
        $response = [
            'status' => 500,
            'message' => 'Algo deu errado!'
        ];
        return $response;
       
    }


}

//delete data from database using id
function delete($tableName, $id){

    global $con;
    $table = validate($tableName);
    $id = validate($id);

    $query = "DELETE FROM $table WHERE id='$id' LIMIT 1";
    $result = mysqli_query($con,$query);
    return $result;
}

// Função para deletar registros no admin
function checkParamId($type){

    if(isset($_GET[$type])){
        if($_GET[$type] != ''){
            return $_GET[$type];
        }else{
            return '<h5> Nenhum ID encontrado! </h5>';

        }
    }else{
        return '<h5> Nenhum ID  informado! </h5>';
    }
}

//sair da conta
function logoutSession(){
    unset($_SESSION['loggedIn']);
    unset($_SESSION['loggedInUser']);
}

?>