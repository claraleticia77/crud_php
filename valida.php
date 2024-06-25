<?php

//pega os dados uma vez do config.php onde estão as configurações de conexão com Bd
    require_once("config.php");
    session_start(); 

if(!empty($_POST['login']) && !empty($_POST['senha'])){
        
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $query = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha' ";

    $execucao = mysqli_query($conn, $query);
    $resultado = mysqli_fetch_assoc($execucao);

}
    if(!empty($resultado)){
        $_SESSION['nome'] = $resultado ['nome'];
        $_SESSION['nivel'] = $resultado ['nivel'];

        if($_SESSION['nivel'] == "admin"){
            header("location:dashboard.php");
        }else{
            header("location:cliente.php");
        }
    }else{
        $_SESSION['loginErro'] = "Preencha todos os campos!";
        header("location:tela_login.php");
    };


?>