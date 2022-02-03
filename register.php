<?php

	include 'conexaobd.php';

	if(isset($_POST['Cadastrar'])){     

        if(!isset($_SESSION))
            session_start();
	
		//Criando um loop para pegar os valores dos inputs
        foreach ($_POST as $chave => $valor)
            $_SESSION[$chave] = $mysqli -> real_escape_string($valor);
        
        $verif = "SELECT user from clientes where locate('$_SESSION[user]',user)>0";
        $verif1 = $mysqli->query($verif) or die($mysqli->error);
        $total = $verif1->num_rows;
        
        if($total == 0){
            //Criptografia da senha
            $senha = md5(md5($_SESSION['senha']));
            
            $sql = "INSERT INTO clientes (
                nome,
                user,
                senha
            )VALUES(
                '$_SESSION[nome]',
                '$_SESSION[user]',
                '$senha'

            )";

            $sql_query = $mysqli -> query($sql) or die ("<script>
                        alert('Algo deu errado. Você será redirecionado à pagina de login.');
                        location.href = 'login.php';
                        </script>");

            if($sql_query){
                unset(
                    $_SESSION['nome'],
                    $_SESSION['user'],
                    $_SESSION['senha']
                );
                echo "<script>
                        alert('Usuario cadastrado com sucesso.\\nVocê será redirecionado à pagina de login.');
                        location.href = 'login.php';
                    </script>";
            }else{
                echo "<script>
                alert('Algo deu errado.\\nVocê será redirecionado à pagina de login.');
                location.href = 'login.php';
                </script>";
            }
        }else{
            echo "<script>
                        alert('Esse usuário já existe.');
                    </script>";
        }

	}

?>

<html lang="en">
<head>
	<meta charset="utf-8">	
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Cadastro</title>
	<link rel="stylesheet" href="login.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="back.css">
</head>

<body>
<div class="container">
        <div class="card mt-2" id="box">
            <div class="card-body">
                <form action="" method="POST" class="needs-validation" novalidate>
                    <h3 class="text-center mb-3 text-dark">Cadastrar</h3>
					<div>
                      <label class="form-label text-muted">Nome:</label>
                      <input type="text" class="form-control" name="nome" placeholder="Entre com seu nome"  required>
                    </div>
					<br>
                    <div>
                      <label class="form-label text-muted">Usuario:</label>
                      <input type="text" class="form-control" name="user" placeholder="Entre com seu usuario"  required>
                    </div>
                    <br>
                    <div>
                      <label class="form-label text-muted">Senha:</label>
                      <input type="password" class="form-control" name="senha" placeholder="Entre com sua senha" required>
                    </div>
                    <p id="cadastrar"><a href="login.php">Já possui uma conta? Clique aqui.</a></p>
                    <br>
                    <br>
                    <div class="d-grid gap-2 mx-auto">
                        <button type="submit" class="btn btn-primary" name="Cadastrar">Cadastrar</button>
                    </div>
                  </form>
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