<?php
 include("config.php");
 $nome = $_POST['nome'];
 $login = $_POST['login'];
 $senha = $_POST['senha'];
 $nivel = $_POST['nivel'];

 $sql =  "INSERT INTO usuario(nome, login, senha, nivel) VALUES ('$nome', '$login', '$senha', '$nivel')";

 $registro =  mysqli_query($conn, $sql);


 if($registro){
    header("location:dashboard.php");
 }else{
    echo "Erro";
 };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
            display: flex;
            text-align: center;
            justify-content: center;
        }
        form {
            background-color: #fff;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            opacity: .8;  
        }
        .main{ 
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="main">
    <form action="" method="post">
        <h1>Cadastro</h1>
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <input type="submit" name="submit" value="Enviar">
    </form>
    </div>
</body>
</html>
