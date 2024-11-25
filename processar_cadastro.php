<?php
// Caminho para o arquivo JSON
$arquivo_json = 'usuarios.json';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados enviados pelo formulário
    $id = trim($_POST['id']);
    $nome = trim($_POST['nome']);
    $id_discord = trim($_POST['id_discord']);
    $divisao = trim($_POST['divisao']);
    $cargo = trim($_POST['cargo']);
    $data_admissao = trim($_POST['data_admissao']);
    $cadastrado_por = trim($_POST['cadastrado_por']);
    $vida_secundaria = trim($_POST['vida_secundaria']);

    // Verifica se os campos obrigatórios estão preenchidos
    if (empty($nome) || empty($id_discord) || empty($divisao) || empty($cargo)) {
        die("Por favor, preencha todos os campos obrigatórios.");
    }

    // Cria um novo usuário
    $usuario = [
        'id' => $id,
        'nome' => $nome,
        'id_discord' => $id_discord,
        'divisao' => $divisao,
        'cargo' => $cargo,
        'data_admissao' => $data_admissao,
        'cadastrado_por' => $cadastrado_por,
        'vida_secundaria' => $vida_secundaria,
    ];

    // Verifica se o arquivo JSON já existe
    if (file_exists($arquivo_json)) {
        // Lê os dados do arquivo existente
        $usuarios = json_decode(file_get_contents($arquivo_json), true);
    } else {
        // Caso o arquivo não exista, cria um array vazio
        $usuarios = [];
    }

    // Adiciona o novo usuário à lista
    $usuarios[] = $usuario;

    // Salva os dados de volta no arquivo JSON
    file_put_contents($arquivo_json, json_encode($usuarios, JSON_PRETTY_PRINT));

    echo "Usuário cadastrado com sucesso!";
    header("Location: listar_usuarios.php");
    exit;
}
?>
