<?php
// PHP初心者向けサンプル - 段階的に学習できます

// 1. 基本的な変数
$message = "こんにちは、PHP！";
$number = 42;
$isActive = true;

// 2. 配列
$fruits = ["りんご", "バナナ", "オレンジ"];
$person = [
    "name" => "田中太郎",
    "age" => 25,
    "city" => "東京"
];

// 3. 現在日時
$current_time = date('Y年n月j日 H:i:s');

// 4. 簡単な関数
function greet($name) {
    return "こんにちは、{$name}さん！";
}

// 5. データベース接続（エラー処理付き）
$db_connected = false;
$users = [];
try {
    $pdo = new PDO("mysql:host=db;dbname=hackathon;charset=utf8mb4", "root", "root");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db_connected = true;
    
    // ユーザー一覧を取得
    $stmt = $pdo->query("SELECT * FROM users LIMIT 3");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $db_error = $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP学習サンプル - 初心者向け</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
        }
        .section {
            background: white;
            margin: 20px 0;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .section h2 {
            color: #333;
            border-bottom: 3px solid #007bff;
            padding-bottom: 10px;
            margin-top: 0;
        }
        .code-block {
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 5px;
            padding: 15px;
            margin: 15px 0;
            font-family: 'Courier New', monospace;
            overflow-x: auto;
        }
        .result {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            padding: 15px;
            margin: 15px 0;
            color: #155724;
        }
        .error {
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            padding: 15px;
            margin: 15px 0;
            color: #721c24;
        }
        .header {
            text-align: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f8f9fa;
        }
        .tip {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 5px;
            padding: 15px;
            margin: 15px 0;
            color: #856404;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🐘 PHP学習サンプル</h1>
            <p>HTML/CSS/JS が得意な人向けのPHP入門</p>
        </div>

        <!-- 1. 基本的な変数 -->
        <div class="section">
            <h2>1️⃣ 基本的な変数</h2>
            <div class="code-block">
$message = "こんにちは、PHP！";<br>
$number = 42;<br>
$isActive = true;
            </div>
            <div class="result">
                <strong>結果:</strong><br>
                文字列: <?php echo $message; ?><br>
                数値: <?php echo $number; ?><br>
                真偽値: <?php echo $isActive ? 'true' : 'false'; ?>
            </div>
            <div class="tip">
                💡 <strong>ポイント:</strong> PHPの変数は <code>$</code> で始まります。JavaScriptの <code>let</code> や <code>const</code> は不要です。
            </div>
        </div>

        <!-- 2. 配列 -->
        <div class="section">
            <h2>2️⃣ 配列の使い方</h2>
            <div class="code-block">
$fruits = ["りんご", "バナナ", "オレンジ"];<br>
$person = [<br>
&nbsp;&nbsp;&nbsp;&nbsp;"name" => "田中太郎",<br>
&nbsp;&nbsp;&nbsp;&nbsp;"age" => 25,<br>
&nbsp;&nbsp;&nbsp;&nbsp;"city" => "東京"<br>
];
            </div>
            <div class="result">
                <strong>果物一覧:</strong><br>
                <?php foreach($fruits as $index => $fruit): ?>
                    <?php echo ($index + 1) . ". " . $fruit; ?><br>
                <?php endforeach; ?>
                
                <br><strong>人物情報:</strong><br>
                名前: <?php echo $person['name']; ?><br>
                年齢: <?php echo $person['age']; ?>歳<br>
                住所: <?php echo $person['city']; ?>
            </div>
            <div class="tip">
                💡 <strong>ポイント:</strong> 連想配列は JavaScriptのオブジェクトと似ています。<code>$person['name']</code> で値にアクセスできます。
            </div>
        </div>

        <!-- 3. 関数 -->
        <div class="section">
            <h2>3️⃣ 関数の作成</h2>
            <div class="code-block">
function greet($name) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;return "こんにちは、{$name}さん！";<br>
}
            </div>
            <div class="result">
                <strong>関数の実行結果:</strong><br>
                <?php echo greet("山田"); ?><br>
                <?php echo greet("佐藤"); ?>
            </div>
            <div class="tip">
                💡 <strong>ポイント:</strong> <code>{$変数名}</code> で文字列内に変数を埋め込めます。JavaScriptのテンプレートリテラルと似ています。
            </div>
        </div>

        <!-- 4. 日付・時刻 -->
        <div class="section">
            <h2>4️⃣ 日付・時刻の表示</h2>
            <div class="code-block">
$current_time = date('Y年n月j日 H:i:s');
            </div>
            <div class="result">
                <strong>現在日時:</strong> <?php echo $current_time; ?>
            </div>
            <div class="tip">
                💡 <strong>ポイント:</strong> <code>date()</code> 関数で現在日時を取得できます。フォーマットを変更すれば様々な表示が可能です。
            </div>
        </div>

        <!-- 5. データベース接続 -->
        <div class="section">
            <h2>5️⃣ データベースからデータ取得</h2>
            <div class="code-block">
$pdo = new PDO("mysql:host=db;dbname=hackathon", "root", "root");<br>
$stmt = $pdo->query("SELECT * FROM users");<br>
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            </div>
            
            <?php if($db_connected): ?>
                <div class="result">
                    <strong>データベース接続: 成功 ✅</strong>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>メールアドレス</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $user): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($user['id']); ?></td>
                                <td><?php echo htmlspecialchars($user['name']); ?></td>
                                <td><?php echo htmlspecialchars($user['email']); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="error">
                    <strong>データベース接続エラー:</strong><br>
                    <?php echo isset($db_error) ? $db_error : 'データベースに接続できません'; ?>
                </div>
            <?php endif; ?>
            
            <div class="tip">
                💡 <strong>ポイント:</strong> PDOを使ってMySQLデータベースに接続できます。HTML担当者は最初はここを気にしなくてOKです。
            </div>
        </div>

        <!-- 学習のヒント -->
        <div class="section">
            <h2>🎯 学習のヒント</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
                <div style="background: #e3f2fd; padding: 20px; border-radius: 8px;">
                    <h3>HTML/CSS/JS担当者へ</h3>
                    <ul>
                        <li>まずは <code>.html</code> ファイルで画面を作成</li>
                        <li>後から <code>.php</code> に拡張子を変更</li>
                        <li>少しずつPHPコードを追加</li>
                        <li>データベースは最後に連携</li>
                    </ul>
                </div>
                <div style="background: #f3e5f5; padding: 20px; border-radius: 8px;">
                    <h3>PHP担当者へ</h3>
                    <ul>
                        <li>データベース設計</li>
                        <li>API機能の作成</li>
                        <li>フロントエンド担当者をサポート</li>
                        <li>セキュリティ対策</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- ナビゲーション -->
        <div style="text-align: center; margin: 40px 0;">
            <a href="index.php" style="display: inline-block; background: #007bff; color: white; padding: 12px 25px; text-decoration: none; border-radius: 5px; margin: 0 10px;">🏠 メインページ</a>
            <a href="hello.html" style="display: inline-block; background: #28a745; color: white; padding: 12px 25px; text-decoration: none; border-radius: 5px; margin: 0 10px;">🌐 HTMLサンプル</a>
        </div>
    </div>
</body>
</html>
