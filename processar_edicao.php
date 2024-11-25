<?php
// Configurações do banco de dados
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'cadastro';

// Conectar ao banco de dados
$conn = new mysqli($host, $user, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Receber os dados do formulário
$id = $_POST['id'];
$nome = $_POST['nome'];
$id_discord = $_POST['id_discord'];
$divisao = $_POST['divisao'];
$cargo = $_POST['cargo'];
$data_admissao = $_POST['data_admissao'];

// Verificar se o ID Discord já existe (excluindo o próprio registro de edição)
$sql = "SELECT COUNT(*) FROM pessoas WHERE id_discord = ? AND id != ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $id_discord, $id);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();

if ($count > 0) {
    echo "Erro: O ID Discord informado já está cadastrado!";
    exit();
}

// Atualizar os dados na tabela
$sql = "UPDATE pessoas SET nome = ?, id_discord = ?, divisao = ?, cargo = ?, data_admissao = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $nome, $id_discord, $divisao, $cargo, $data_admissao, $id);

if ($stmt->execute()) {
    echo "Dados atualizados com sucesso!";
} else {
    echo "Erro ao atualizar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
