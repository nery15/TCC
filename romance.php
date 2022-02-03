<?php
    include 'conexaobd.php';

    if(!isset($_SESSION))
        session_start();
    if(isset($_SESSION['Valid'])){
        $sql = "SELECT * FROM clientes WHERE user='$_SESSION[Valid]'";
        $sql_query = $mysqli->query($sql) or die($mysqli->error);
        $dado = $sql_query->fetch_assoc();
    }

    //Filme
    $sql1 = "SELECT * FROM filmes WHERE genero='Romance'";
    $sql_query1 = $mysqli->query($sql1) or die($mysqli->error);
    $dado1 = $sql_query1->fetch_assoc();
    $total = $sql_query1 -> num_rows;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TCC</title>
    <link rel="stylesheet" href="back.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">LocFilms</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <?php
                            if(isset($_SESSION['Valid'])){echo "<a class='nav-link' >Olá, $dado[nome]</a>";}
                        ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Gênero</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="index.php">Todos</a></li>
                            <li><a class="dropdown-item" href="comedia.php">Comédia</a></li>
                            <li><a class="dropdown-item" href="acao.php">Acão</a></li>
                            <li><a class="dropdown-item" href="romance.php">Romance</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <?php
                            if(isset($_SESSION['Valid'])){echo "<a class='nav-link' href='alugados.php'>Filmes Alugados</a>";}
                        ?>
                    </li>
                    <li class="nav-item">
                        <?php
                            if(isset($_SESSION['Valid'])){
                                echo "<li class='nav-item dropdown'>
                                <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                Opções
                                </a>
                                <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                    <li><a class='dropdown-item' onclick='return confirm('Deseja mesmo excluir sua conta?')' href='excluir.php'>Excluir conta</a></li>
                                    <li><a class='dropdown-item' href='alterarsenha.php?cod=1'>Alterar senha</a></li>
                                    <li><a class='dropdown-item' href='logout.php'>Sair</a></li>
                                </ul>
                                </li>";
                            }else{
                                echo "<a class='nav-link' href='login.php'>Login</a>";
                            }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row ms-4">
            <?php
             if($total > 0) {
            do{

                echo 
                "
                <div class='col-4 p-3'>
                    <div class='card' style='width: 18rem;'>
                        <a href='filmes.php?cod=$dado1[id]'>
                            <img src='img/$dado1[nome].jpg' class='card-img-top'>
                        </a>
                    </div>
                </div>    
            
                ";

            }while($dado1 = $sql_query1 -> fetch_array());
        }
            ?>
            
    </div>
</body>

</html>