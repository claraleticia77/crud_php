<?php
    session_start();

    //apaga os dados da sessão 
    unset($_SESSION['nome'], $_SESSION['nivel']);
    $_SESSION['login'] = "Deslogado do sistema!";

    //redirecionamento
    header("location:tela_login.php");
?>