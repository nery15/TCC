<?php

    include 'conexaobd.php';
    
    if(!isset($_SESSION))
        session_start();

    if(isset($_SESSION['Valid'])){
        $sql1 = "SELECT filmes FROM clientes WHERE user = '$_SESSION[Valid]'";
        $sql_query1 = $mysqli->query($sql1) or die($mysqli->error);
        $dado1 = $sql_query1->fetch_assoc();
        if($dado1['filmes'] == ""){
            $sql = "DELETE FROM clientes WHERE user = '$_SESSION[Valid]'";
            $sql_query = $mysqli -> query($sql) or die($mysqli -> error);
            if($sql_query){
                echo "
                <script>
                    alert('A conta foi excluida com sucesso!');
                    location.href='logout.php';
                </script>;
            ";
            }
        }else{
            echo "
                <script>
                    alert('A conta não pode ser excluida, pois existem filme reservados!');
                    location.href='index.php';
                </script>;
            ";
        }
    }
?>