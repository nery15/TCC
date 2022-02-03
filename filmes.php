<?php

    include 'conexaobd.php';

    //Filme
    $cod = $_GET['cod'];
    $sql = "SELECT * FROM filmes WHERE id='$cod'";
    $sql_query = $mysqli->query($sql) or die($mysqli->error);
    $dado = $sql_query->fetch_assoc();

    if($dado['quant'] > 0){
        $estoq = "Imediata!";
        $cor = "green";
    }else{
        $estoq = "Esgotado!";
        $cor = "red";
    }


    //Cliente
    if(!isset($_SESSION))
        session_start();
    if(isset($_SESSION['Valid'])){
        $sql1 = "SELECT * FROM clientes WHERE user='$_SESSION[Valid]'";
        $sql_query1 = $mysqli->query($sql1) or die($mysqli->error);
        $dado1 = $sql_query1->fetch_assoc();
    }
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
                            if(isset($_SESSION['Valid'])){echo "<a class='nav-link' >Olá, $dado1[nome]</a>";}
                        ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4 offset-1">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo "img/".$dado['nome'].".jpg" ?>" class="card-img-top" alt="">
                </div>
            </div>
            <div class="col-6">
                <h4><?php echo $dado['nome'] ?></h4>
                <p>
                    <?php echo $dado['descricao'] ?>
                </p>
                <p>
                    Elenco: <?php echo $dado['elenco'] ?>
                </p>
                <p>
                    Duração: <?php echo $dado['duracao'] ?>
                </p>
                <p>
                    Valor: R$<?php echo $dado['valor'] ?>
                </p>
                <p class='d-inline'>
                    Disponibilidade: <div class='d-inline' style='color:<?php echo $cor; ?>'><?php echo $estoq ?></div>
                </p>
                <div class="d-grid gap-2">
                    <a class="btn btn-success" href='alugar.php?cod=<?php echo $cod;?>'>Alugar</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>