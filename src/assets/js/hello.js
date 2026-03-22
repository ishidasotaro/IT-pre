/**
 * hello.html用のJavaScriptファイル
 * HTML/CSS/JS開発者向けの基本サンプル
 */

// ページ読み込み時の初期化
document.addEventListener('DOMContentLoaded', function() {
    console.log('🎉 Hello.html が読み込まれました！');
    console.log('💡 このページはHTML/CSS/JavaScriptのみで動作しています。');
    
    // 初回時刻更新
    updateTime();
    
    // 1秒ごとに時刻を更新
    setInterval(updateTime, 1000);
});

/**
 * 現在時刻を表示・更新する関数
 */
function updateTime() {
    const now = new Date();
    const timeString = now.toLocaleTimeString('ja-JP');
    
    // ページタイトルに時刻を表示
    document.title = `HTMLサンプル - ${timeString}`;
    
    // 時刻表示要素があれば更新
    const timeElement = document.getElementById('current-time');
    if (timeElement) {
        timeElement.textContent = timeString;
    }
}

/**
 * ボタンクリック時のアニメーション効果
 */
function addButtonAnimations() {
    const buttons = document.querySelectorAll('.btn');
    
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            // クリック効果のアニメーション
            const ripple = document.createElement('span');
            ripple.classList.add('ripple');
            this.appendChild(ripple);
            
            // アニメーション後に要素を削除
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
}

/**
 * スムーススクロール機能
 */
function enableSmoothScroll() {
    const links = document.querySelectorAll('a[href^="#"]');
    
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
}

/**
 * カードのホバー効果
 */
function addCardEffects() {
    const cards = document.querySelectorAll('.card');
    
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.transition = 'transform 0.3s ease';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
}

/**
 * 開発者向けのコンソールメッセージ
 */
function showDeveloperInfo() {
    console.log(`
🎯 HTML/CSS/JS開発者へのメッセージ

このファイル（hello.html）の特徴：
✅ PHPを使用していません
✅ 純粋なHTML/CSS/JavaScriptで動作
✅ モダンなCSS（Grid、Flexbox、アニメーション）
✅ JavaScript（DOM操作、イベント処理）

開発のヒント：
💡 このコードをベースに、あなたのプロジェクトを作成してください
💡 デザインやアニメーションを自由にカスタマイズできます
💡 データベース連携が必要な場合は js-api-demo.html を参考にしてください

ファイル構成：
📁 /assets/css/main.css - スタイルシート
📁 /assets/js/hello.js - このJavaScriptファイル
📁 /assets/js/api.js - API通信用ライブラリ
    `);
}

// 初期化処理
document.addEventListener('DOMContentLoaded', function() {
    addButtonAnimations();
    enableSmoothScroll();
    addCardEffects();
    showDeveloperInfo();
});

// 使用例：動的にコンテンツを追加する関数
function addDynamicContent() {
    const container = document.querySelector('.container');
    
    if (container) {
        const dynamicSection = document.createElement('div');
        dynamicSection.className = 'highlight';
        dynamicSection.innerHTML = `
            <h3>🚀 動的コンテンツ</h3>
            <p>この内容はJavaScriptで動的に追加されました！</p>
            <p>現在時刻: <span id="current-time">${new Date().toLocaleTimeString('ja-JP')}</span></p>
        `;
        
        container.appendChild(dynamicSection);
    }
}

// グローバル関数として公開
window.addDynamicContent = addDynamicContent;
window.updateTime = updateTime;