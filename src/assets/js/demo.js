/**
 * JavaScript API デモページ用のスクリプト
 * HTML/CSS/JS開発者向けのサンプル実装
 */

// ページ読み込み時の初期化
document.addEventListener('DOMContentLoaded', function() {
    console.log('🎉 JavaScript API デモページが読み込まれました！');
    console.log('💡 このページのコードをコピーして、あなたのプロジェクトで使用してください。');
});

/**
 * API接続テスト
 */
async function testAPIConnection() {
    const resultDiv = document.getElementById('test-result');
    resultDiv.style.display = 'block';
    resultDiv.innerHTML = '<p>接続中...</p>';
    
    try {
        const data = await testAPI();
        
        resultDiv.innerHTML = `
            <div class="status success">
                <strong>✅ API接続成功！</strong><br>
                メッセージ: ${data.message}<br>
                サーバー時刻: ${data.timestamp}<br>
                PHP バージョン: ${data.server_info.php_version}
            </div>
        `;
    } catch (error) {
        resultDiv.innerHTML = `
            <div class="status error">
                <strong>❌ API接続エラー</strong><br>
                エラー: ${error.message}
            </div>
        `;
    }
}

/**
 * ユーザー一覧取得・表示
 */
async function loadUsers() {
    const listDiv = document.getElementById('users-list');
    listDiv.style.display = 'block';
    listDiv.innerHTML = '<p>読み込み中...</p>';
    
    try {
        const users = await getUsers();
        
        let html = '<h4>📋 ユーザー一覧</h4>';
        users.forEach(user => {
            html += `
                <div class="data-item">
                    <strong>${user.name}</strong><br>
                    📧 ${user.email}<br>
                    🆔 ID: ${user.id}<br>
                    📅 登録日: ${new Date(user.created_at).toLocaleString('ja-JP')}
                </div>
            `;
        });
        listDiv.innerHTML = html;
    } catch (error) {
        listDiv.innerHTML = `<div class="status error">エラー: ${error.message}</div>`;
    }
}

/**
 * ユーザー作成フォーム処理
 */
async function handleUserCreate(event) {
    event.preventDefault();
    
    const statusDiv = document.getElementById('user-create-status');
    const name = document.getElementById('user-name').value;
    const email = document.getElementById('user-email').value;
    
    statusDiv.innerHTML = '<div class="status">作成中...</div>';
    
    try {
        const result = await createUser(name, email);
        
        statusDiv.innerHTML = `
            <div class="status success">
                ✅ ${result.message}<br>
                作成されたユーザーID: ${result.user_id}
            </div>
        `;
        document.getElementById('user-form').reset();
    } catch (error) {
        statusDiv.innerHTML = `<div class="status error">❌ ${error.message}</div>`;
    }
}

/**
 * 投稿一覧取得・表示
 */
async function loadPosts() {
    const listDiv = document.getElementById('posts-list');
    listDiv.style.display = 'block';
    listDiv.innerHTML = '<p>読み込み中...</p>';
    
    try {
        const posts = await getPosts();
        
        let html = '<h4>📝 投稿一覧</h4>';
        posts.forEach(post => {
            html += `
                <div class="data-item">
                    <strong>${post.title}</strong><br>
                    👤 投稿者: ${post.user_name}<br>
                    📄 内容: ${post.content || '（内容なし）'}<br>
                    📅 投稿日: ${new Date(post.created_at).toLocaleString('ja-JP')}
                </div>
            `;
        });
        listDiv.innerHTML = html;
    } catch (error) {
        listDiv.innerHTML = `<div class="status error">エラー: ${error.message}</div>`;
    }
}

/**
 * 投稿作成フォーム処理
 */
async function handlePostCreate(event) {
    event.preventDefault();
    
    const statusDiv = document.getElementById('post-create-status');
    const userId = document.getElementById('post-user-id').value;
    const title = document.getElementById('post-title').value;
    const content = document.getElementById('post-content').value;
    
    statusDiv.innerHTML = '<div class="status">作成中...</div>';
    
    try {
        const result = await createPost(userId, title, content);
        
        statusDiv.innerHTML = `
            <div class="status success">
                ✅ ${result.message}<br>
                作成された投稿ID: ${result.post_id}
            </div>
        `;
        document.getElementById('post-form').reset();
        document.getElementById('post-user-id').value = '1'; // デフォルト値をリセット
    } catch (error) {
        statusDiv.innerHTML = `<div class="status error">❌ ${error.message}</div>`;
    }
}

// グローバル関数として公開（HTMLから呼び出し可能）
window.testAPIConnection = testAPIConnection;
window.loadUsers = loadUsers;
window.handleUserCreate = handleUserCreate;
window.loadPosts = loadPosts;
window.handlePostCreate = handlePostCreate;