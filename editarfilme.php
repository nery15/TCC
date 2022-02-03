<?php

    include 'conexaobd.php';

    if(isset($_POST['Salvar'])){
        if(!isset($_SESSION))
            session_start();

        foreach ($_POST as $chave => $valor)
            $_SESSION[$chave] = $mysqli -> real_escape_string($valor);

        $sql = "UPDATE filmes SET 
            nome = '$_SESSION[nome]',
            descricao = '$_SESSION[descricao]',
            elenco = '$_SESSION[elenco]',
            valor = '$_SESSION[valor]',
            quant = '$_SESSION[quant]',
            duracao = '$_SESSION[duracao]',
            genero = '$_SESSION[genero]'
            WHERE id = '$_SESSION[id]' 
        ";
        $sql_query = $mysqli -> query($sql) or die($mysqli -> error);

        if($sql_query){
            unset(
                $_SESSION['nome'],
                $_SESSION['descricao'],
                $_SESSION['elenco'],
                $_SESSION['valor'],
                $_SESSION['quant'],
                $_SESSION['duracao'],
                $_SESSION['genero']
                
            );
            
            echo "
                <script>
                    alert('Os dados foram editados com sucesso.');
                    location.href='mostrarfilmes.php';
                </script>
            ";
        }else{
            unset(
                $_SESSION['nome'],
                $_SESSION['descricao'],
                $_SESSION['elenco'],
                $_SESSION['valor'],
                $_SESSION['quant'],
                $_SESSION['duracao'],
                $_SESSION['genero']
                
            );
            
            echo "
                <script>
                    alert('Os dados não foram editados com sucesso.');
                    location.href='mostrarfilmes.php';
                </script>
            ";
        }
    }else{

        if(!isset($_SESSION))
            session_start();    

        $sql = "SELECT * FROM filmes WHERE id = '$_SESSION[id]'";
        $sql_query = $mysqli -> query($sql) or die($mysqli -> error);
        $dado = $sql_query -> fetch_assoc();

        $_SESSION['nome'] = $dado['nome'];
        $_SESSION['descricao'] = $dado['descricao'];
        $_SESSION['elenco'] = $dado['elenco'];
        $_SESSION['valor'] = $dado['valor'];
        $_SESSION['quant'] = $dado['quant'];
        $_SESSION['duracao'] = $dado['duracao'];
        $_SESSION['genero'] = $dado['genero'];


        
    }
    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/editar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        #box{
            width: 700px;
            box-shadow: 1px 2px 30px rgb(195, 195, 195);
        }
    </style>
</head>
<body>
<div class="container">
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-12">
                <h1 class="text-center">Editar Cadastro de Filmes</h1>
            </div>
            <div class="card" id="box">
                <form action="" method="POST" class="needs-validation" novalidate="">

                    <div class="mb-3">
                        <label class="mb-2 text-muted" for="nome">Nome:</label>
                        <input type="text" class="form-control" name="nome" value="<?php if(isset($_SESSION['nome'])){echo $_SESSION['nome'];} ?>" required>  
                    </div>

                    <div class="mb-3">
                        <label class="mb-2 text-muted" for="descricao">Descrição:</label>
                        <textarea name="descricao" class="form-control" required><?php if(isset($_SESSION['descricao'])){echo $_SESSION['descricao'];} ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="mb-2 text-muted" for="elenco">Elenco:</label>
                        <textarea name="elenco" class="form-control" required><?php if(isset($_SESSION['elenco'])){echo $_SESSION['elenco'];} ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="mb-2 text-muted" for="valor">Valor:</label>
                        <input type="text" class="form-control" name="valor" min='0' value="<?php if(isset($_SESSION['valor'])){echo $_SESSION['valor'];} ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="mb-2 text-muted" for="duracao">Duração:</label>
                        <input type="text" class="form-control" name="duracao" min='0' value="<?php if(isset($_SESSION['duracao'])){echo $_SESSION['duracao'];} ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="mb-2 text-muted" for="genero">Gênero:</label>
                        <select name="genero" class="form-select">
                            <option value="Ação">Ação</option>
                            <option value="Comédia">Comédia</option>
                            <option value="Romance">Romance</option>                            
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="mb-2 text-muted" for="quant">Quantidade:</label>
                        <input type="text" class="form-control" name="quant" value="<?php if(isset($_SESSION['quant'])){echo $_SESSION['quant'];} ?>" required>           
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-secondary me-md-2" href="mostrarfilmes.php">Cancelar</a>
                        <button class="btn btn-primary me-md-2" type="submit" value="Salvar" name="Salvar">Salvar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>