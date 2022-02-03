<?php

    include 'conexaobd.php';
        
    if(isset($_POST['Editar'])){
        if (isset($_POST['check'])){
            if (!isset($_SESSION))
                session_start();
            $qt = count($_POST['check']);       
            if($qt > 1){
                echo 
                "<script>
                    alert('Você só pode editar um filme por vez.');
                    windows.load();
                </script>";
            }
            else{
                $array = array_filter($_POST['check']);
                $_SESSION['id'] = implode($array);
                header('location:editarfilme.php');
            }
        }else{
            echo 
                "<script>
                    alert('Você não selecionou nenhum filme.');
                    windows.load();
                </script>";
        }

    }else if(isset($_POST['Excluir'])){
        if (isset($_POST['check'])){
            if (!isset($_SESSION))
                session_start();         
            $qt = count($_POST['check']);
            $array = array_filter($_POST['check']);
            $_SESSION['id'] = implode($array);
            if($qt == 1){
                $sql = "DELETE FROM filmes WHERE id = '$_SESSION[id]'";
                $sql_query = $mysqli -> query($sql) or die($mysqli -> error);
            }
            if(isset($sql_query)){
                echo "
                    <script>
                        alert('Filme excluido com sucesso.');
                        windows.load();
                    </script>";
            }else{
                echo "
                <script>
                    alert('Não foi possivel excluir o filme.');
                    windows.load();
                </script>";
            }
        }else{
            echo 
            "<script>
                alert('Você não selecionou nenhum filme.');
                windows.load();
            </script>";
        }
    }
?>
<html lang="en">
<head>
	<meta charset="utf-8">	
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Cadastro</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        #box{
            width: 1120px;
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
<div class="container mt-4 mb-5">
        <h1 class="text-center mt-2 mb-4">
            Filmes Cadastrados
        </h1>
        <form action="" method="post">
            <div class="card mt-2" id="box">
                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Elenco</th>
                                <th>Valor</th>
                                <th>Duração</th>
                                <th>Gênero</th>
                                <th>Quantidade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(!isset($_SESSION))
                                    session_start();
                                $consul = " SELECT * FROM filmes";
                                $con = $mysqli -> query($consul) or die($mysqli -> error);
                                $dado1 = $con -> fetch_assoc();
                                $total = $con -> num_rows;
                                if($total > 0) {
                                    // inicia o loop que vai mostrar todos os dados
                                    do {
                            ?>
                                                
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="<?php echo $dado1['id']; ?>" name="check[]"> 
                                    </div>
                                </td>
                                <td><?php echo $dado1["nome"];?></td>
                                <td><?php echo $dado1["descricao"];?></td>
                                <td><?php echo $dado1["elenco"];?></td>
                                <td><?php echo $dado1["valor"];?></td>
                                <td><?php echo $dado1["duracao"];?></td>
                                <td><?php echo $dado1["genero"];?></td>
                                <td><?php echo $dado1["quant"];?></td>
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
            <div class="row">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3  ">
                    <button class="btn btn-primary me-md-2" type="submit" name="Editar">Editar</button>
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Deseja mesmo excluir o filme selecionado?')" name="Excluir">Excluir</button>
                </div>            
            </div>
            </form>
    </div>
</body>
</html>