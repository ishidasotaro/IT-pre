-- ハッカソン用のサンプルテーブル作成
-- ユーザーテーブル
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- サンプルデータ挿入
INSERT INTO users (name, email, password) VALUES
('テストユーザー1', 'test1@example.com', 'password'),
('テストユーザー2', 'test2@example.com', 'password');

-- 投稿テーブル（例）
CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- サンプル投稿データ
INSERT INTO posts (user_id, title, content) VALUES 
(1, 'ハッカソン開始！', 'みんなで頑張ろう！'),
(2, 'PHP開発環境構築完了', 'Docker環境が整いました');
