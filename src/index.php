<?php
// メインページ - ハッカソン開発環境
$current_time = date('Y年n月j日 H:i:s');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summer Hackathon 2025 - 開発環境</title>
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎯 Summer Hackathon 2025</h1>
            <p>HTML/CSS/JavaScript が得意な人向けのPHP開発環境</p>
            <p><strong>現在時刻:</strong> <?php echo $current_time; ?></p>
        </div>

        <div class="highlight">
            <h3>🚀 チーム開発プロジェクト</h3>
            <p>HTML/CSS/JavaScript開発者とPHP開発者が協力して、データベース連携アプリを開発します。</p>
        </div>

        <div class="grid">
            <!-- HTML学習 -->
            <div class="card">
                <h3>🌐 HTML基礎</h3>
                <p>まずはHTMLから始めましょう。基本的なページ作成を学べます。</p>
                <a href="hello.html" class="btn">HTMLサンプルを見る</a>
                <div class="tip">
                    💡 <strong>HTML作業者向け:</strong> ここから始めてください
                </div>
            </div>

            <!-- PHP学習 -->
            <div class="card">
                <h3>🐘 PHP基礎</h3>
                <p>PHP初心者向けの段階的学習ページ。JavaScriptとの違いを理解できます。</p>
                <a href="sample.php" class="btn">PHP学習ページ</a>
                <div class="tip">
                    💡 <strong>PHP担当者向け:</strong> 基本構文を学習
                </div>
            </div>

            <!-- データベース連携デモ -->
            <div class="card">
                <h3>🎯 データベース連携デモ</h3>
                <p>HTML作業者でも簡単にデータベース操作ができるデモページです。</p>
                <a href="demo.html" class="btn">デモページを見る</a>
                <div class="tip">
                    💡 <strong>重要:</strong> このコードをコピーして使用してください
                </div>
            </div>
        </div>

        <div class="highlight">
            <h3>👥 チーム構成</h3>
            <div class="grid">
                <div class="card">
                    <h4>🌐 HTML作業者（3-4人）</h4>
                    <ul>
                        <li>画面のデザイン・レイアウト作成</li>
                        <li>ユーザーインターフェース実装</li>
                        <li>JavaScriptでの動的機能</li>
                        <li><strong>PHPの知識は不要</strong></li>
                    </ul>
                    <p><strong>開始方法:</strong></p>
                    <ol>
                        <li><a href="hello.html">HTMLサンプル</a>で基本を確認</li>
                        <li><a href="demo.html">デモページ</a>でデータベース連携を学習</li>
                        <li>コードをコピーして自分のプロジェクトを作成</li>
                    </ol>
                </div>
                
                <div class="card">
                    <h4>⚙️ PHP担当者（1人）</h4>
                    <ul>
                        <li>データベース設計・操作</li>
                        <li>サーバーサイド処理</li>
                        <li>HTML作業者のサポート</li>
                        <li>セキュリティ対策</li>
                    </ul>
                    <p><strong>開始方法:</strong></p>
                    <ol>
                        <li><a href="sample.php">PHP学習ページ</a>で基本構文を確認</li>
                        <li><code>simple-db.php</code>でデータベース処理を理解</li>
                        <li>HTML作業者が作成したファイルをPHPに統合</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="highlight">
            <h3>📁 ファイル構成</h3>
            <div class="code-example">
/src/
├── index.php          # このページ（メインページ）
├── hello.html         # HTMLサンプル（HTML作業者向け）
├── sample.php         # PHP学習ページ（PHP担当者向け）
├── demo.html          # データベース連携デモ（重要！）
├── simple-db.php      # データベース処理（PHP担当者が作成済み）
└── assets/
    ├── css/main.css   # 共通スタイルシート
    └── js/demo.js   # 簡単JavaScriptライブラリ（重要！）
            </div>
        </div>

        <div class="highlight">
            <h3>🎯 開発の流れ</h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                <div style="background: #e3f2fd; padding: 20px; border-radius: 8px;">
                    <h4>Step 1: 環境確認</h4>
                    <p>✅ Docker環境が起動している<br>
                    ✅ このページが表示されている<br>
                    ✅ <a href="demo.html">デモページ</a>が動作する</p>
                </div>
                <div style="background: #f3e5f5; padding: 20px; border-radius: 8px;">
                    <h4>Step 2: 学習</h4>
                    <p>🌐 <a href="hello.html">HTML基礎</a>を確認<br>
                    🐘 <a href="sample.php">PHP基礎</a>を学習<br>
                    🎯 <a href="demo.html">データベース連携</a>を理解</p>
                </div>
                <div style="background: #e8f5e8; padding: 20px; border-radius: 8px;">
                    <h4>Step 3: 開発開始</h4>
                    <p>📝 HTMLファイルで画面作成<br>
                    🔗 <code>demo.js</code>でデータベース連携<br>
                    🚀 完成したアプリをテスト</p>
                </div>
            </div>
        </div>

        <div style="text-align: center; margin: 40px 0;">
            <h3>🚀 今すぐ始めよう！</h3>
            <div style="margin: 20px 0;">
                <a href="hello.html" style="display: inline-block; background: #28a745; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; margin: 0 10px; font-size: 18px;">🌐 HTML学習開始</a>
                <a href="demo.html" style="display: inline-block; background: #007bff; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; margin: 0 10px; font-size: 18px;">🎯 デモページ</a>
                <a href="sample.php" style="display: inline-block; background: #6f42c1; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; margin: 0 10px; font-size: 18px;">🐘 PHP学習</a>
            </div>
        </div>
    </div>
</body>
</html>
