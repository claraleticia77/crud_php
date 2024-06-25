<?php
//PARA PODERMOS TRABALHAR COM SESSÕES 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sessão login</title>
    <link rel="stylesheet" type="text/css" href="">
   
    <style>
         body{
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        height: 100vh;
        margin: 0;
    }


        .butao{
            background-color: #333;
            border: none;
            padding: 15px ;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            text-align:center;
            text-decoration:none;
            
           
           
        }
        form{
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }
        input{
            display: flex;
            flex-direction: column;
            padding: 1px;
            border: none;
            outline: none;
            font-size: 15px;
            margin-bottom: 10px;
           
            
        }
        input[type="text"],
        input[type="password"] {
            width: 98%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
}
        button:hover{
            background-color:deepskyblue;
        }
    </style>



</head>

<body>
<form action="valida.php" method="post">
    <h1>Login</h1>
    <div>
    <input type="text" name="login" placeholder="Digite seu email">
    <input type="password" name="senha" placeholder="Digite sua senha">
    <input class= "butao" type="submit" value="Fazer login">
    </div>
</form>

<?php

//se a sessão conter algum valor(se existir), retornará true e imprime
if(isset($_SESSION['loginErro'])){
    echo $_SESSION['loginErro'];
//depois que esse site for atualizado, ele apaga os dados
    unset($_SESSION['loginErro']);
}
?>

</body>
</html>