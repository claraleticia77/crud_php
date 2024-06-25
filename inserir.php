<?php
 include("config.php");
 $nome = $_POST['nome'];
 $login = $_POST['login'];
 $senha = $_POST['senha'];
 $nivel = $_POST['nivel'];

 $sql =  "INSERT INTO usuario (nome, login, senha, nivel) VALUES ('$nome', '$login', '$senha', '$nivel')";

 mysqli_query($conn, $sql);

 $registro = mysqli_affected_rows($conn);

 if($registro){
    header("location:dashboard.php");
 }else{
    echo "Erro";
 };
?>