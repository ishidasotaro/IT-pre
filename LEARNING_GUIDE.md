# 📚 学習ガイド - 段階的に学べます

## 🎯 学習の順序

このガイドでは、HTML/CSS/JavaScript が得意な人がPHPを使ったWebアプリケーション開発を段階的に学べます。

### 📋 学習チェックリスト

- [ ] **Step 1**: 環境構築と動作確認
- [ ] **Step 2**: HTML基礎の確認
- [ ] **Step 3**: データベース連携デモの理解
- [ ] **Step 4**: PHP基礎の学習（PHP担当者のみ）
- [ ] **Step 5**: 実際のプロジェクト作成

---

## 🚀 Step 1: 環境構築と動作確認

### 1.1 環境起動
```bash
# プロジェクトディレクトリに移動
cd summer-hackathon-2025

# Docker環境を起動
docker compose up -d

# 起動確認
docker ps
```

### 1.2 動作確認
以下のURLにアクセスして、正常に表示されることを確認してください：

- **メインページ**: http://localhost:8080/
- **HTMLサンプル**: http://localhost:8080/hello.html
- **データベースデモ**: http://localhost:8080/demo.html
- **PHP学習ページ**: http://localhost:8080/sample.php

### ✅ Step 1 完了条件
- [ ] 全てのページが正常に表示される
- [ ] デモページでボタンを押してデータが表示される

---

## 🌐 Step 2: HTML基礎の確認

### 2.1 HTMLサンプルの確認
[`hello.html`](src/hello.html) を開いて、基本的なHTML構造を確認してください。

### 2.2 重要なポイント
- HTML5の基本構造
- CSSファイルの読み込み方法
- JavaScriptファイルの読み込み方法
- フォームの作成方法

### 2.3 実習
`hello.html` をコピーして、自分なりにカスタマイズしてみましょう：

```bash
# hello.htmlをコピー
cp src/hello.html src/my-first-page.html
```

### ✅ Step 2 完了条件
- [ ] HTML基本構造を理解している
- [ ] 自分でHTMLファイルを作成・編集できる
- [ ] CSSとJavaScriptの読み込み方法を理解している

---

## 🎯 Step 3: データベース連携デモの理解

### 3.1 デモページの確認
[`demo.html`](src/demo.html) を開いて、データベース連携の仕組みを理解してください。

### 3.2 重要なポイント
- JavaScriptを使用したデータベース操作
- API経由でのデータベース連携
- フォーム送信の処理方法
- 結果表示の仕組み

### 3.3 使用できる関数
```javascript
// ユーザー一覧表示
showUsers('表示先のID');

// 投稿一覧表示
showPosts('表示先のID');

// ユーザー登録フォーム送信
addUserFromForm('フォームのID', 'ステータス表示先のID');

// 投稿作成フォーム送信
addPostFromForm('フォームのID', 'ステータス表示先のID');
```

### 3.4 実習
デモページのコードをコピーして、自分なりのページを作成してみましょう：

```html
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>私のプロジェクト</title>
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
    <div class="container">
        <h1>私のユーザー管理システム</h1>
        
        <!-- ユーザー一覧表示 -->
        <button onclick="showUsers('my-user-list')">ユーザー一覧</button>
        <div id="my-user-list"></div>
        
        <!-- ユーザー登録フォーム -->
        <form id="my-user-form">
            <input type="text" name="name" placeholder="名前" required>
            <input type="email" name="email" placeholder="メール" required>
            <button type="button" onclick="addUserFromForm('my-user-form', 'my-status')">登録</button>
        </form>
        <div id="my-status"></div>
    </div>
    
    <script src="/assets/js/demo.js"></script>
</body>
</html>
```

### ✅ Step 3 完了条件
- [ ] データベース連携の仕組みを理解している
- [ ] 提供されている関数を使ってデータ操作ができる
- [ ] 自分でフォームを作成してデータ送信ができる

---

## 🐘 Step 4: PHP基礎の学習（PHP担当者向け）

### 4.1 PHP学習ページの確認
[`sample.php`](src/sample.php) を開いて、PHP基本構文を学習してください。

### 4.2 重要なポイント
- PHP変数の使い方（`$変数名`）
- 配列の操作方法
- 関数の作成方法
- データベース接続の基本

### 4.3 データベース処理の理解
[`simple-db.php`](src/simple-db.php) を確認して、データベース処理の仕組みを理解してください：

```php
// データベース接続
function connectDB() {
    $pdo = new PDO("mysql:host=db;dbname=hackathon", "root", "root");
    return $pdo;
}

// ユーザー一覧取得
function getUsers() {
    $pdo = connectDB();
    $stmt = $pdo->query("SELECT * FROM users");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
```

### 4.4 実習
新しい関数を追加してみましょう：

```php
// 特定のユーザーを取得する関数
function getUserById($id) {
    $pdo = connectDB();
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
```

### ✅ Step 4 完了条件
- [ ] PHP基本構文を理解している
- [ ] データベース接続の仕組みを理解している
- [ ] 新しい関数を作成できる

---

## 🚀 Step 5: 実際のプロジェクト作成

### 5.1 プロジェクト企画
チームで作成するWebアプリケーションを企画しましょう：

- **例1**: ユーザー管理システム
- **例2**: 簡単なブログシステム
- **例3**: タスク管理アプリ
- **例4**: 商品管理システム

### 5.2 役割分担
- **HTML作業担当**: 画面設計、デザイン、フロントエンド機能
- **PHP作業担当**: データベース設計、サーバーサイド処理

### 5.3 開発手順
1. **画面設計**: HTMLで静的なページを作成
2. **データベース設計**: 必要なテーブルを設計
3. **機能実装**: JavaScriptとPHPで動的機能を実装
4. **統合テスト**: 全体の動作確認
5. **完成**: デプロイとドキュメント作成

### ✅ Step 5 完了条件
- [ ] チームでプロジェクトを企画できた
- [ ] 役割分担が明確になった
- [ ] 実際に動作するWebアプリケーションを作成できた

---

## 🎯 学習のコツ

### HTML作業担当者へ
1. **段階的に学習**: HTML → JavaScript → データベース連携の順で学習
2. **コピー&ペースト**: デモページのコードを積極的に活用
3. **実験**: 小さな変更から始めて、徐々に機能を追加
4. **質問**: 分からないことはすぐにチームに相談

### PHP作業担当者へ
1. **基礎から**: sample.phpで基本構文をしっかり理解
2. **実践**: simple-db.phpを参考に実際の処理を作成
3. **サポート**: HTML作業担当者が困った時のサポート
4. **セキュリティ**: 常にセキュリティを意識した実装

## 📞 困った時は

- **環境問題**: README.mdのトラブルシューティングを確認
- **HTML/CSS/JS**: デモページのサンプルコードを参考
- **PHP**: sample.phpとsimple-db.phpを確認
- **チーム開発**: TEAM_GUIDE.mdを参照

**重要**: 一人で悩まず、チーム全体で解決しましょう！

---

## 🎉 学習完了後

全てのステップを完了したら、あなたは以下のことができるようになっています：

- ✅ HTML/CSS/JavaScriptでWebページを作成
- ✅ データベースと連携したWebアプリケーションを作成
- ✅ チームでの開発プロセスを理解
- ✅ PHP基礎（PHP担当者の場合）

**おめでとうございます！** これで本格的なWebアプリケーション開発に取り組む準備が整いました。