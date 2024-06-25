<?php

function seguranca(){
    if(empty($_SESSION['nome']) && empty($_SESSION ['nivel'])){
        header("location:tela_login.php");
    }else{

    }
}

seguranca();
?>
