<?php
$host = 'localhost';
$dbname = 'chic_moscow';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = htmlspecialchars($_POST['message']);
    
    try {
        $stmt = $pdo->prepare("INSERT INTO feedback (message) VALUES (?)");
        $stmt->execute([$message]);
        header('Location: index.php?success=1');
        exit;
    } catch (PDOException $e) {
        die("Ошибка сохранения: " . $e->getMessage());
    }
}
?>