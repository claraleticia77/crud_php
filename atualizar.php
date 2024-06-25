<?php
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        include("config.php");

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['nome'];
            $login = $_POST['login'];
            $senha = $_POST['senha'];
            $nivel = $_POST['nivel'];

            $sql = "UPDATE usuario SET nome = '$nome', login = '$login', senha = '$senha', nivel = '$nivel' WHERE id = '$id'";

            // Executar a query de atualização
            $resultado = mysqli_query($conn, $sql);

            // Verificar se a atualização foi bem-sucedida
            if($resultado) {
                header("location: dashboard.php"); 
                exit;
            } else {
                echo "Erro ao atualizar usuário. Tente novamente!";
            }
        }

        // Consultar o registro atual do usuário com base no ID
        $consulta = "SELECT * FROM usuario WHERE id = '$id'";
        $resultado = mysqli_query($conn, $consulta);

        // Verificar se encontrou o usuário
        if(mysqli_num_rows($resultado) > 0) {
            $usuario = mysqli_fetch_assoc($resultado);
?>
            
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Usuário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            margin-top: 20px;
        }
        input[type="text"], input[type="email"], input[type="password"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Atualizar Usuário</h1>
        <form method="post">
            Nome: <input type="text" name="nome" value="<?php echo $usuario['nome']; ?>"><br>
            Login: <input type="email" name="login" value="<?php echo $usuario['login']; ?>"><br>
            Senha: <input type="password" name="senha" value="<?php echo $usuario['senha']; ?>"><br>
            Nível: 
            <select name="nivel">
                <option value="admin" <?php if($usuario['nivel'] == 'admin') echo 'selected'; ?>>Administrador</option>
                <option value="cliente" <?php if($usuario['nivel'] == 'cliente') echo 'selected'; ?>>Cliente</option>
            </select><br><br>
            <input type="submit" value="Atualizar">
        </form>
    </div>
</body>
</html>

<?php
        } else {
            echo "Usuário não encontrado.";
        }

        // Libera o resultado da consulta
        mysqli_free_result($resultado);
    } else {
        echo "ID não fornecido.";
    }
?>
