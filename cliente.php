<?php
    session_start();
    include("seguranca.php");
    include("config.php");

    $sql = "SELECT * FROM usuario";
    $resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Painel do cliente</title>
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

        <h1>Lista de usuários</h1>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Login</th>
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
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="sair.php">Sair</a>
    </div>
</body>
</html>
