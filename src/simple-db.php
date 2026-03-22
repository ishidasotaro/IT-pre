<?php
/**
 * 初心者向けシンプルデータベース処理
 * HTML作業者が簡単に使えるデータベース機能
 */

// データベース接続
function connectDB() {
    try {
        $pdo = new PDO("mysql:host=db;dbname=hackathon;charset=utf8mb4", "root", "root");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch(PDOException $e) {
        die('データベース接続エラー: ' . $e->getMessage());
    }
}

// ユーザー一覧を取得
function getUsers() {
    $pdo = connectDB();
    $stmt = $pdo->query("SELECT id, name, email, created_at FROM users ORDER BY created_at DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// 新しいユーザーを追加
function addUser($name, $email) {
    $pdo = connectDB();
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, 'default_password']);
    return $pdo->lastInsertId();
}

// 投稿一覧を取得
function getPosts() {
    $pdo = connectDB();
    $stmt = $pdo->query("
        SELECT p.id, p.title, p.content, p.created_at, u.name as user_name 
        FROM posts p 
        JOIN users u ON p.user_id = u.id 
        ORDER BY p.created_at DESC
    ");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// 新しい投稿を追加
function addPost($user_id, $title, $content = '') {
    $pdo = connectDB();
    $stmt = $pdo->prepare("INSERT INTO posts (user_id, title, content) VALUES (?, ?, ?)");
    $stmt->execute([$user_id, $title, $content]);
    return $pdo->lastInsertId();
}

// フォームからの処理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    switch ($action) {
        case 'add_user':
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            if ($name && $email) {
                $user_id = addUser($name, $email);
                echo json_encode(['success' => true, 'message' => 'ユーザーが追加されました', 'user_id' => $user_id]);
            } else {
                echo json_encode(['success' => false, 'message' => '名前とメールアドレスを入力してください']);
            }
            exit;
            
        case 'add_post':
            $user_id = $_POST['user_id'] ?? '';
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
            if ($user_id && $title) {
                $post_id = addPost($user_id, $title, $content);
                echo json_encode(['success' => true, 'message' => '投稿が追加されました', 'post_id' => $post_id]);
            } else {
                echo json_encode(['success' => false, 'message' => 'ユーザーIDとタイトルを入力してください']);
            }
            exit;
            
        case 'get_users':
            $users = getUsers();
            echo json_encode(['success' => true, 'data' => $users]);
            exit;
            
        case 'get_posts':
            $posts = getPosts();
            echo json_encode(['success' => true, 'data' => $posts]);
            exit;
    }
}
?>