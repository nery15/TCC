<?php

include "conexaobd.php";

?>
<html lang="en">
<head>
	<meta charset="utf-8">	
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Cadastro</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        #box{
            width: 600px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 1px 2px 30px rgb(195, 195, 195);
        }
        table{
            width: 100%;
        }
        table, th, td {
            border:1px solid black;
            padding: 10px;
        }
    </style>
</head>

<body>
    <a class="btn btn-primary mx-3 mt-3" href="admin.php">Voltar</a>
<div class="container">
        <h1 class="text-center mt-2">
            Clientes Cadastrados
        </h1>
        <div class="card mt-2" id="box">
            <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Usuario</th>
                            <th>Cargo</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                                            if(!isset($_SESSION))
                                                session_start();
                                            $consul = " SELECT * FROM funcionarios ";
                                            $con = $mysqli -> query($consul) or die($mysqli -> error);
                                            $dado1 = $con -> fetch_assoc();
                                            $total = $con -> num_rows;
                                            if($total > 0) {
                                                // inicia o loop que vai mostrar todos os dados
                                                do {
                                        ?>
                                        
                                        <tr>
                                            <td><?php echo $dado1["nome"];?></td>
                                            <td><?php echo $dado1["user"];?></td>
                                            <td><?php echo $dado1["cargo"];?></td>
                                        </tr>
                                        <?php 
                                        }while($dado1 = $con -> fetch_array());
                                        // fim do if
                                        }                           
                                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>