<?php
// Conexão com o banco de dados
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'cadastro';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se o ID foi fornecido via GET
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Exclui o usuário do banco de dados
    $sql = "DELETE FROM pessoas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        header("Location: listar_usuarios.php?mensagem=excluido");
        exit;
    } else {
        echo "Erro ao excluir o usuário: " . $conn->error;
    }
} else {
    echo "ID não fornecido.";
}
?>
