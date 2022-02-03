<?php

include 'conexaobd.php';

	if(isset($_POST['Cadastrar'])){     

        if(!isset($_SESSION))
            session_start();
	
		//Criando um loop para pegar os valores dos inputs
        foreach ($_POST as $chave => $valor)
            $_SESSION[$chave] = $mysqli -> real_escape_string($valor);
        
        $verif = "SELECT nome from funcionarios where locate('$_SESSION[nome]',nome)>0";
        $verif1 = $mysqli->query($verif) or die($mysqli->error);
        $total = $verif1->num_rows;
        
        if($total == 0){
            //Criptografia da senha
            $senha = md5(md5($_SESSION['senha']));
            $sql = "INSERT INTO funcionarios(
                nome,
                user,
                senha,
                cargo
            )VALUES(
                '$_SESSION[nome]',
                '$_SESSION[user]',
                '$senha',
                '$_SESSION[cargo]'

            )";

            $sql_query = $mysqli -> query($sql);

            if($sql_query){
                unset(
                    $_SESSION["nome"],
                    $_SESSION["user"],
                    $_SESSION["senha"],
                    $_SESSION["cargo"]
                );
                echo "<script>
                        alert('Funcionário cadastrado com sucesso.');
                        location.href = 'admin.php';
                    
                    </script>";
            }else{
                echo "<script>
                alert('O funcionário não foi cadastrado.');
                </script>";
            }
        }else{
            echo "<script>
                        alert('Esse funcionário já está cadastrado.');
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
            width: 400px;
            box-shadow: 1px 2px 30px rgb(195, 195, 195);
        }

    </style>
</head>

<body>   
<a class="btn btn-primary mx-3 mt-3" href="admin.php">Voltar</a>
<div class="container ">
    <div class="row justify-content-center">
        <div class="card mt-4 mb-4" id="box">
            <div class="card-body">
                <form action="" method="POST" class="needs-validation" novalidate>
                    <h3 class="text-center mb-3">Cadastro de Funcionários</h3>
					<div>
                      <label class="form-label text-muted">Nome:</label>
                      <input type="text" class="form-control" name="nome" placeholder="Entre com o nome do funcionário"  required>
                    </div>
					<br>
                    <div>
                      <label class="form-label text-muted">Usuario:</label>
                      <input type="text" class="form-control" name="user" placeholder="Entre com o usuario do funcionário"  required>
                    </div>
                    <br>
                    <div>
                      <label class="form-label text-muted">Senha:</label>
                      <input type="password" class="form-control" name="senha" placeholder="Entre com a senha do funcionário" required>
                    </div>
                    <br>
                    <div>
                      <label class="form-label text-muted">Cargo:</label>
                      <input type="text" class="form-control" name="cargo" placeholder="Entre com o cargo do funcionário" required>
                    </div>
                    <br>
                    <br>
                    <div class="d-grid gap-2 mx-auto">
                        <button type="submit" class="btn btn-primary" name="Cadastrar">Cadastrar</button>
                    </div>
                  </form>
            </div>
        </div>
        </div>
    </div>
	<script>




		(function () {
			'use strict'

			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.querySelectorAll('.needs-validation')

			// Loop over them and prevent submission
			Array.prototype.slice.call(forms)
				.forEach(function (form) {
					form.addEventListener('submit', function (event) {
						if (!form.checkValidity()) {
							event.preventDefault()
							event.stopPropagation()
						}

						form.classList.add('was-validated')
					}, false)
				})
		})()

	</script>
</body>
</html>