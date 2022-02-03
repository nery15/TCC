<?php

    include 'conexaobd.php';

    if(!isset($_SESSION))
        session_start();
    if(!isset($_SESSION['Valid']))
        header('location:index.php');
    $sql = "SELECT * FROM funcionarios WHERE user = '$_SESSION[Valid]' ";
    $sql_query = $mysqli -> query($sql) or die($mysqli -> error);
    $dado = $sql_query -> fetch_assoc();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="back.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="back.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">LocFilms</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <?php
                            echo "<a class='nav-link' >Olá, $dado[nome]</a>";
                        ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadasclientes.php">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mostrarfilmes.php">Filmes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadasfuncionarios.php">Funcionários</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Opções</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="alterarsenha.php?cod=1">Alterar senha</a></li>
                            <li><a class="dropdown-item" href="logout.php">Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <h1 class="text-center mt-4">
    Painel de Controle
    </h1>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <a href="cadasclientes.php">
                        <img class="card-img" src="img/clientes.png" alt="" style="height:250px;">
                    </a>
                    <div class="card-body">
                        <p class="card-text text-center text-dark">Cadastro de Clientes</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <a href="cadasfilmes.php">
                        <img class="card-img" src="img/filmes.png" alt="" style="height:250px;">
                    </a>
                    <div class="card-body">
                        <p class="card-text text-center text-dark">Cadastro de Filmes</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <a href="cadastrarfunc.php">
                        <img class="card-img" src="img/transferir.jfif" alt="" style="height:250px;">
                    </a>
                    <div class="card-body">
                        <p class="card-text text-center text-dark">Cadastro de Funcionários</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>