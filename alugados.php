<?php
    include 'conexaobd.php';

    if(isset($_POST['Excluir'])){
        if (isset($_POST['check'])){
            $qt = count($_POST['check']);
            if ($qt==1){
                if (!isset($_SESSION))
                    session_start();
                $array = array_filter($_POST['check']);
                $id = implode($array);
                echo "
                <script>
                    console.log($id);
                    
                </script>";
                
                $var = trim($_SESSION['valor'][$id-1]);
                
                $sql1 = "SELECT * FROM filmes WHERE nome='$var'";
                $sql_query1 = $mysqli->query($sql1) or die($mysqli->error);
                $dado1 = $sql_query1->fetch_assoc();
                $cod = $dado1['id'];
                $qtd = $dado1['quant'];
                unset($_SESSION['valor'][$id-1]);
                $qtd = $qtd + 1;
                $string = implode(", ",$_SESSION['valor']); 
                $sql = "UPDATE clientes SET 
                        filmes = '$string'
                        WHERE user = '$_SESSION[Valid]'
                    ";
                $sql2 = "UPDATE filmes SET quant = '$qtd' WHERE id='$cod'";

                $sql_query = $mysqli -> query($sql) or die($mysqli -> error);
                $sql_query2 = $mysqli -> query($sql2) or die($mysqli -> error);
                if(isset($sql_query) && isset($sql_query2)){
                    echo "
                        <script>
                            alert('Filme excluido com sucesso.');
                            window.load();
                        </script>";
                }else{
                    echo "
                    <script>
                        alert('Não foi possivel excluir o filme.');
                        window.load();
                    </script>";
                }
            }else{
                echo 
            "<script>
                alert('Você selecionou mais de um filme.');
                window.load();
            </script>";
            }
        }else{
            echo 
            "<script>
                alert('Você não selecionou nenhum filme.');
                window.load();
            </script>";
            }
    }
?>
<html lang="en">
<head>
	<meta charset="utf-8">	
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Filmes alugados</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        #box{
            width: 600px;
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
    <link rel="stylesheet" href="back.css">
</head>

<body>
    <a class="btn btn-primary mx-3 mt-3" href="index.php">Voltar</a>
<div class="container mt-4 mb-5">
        <h1 class="text-center mt-2 mb-4">
            Filmes alugados
        </h1>
        <div class="row justify-content-center">
            <div class="card mt-2" id="box">
                <form action="" method="post">
                    <div class="card-body">
                        <table>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class='text-dark'>Nome</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(!isset($_SESSION))
                                        session_start();
                                    $consul = "SELECT filmes FROM clientes WHERE user='$_SESSION[Valid]'";
                                    $con = $mysqli -> query($consul) or die($mysqli -> error);
                                    $dado = $con -> fetch_assoc();
                                    $_SESSION['valor'] = explode(",",$dado['filmes']);
                                    $total = count($_SESSION['valor']) +1;
                                    if(count($_SESSION['valor']) == 1 && $_SESSION['valor'][0] == ""){
                                        header('location:index.php');
                                    }else{
                                    if($total > 0) {
                                        // inicia o loop que vai mostrar todos os dados
                                        for ($x=1; $total>$x; $x++){
                                ?>
                                                    
                                <tr>
                                    <td style="width: 14px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="<?php echo $x; ?>" name="check[]"> 
                                        </div>
                                    </td>
                                    <td class='text-dark'><?php echo $_SESSION['valor'][$x-1];?></td>
                                </tr>
                                <?php 
                                    }
                                    }      
                                    }                     
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Deseja mesmo excluir a reserva do filme selecionado?')" name="Excluir">Excluir</button>
                        </div>            
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>