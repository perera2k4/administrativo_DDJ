<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #292929;
            color: white;
            padding: 15px;
            text-align: center;
            position: relative;
        }
        header img {
            position: fixed;
            top: 10px;
            left: 10px;
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
        header a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }
        header a:hover {
            text-decoration: underline;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin: 10px 0 5px;
            font-weight: bold;
        }
        input, select {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background: #5cb85c;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #4cae4c;
        }
    </style>
</head>
<body>
    <header>
        <img src="imagens/ddj_logo.png" alt="Logo">
        <a href="index.php">Cadastrar</a>
        <a href="listar_usuarios.php">Consultar</a>
    </header>
    <div class="container">
        <h1>Cadastro de Pessoas</h1>
        <form action="processar_cadastro.php" method="POST">
            <label for="id">ID:</label>
            <input type="number" id="id" name="id" required>

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="id_discord">ID Discord:</label>
            <input type="text" id="id_discord" name="id_discord" required>

            <label for="divisao">Divisão:</label>
            <input type="text" id="divisao" name="divisao" required>

            <label for="cargo">Cargo:</label>
            <input type="text" id="cargo" name="cargo" required>

            <label for="data_admissao">Data de Admissão:</label>
            <input type="date" id="data_admissao" name="data_admissao" required>

            <label for="cadastrado_por">Cadastrado por:</label>
            <select id="cadastrado_por" name="cadastrado_por" required>
                <option value="Perera">Perera</option>
                <option value="Megda">Megda</option>
                <option value="Padoka">Padoka</option>
            </select>

            <label for="vida_secundaria">Vida Secundária:</label>
            <select id="vida_secundaria" name="vida_secundaria" required>
                <option value="Não">Não</option>
                <option value="Sim">Sim</option>
            </select>

            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>
