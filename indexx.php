<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-Vindo ao Sistemas de Gerenciamento de Entregas</title>
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link rel="stylesheet" href="./css/styles.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

</head>

<body class="index">
    <!--header -->
    <header class="header">
        <a href="indexx.php" class="logo logo-md">Sistema de Gerenciamento de Entregas</a>
        <nav id="menu" class="nav justify-content-end" data-bs-theme="dark">
            <ul>
                <li class="">
                    <a href="indexx.php" class="logo logo-lg">Sistema de Gerenciamento de Entregas</a>
                </li>
                <li class="divider">
                    <a href="#">Minha conta <i class="fa-solid fa-circle-user"></i></a>
                </li>
                <li class="nav-item">
                    <a href="index.php" class="">Logout <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                </li>
            </ul>
        </nav>
    </header>
    <!--header end -->
    <div class="container">
        <div class="title">Dashboard</div>
    </div>
    <!--Cards-->
    <section class="overview">
        <a href="RastrearPedido.php" class="card">
            <div class="icon">
                <i class="fa-solid fa-clipboard-list"></i>
            </div>
            <small>Rastrear pedidos</small>
        </a>

        <a href="calcularEncomenda.php" class="card">
            <div class="icon">
                <i class="fa-solid fa-user"></i>
            </div>
            <small>Calcular Frete</small>
        </a>

        <a href="addEntregas.php" class="card">
            <div class="icon">
                <i class="fa-solid fa-chart-column"></i>
            </div>
            <small>Cadastrar pedidos</small>
        </a>

        <a href="lista.php" name="Entregasbtn" class="card">
            <div class="icon">
                <i class="fa-solid fa-clock-rotate-left"></i>
            </div>
            <small>Listar entregas</small>
        </a>
    </section>
    <!--End Cards-->
</body>

</html>