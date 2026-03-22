# 🚀 チーム開発クイックスタートガイド

## 概要

HTML/CSS/JavaScript開発者とPHP開発者が協力してWebアプリケーションを開発するためのクイックスタートガイドです。

詳細なワークフローは [`TEAM_WORKFLOW.md`](TEAM_WORKFLOW.md) を参照してください。

## 👥 チーム構成

### HTML/CSS/JS開発者（3-4名）
- **主な作業**: フロントエンド開発、UI/UX実装
- **使用技術**: HTML, CSS, JavaScript
- **成果物**: 完全に動作するHTMLファイル

### PHP開発者（1名・先輩）
- **主な作業**: サーバーサイド統合、セキュリティ対策
- **使用技術**: PHP, MySQL, セキュリティ対策
- **成果物**: 本番対応PHPファイル

## 🚀 クイックスタート

### 1. 環境構築
```bash
git clone [repository-url]
cd summer-hackathon-2025
docker compose up -d
```

### 2. 動作確認
- ブラウザで http://localhost:8080 にアクセス
- phpMyAdmin: http://localhost:8081 (root/root)

### 3. 開発開始
HTML/CSS/JS開発者は以下のファイルを使用：

```html
<!-- HTMLファイルに追加 -->
<link rel="stylesheet" href="/assets/css/main.css">
<!-- 必要に応じてJavaScriptファイルを追加 -->
<script src="/assets/js/demo.js"></script>
```

## 📁 ファイル構成

```
src/
├── assets/
│   ├── css/
│   │   └── main.css           # 統一スタイルシート
│   └── js/
│       ├── demo.js            # デモ用JavaScript
│       └── hello.js           # サンプルJavaScript
├── [機能名].html              # HTML開発者が作成
├── [機能名].php               # PHP開発者が作成
└── api.php                    # データベースAPI
```

## 🎯 開発フロー

1. **HTML開発者**: HTMLファイルで機能を完全実装
2. **PHP開発者**: HTMLファイルをPHPに移行・セキュリティ対策
3. **全員**: 統合テスト・品質確認

## 📚 参考資料

- **詳細ワークフロー**: [`TEAM_WORKFLOW.md`](TEAM_WORKFLOW.md)
- **PHP移行ガイド**: [`HTML_TO_PHP_MIGRATION.md`](HTML_TO_PHP_MIGRATION.md)
- **環境構築**: [`HOW_TO_BUILD.md`](HOW_TO_BUILD.md)

## ✅ 確認事項

- [ ] Docker環境が正常に起動する
- [ ] http://localhost:8080 でサイトにアクセスできる
- [ ] `/assets/css/main.css` が読み込める
- [ ] チーム内で役割分担が明確になっている

---

**💡 ヒント**: 詳細な開発手順や技術的な詳細は [`TEAM_WORKFLOW.md`](TEAM_WORKFLOW.md) を確認してください。