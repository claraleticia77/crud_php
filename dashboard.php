<?php
    session_start();
    include("seguranca.php");
    include("config.php");

    $sql = "SELECT * FROM usuario";
    $resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Painel administrativo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
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
            margin-bottom: 20px;
        }
        input[type="text"], input[type="password"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"], button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover, button:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        table th {
            background-color: #f2f2f2;
            color: #333;
        }
        table td {
            background-color: #fff;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php echo "Seja bem-vindo(a) " . $_SESSION['nome']; ?>

        <form action="inserir.php" method="post">
            <h1>CRUD de usuários</h1>
            <input type="text" placeholder="Digite o nome" name="nome" required>
            <input type="text" name="login" placeholder="Digite seu email" required>
            <input type="password" name="senha" placeholder="Digite sua senha" required>
            <select name="nivel" required>
                <option value="admin">Administrador</option>
                <option value="cliente">Cliente</option>
            </select>
            <input class="butao" type="submit" value="Cadastrar">
        </form>

        <h1>Listar usuários</h1>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Login</th>
                    <th>Senha</th>
                    <th>Nível</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($linha = mysqli_fetch_assoc($resultado)) {
                ?>
                <tr>
                    <td><?php echo $linha['id'] ?></td>
                    <td><?php echo $linha['nome'] ?></td>
                    <td><?php echo $linha['login'] ?></td>
                    <td><?php echo $linha['senha'] ?></td>
                    <td><?php echo $linha['nivel'] ?></td>
                    <td>
                        <a href="atualizar.php?id=<?php echo $linha['id'] ?>">
                            <button>Atualizar</button>
                        </a>
                        <a href="deletar.php?id=<?php echo $linha['id'] ?>">
                            <button>Deletar</button>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="sair.php">Sair</a>
    </div>
</body>
</html>
