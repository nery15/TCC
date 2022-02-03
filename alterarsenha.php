<?php

	include 'conexaobd.php';

    if(!isset($_SESSION))
        session_start();

    if(isset($_SESSION['Valid'])){
        if(!isset($_GET['cod'])){
            $sql = "SELECT senha FROM clientes WHERE user='$_SESSION[Valid]'";
        }else{
            $sql = "SELECT senha FROM funcionarios WHERE user='$_SESSION[Valid]'";
        }
        $sql_query = $mysqli->query($sql) or die($mysqli->error);
        $dado = $sql_query->fetch_assoc();

        if(isset($_POST['Alterar'])){
            
                if($_POST['senhaN'] == $_POST['senhaN1']){
                    //Trocando a Senha
                    $senha = md5(md5($_POST['senhaN']));
                    $sql1 = "UPDATE clientes SET 
                            senha = '$senha'
                            WHERE user = '$_SESSION[Valid]'
                            ";
                    $mysqli -> query($sql1) or die($mysqli -> error);
                    if(isset($_GET['cod'])){
                        
                        echo "<script>
                            alert('Sua senha foi alterada com sucesso.');
                            location.href='admin.php';
                        </script>";
                    }else{
                        echo "<script>alert('Sua senha foi alterada com sucesso.');
                        location.href='index.php';
                        </script>";
                    }
                }else{
                    echo "<script>alert('As senhas não coincidem.');</script>";
                }
            
        }
    }else{
        header('location:index.php');
    }
?>

<html lang="en">
<head>
	<meta charset="utf-8">	
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Alterar Senha</title>
	<link rel="stylesheet" href="login.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="back.css">
</head>

<body>
<div class="container">
        <div class="card mt-2" id="box">
            <div class="card-body">
                <form action="" method="POST" class="needs-validation" novalidate>
                    <h3 class="text-center mb-3 text-dark">Alterar Senha</h3>
                    <div>
                      <label class="form-label text-muted">Nova senha:</label>
                      <input type="password" class="form-control" name="senhaN" placeholder="Entre com seu usuario"  required>
                    </div>
                    <br>
                    <div>
                      <label class="form-label text-muted">Repita a nova senha:</label>
                      <input type="password" class="form-control" name="senhaN1" placeholder="Entre com sua senha" required>
                    </div>
                    <br>
                    <div class="d-grid gap-2 mx-auto">
                        <button type="submit" class="btn btn-primary" name="Alterar">Alterar</button>
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