<?php
    include 'conexaobd.php';

    if(isset($_POST['user'])&&isset($_POST['senha'])){
        if(!isset($_SESSION)){
            session_start();
            
            $_SESSION['user']= $_POST['user'];
            $_SESSION['senha'] = md5(md5($_POST['senha']));

            $sql = "SELECT senha FROM funcionarios WHERE user = '$_SESSION[user]' ";
            $sql_query = $mysqli -> query($sql) or die($mysqli -> error);
            $dado = $sql_query -> fetch_assoc();
            $total = $sql_query -> num_rows;

            if($total == 0){
                echo "<script>alert('Esse usuário não existe!');</script>";
            }else{

                if( $dado['senha'] == $_SESSION['senha']){
                    $_SESSION['Valid']=$_SESSION['user'];
                    unset(
                        $_SESSION['user'],
                        $_SESSION['senha']
                    );
                    header('location:admin.php'); 
                }
                else{
                    echo "<script>alert('Senha incorreta!');</script>";
                }

            }
        }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="back.css">
</head>
<body>

    <div class="container">
        <div class="card mt-3" id="box">
            <div class="card-body">
                <form action="" method="POST" class="needs-validation" novalidate>
                    <h3 class="text-center mb-3 text-dark">Portal do Funcionario</h3>
                    <div>
                      <label class="form-label text-muted">Usuario:</label>
                      <input type="text" class="form-control" name="user" placeholder="Entre com seu usuario"  required>
                    </div>
                    <br>
                    <div>
                      <label class="form-label text-muted">Senha:</label>
                      <input type="password" class="form-control" name="senha" placeholder="Entre com sua senha" required>
                    </div>
                    <br>
                    <div class="d-grid gap-2 mx-auto">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                        <a class="btn btn-secondary" href='index.php'>Cancelar</a>
                    </div>
                  </form>
            </div>
        </div>
    </div>
    <script>
        
    
    // Example starter JavaScript for disabling form submissions if there are invalid fields
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