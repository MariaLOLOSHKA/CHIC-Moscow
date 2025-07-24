<?php
require 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $password]);
        
        $user_id = $pdo->lastInsertId();
        $_SESSION['user_id'] = $user_id;
        
        header('Location: feedback.php');
        exit;
    } catch (PDOException $e) {
        $error = "Ошибка регистрации: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Регистрация | CHIC Moscow</title>
    <style>
        .register-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
        }
        
        .submit-btn {
            background: #C684A6;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Регистрация</h2>
        
        <?php if (isset($error)): ?>
            <div style="color: red; margin-bottom: 15px;"><?= $error ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="form-group">
                <label>Имя пользователя:</label>
                <input type="text" name="username" required>
            </div>
            
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label>Пароль:</label>
                <input type="password" name="password" required>
            </div>
            
            <button type="submit" class="submit-btn">Зарегистрироваться</button>
        </form>
        
        <p style="margin-top: 20px;">Уже есть аккаунт? <a href="login.php">Войдите</a></p>
    </div>
</body>
</html>