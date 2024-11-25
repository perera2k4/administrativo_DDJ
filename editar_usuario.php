<?php
// Caminho para o arquivo JSON
$arquivo_json = 'usuarios.json';

// Verifica se o ID foi fornecido na URL
if (isset($_GET['id'])) {
    // Captura o ID passado na URL e converte para inteiro
    $id = (int) $_GET['id'];

    // Lê os dados do arquivo JSON
    if (file_exists($arquivo_json)) {
        $usuarios = json_decode(file_get_contents($arquivo_json), true);
    } else {
        echo "Nenhum usuário encontrado.";
        exit;
    }

    // Encontra o usuário com o ID correspondente
    $usuario = null;
    foreach ($usuarios as &$user) {
        if ((int) $user['id'] === $id) {  // Garanta que a comparação seja feita com números inteiros
            $usuario = &$user;
            break;
        }
    }

    if ($usuario === null) {
        echo "Usuário não encontrado.";
        exit;
    }

    // Processa a edição quando o formulário for enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Atualiza os dados do usuário
        $usuario['nome'] = $_POST['nome'];
        $usuario['id_discord'] = $_POST['id_discord'];
        $usuario['divisao'] = $_POST['divisao'];
        $usuario['cargo'] = $_POST['cargo'];
        $usuario['data_admissao'] = $_POST['data_admissao'];
        $usuario['status_agente'] = $_POST['status_agente'];
        $usuario['vida_secundaria'] = $_POST['vida_secundaria'];
        $usuario['cadastrado_por'] = $_POST['cadastrado_por'];
        $usuario['desligado_por'] = $_POST['desligado_por'];
        $usuario['data_desligamento'] = $_POST['data_desligamento'];

        // Salva os dados no arquivo JSON
        file_put_contents($arquivo_json, json_encode($usuarios, JSON_PRETTY_PRINT));
        header('Location: listar_usuarios.php');
        exit;
    }
} else {
    echo "ID inválido.";
    exit;
}
?>
