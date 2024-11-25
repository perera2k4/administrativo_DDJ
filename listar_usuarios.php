<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
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
            bottom: 10px;
            left: 47%;
            width: 100px;
            height: 100px;
            object-fit: cover;
            opacity: 50%;
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
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 5px;
            text-align: center;
        }
        th {
            background: #292929;
            color: white;
        }
        .vida-sim {
            color: red;
            font-weight: bold;
        }
        .btn {
            display: flex;
            justify-content: center;
            padding: 4px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            margin: 2px;
        }
        .btn-edit {
            background-color: #4CAF50;
            color: white;
        }
        .btn-delete {
            background-color: #f44336;
            color: white;
        }
        .desligado {
            background-color: orange;
            font-weight: bold;
        }
    </style>
    <script>
        function confirmDelete(event) {
            event.preventDefault();
            const confirmation = confirm("Você realmente deseja excluir este usuário?");
            if (confirmation) {
                window.location.href = event.target.href;
            }
        }
    </script>
</head>
<body>
    <header>
        <img src="imagens/ddj_logo.png" alt="Logo">
        <a href="index.php">Cadastrar</a>
        <a href="listar_usuarios.php">Consultar</a>
    </header>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>ID Discord</th>
                <th>Divisão</th>
                <th>Cargo</th>
                <th>Data de Admissão</th>
                <th>Status</th>
                <th>Vida Secundária</th>
                <th>Desligado Por</th>
                <th>Data de Desligamento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Caminho para o arquivo JSON
            $arquivo_json = 'usuarios.json';

            if (file_exists($arquivo_json)) {
                $usuarios = json_decode(file_get_contents($arquivo_json), true);
                foreach ($usuarios as $usuario) {
                    $vidaClass = $usuario['vida_secundaria'] === 'Sim' ? 'vida-sim' : '';
                    $statusClass = $usuario['status_agente'] === 'Desligado' ? 'desligado' : '';
                    $status = ucwords(strtolower($usuario['status_agente']));

                    echo "<tr class='{$statusClass}'>
                            <td>{$usuario['id']}</td>
                            <td>{$usuario['nome']}</td>
                            <td>{$usuario['id_discord']}</td>
                            <td>{$usuario['divisao']}</td>
                            <td>{$usuario['cargo']}</td>
                            <td>{$usuario['data_admissao']}</td>
                            <td>{$status}</td>
                            <td class='{$vidaClass}'>{$usuario['vida_secundaria']}</td>";

                    if ($usuario['status_agente'] === 'Desligado') {
                        echo "<td>{$usuario['desligado_por']}</td>
                              <td>{$usuario['data_desligamento']}</td>";
                    } else {
                        echo "<td>-</td><td>-</td>";
                    }

                    echo "<td>
                            <a href='editar_usuario.php?id={$usuario['id']}' class='btn btn-edit'>Editar</a>
                            <a href='excluir_usuario.php?id={$usuario['id']}' class='btn btn-delete' onclick='confirmDelete(event)'>Excluir</a>
                          </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='11'>Nenhum usuário cadastrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
