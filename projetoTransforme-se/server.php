<?php
$hostname = "localhost";
$database = "forum_db";
$username = "root";
$password = "";

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Buscar mensagens do banco de dados
    $sql = "SELECT * FROM messages ORDER BY id DESC";
    $result = $conn->query($sql);

    $messages = array();
    while ($row = $result->fetch_assoc()) {
        $messages[] = array("content" => $row["content"]);
    }

    echo json_encode($messages);
} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Adicionar nova mensagem ao banco de dados
    $message = $_POST["message"];
    $sql = "INSERT INTO messages (content) VALUES ('$message')";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false, "error" => $conn->error));
    }
}

$conn->close();
?>
