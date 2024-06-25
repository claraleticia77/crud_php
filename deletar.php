<?php
    $id = $_GET['id'];
    include("config.php");
    $sql = "DELETE FROM usuario WHERE id = '$id'";
    mysqli_query($conn, $sql);
    $registro =  mysqli_affected_rows($conn);
     if($registro){
        header("location:dashboard.php");
     }else{
        echo "Não deletado! Tente novamente!";
     }
?>



