<?php
require_once __DIR__.'/db.php';

function register($name, $email, $password){
    $pdo = getPDO();
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (name,email,password_hash) VALUES (?, ?, ?)");
    return $stmt->execute([$name, $email, $hash]);
}

function login($email, $password){
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password_hash'])) {
        // iniciar sessão
        session_regenerate_id(true);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['role'] = $user['role'];
        return true;
    }
    return false;
}

function requireAuth(){
    session_start();
    if(empty($_SESSION['user_id'])) {
        header('Location: /login.php');
        exit;
    }
}
