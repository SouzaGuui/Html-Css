<?php
require_once 'bd.php';
require_once 'auth.php';
require_login();
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilos.css">

    <script type="text/javascript">
       
    window.replyActive = false;
    function ajax(){
        var req = new XMLHttpRequest();
        req.onreadystatechange = function(){
            if(req.readyState == 4 && req.status == 200){
                if(window.replyActive){ return; }
                document.getElementById('chat').innerHTML = req.responseText;
                enhanceComments();
            }
        }
        
        req.open('GET', 'chat.php', true);
        req.send();
    }

    setInterval(function(){ajax();}, 2000);

    </script>


    <title>Chat</title>

</head>
<!--ESTE ONLOAD AJAX É PARA ASSIM QUE A PÁGINA ABRIR ELE JÁ CARERGAR AS INFORMAÇÕES, SEM TER QUE ESPERAR 1 SEGUNDO PARA ISSO -->
<body onload="ajax();">

<header id="top-bar">
    <div class="left">Venha fofocar</div>
    <div class="right">
        <button type="button" id="emoji-btn" class="util-btn">😀</button>
        <button type="button" id="color-btn" class="util-btn">🎨</button>
        <button type="button" id="camera-btn" class="util-btn">📷</button>
        <strong><?php echo htmlspecialchars(current_username()); ?></strong>
        <a href="logout.php" class="btn">Sair</a>
    </div>
    <aside id="color-panel">
        <div style="display:flex; flex-direction:column; gap:10px; min-width: 280px;">
            <div class="row">
                <div>
                    <label>Fundo da página</label>
                    <small class="help">Altera a cor de fundo da página.</small>
                </div>
                <input type="color" id="color-bg" value="#abc8d2">
            </div>
            <div class="row">
                <div>
                    <label>Barra superior</label>
                    <small class="help">Altera a cor da barra superior.</small>
                </div>
                <input type="color" id="color-accent" value="#1C62C4">
            </div>
            <div class="row">
                <div>
                    <label>Mensagem (card)</label>
                    <small class="help">Altera o fundo de cada mensagem.</small>
                </div>
                <input type="color" id="color-card" value="#ffffff">
            </div>
            <div class="row">
                <div>
                    <label>Texto</label>
                    <small class="help">Altera a cor do texto do chat.</small>
                </div>
                <input type="color" id="color-text" value="#1c1c1c">
            </div>
            <div class="row">
                <button type="button" id="color-reset" class="util-btn">Padrão</button>
                <small class="help">Volta para as cores padrões atuais.</small>
            </div>
        </div>
    </aside>
</header>

<main id="conteudo">
    
    <section id="caixa-chat">
        <section id="chat">
       
        <!-- LOCAL ONDE VAI CHAMAR O CHAT -->

        </section>
    </section>

    <form method="POST" action="index.php" accept-charset="UTF-8">
        <textarea name="mensagem" placeholder="Insira uma mensagem"></textarea>
        <input type="submit" name="enviar" value="Enviar">
    </form>

    <?php
    if(isset($_POST['enviar'])){
        $nome = current_username();
        $mensagem = isset($_POST['mensagem']) ? trim($_POST['mensagem']) : '';
        if ($mensagem !== '' && $nome){
            if ($stmt = $conexao->prepare("INSERT INTO tb_chat (nome, mensagem) VALUES (?, ?)")){
                $stmt->bind_param('ss', $nome, $mensagem);
                $executar = $stmt->execute();
                $stmt->close();
            } else {
                $executar = false;
            }
        } else {
            $executar = false;
        }
        if($executar){
            echo "<embed loop='false' src='beep.mp3' hidden='true' autoplay='true'>";
        }
    }

    ?>

    </main>

<aside id="emoji-panel" style="display:none;">
    <div style="display:grid;grid-template-columns:repeat(6,1fr);gap:6px;">
        <button class="emoji-insert" type="button">😀</button>
        <button class="emoji-insert" type="button">😁</button>
        <button class="emoji-insert" type="button">😂</button>
        <button class="emoji-insert" type="button">🤣</button>
        <button class="emoji-insert" type="button">😊</button>
        <button class="emoji-insert" type="button">😍</button>
        <button class="emoji-insert" type="button">👍</button>
        <button class="emoji-insert" type="button">🙏</button>
        <button class="emoji-insert" type="button">🔥</button>
        <button class="emoji-insert" type="button">💯</button>
    </div>
</aside>

<!-- color-panel já movido para dentro da barra superior -->

<input type="file" id="photo-input" accept="image/*" capture style="display:none;" />
<div id="photo-preview" style="display:none;"></div>

<script>
// Toggle do painel de emojis e inserção no textarea
document.addEventListener('DOMContentLoaded', function(){
    var btn = document.getElementById('emoji-btn');
    var panel = document.getElementById('emoji-panel');
    var ta = document.querySelector('textarea[name="mensagem"]');
    if (btn && panel && ta){
        btn.addEventListener('click', function(){
            panel.style.display = panel.style.display === 'none' ? 'block' : 'none';
        });
        panel.addEventListener('click', function(ev){
            var el = ev.target.closest('.emoji-insert');
            if (!el) return;
            var emoji = el.textContent;
            var start = ta.selectionStart || ta.value.length;
            ta.value = ta.value.slice(0,start) + emoji + ta.value.slice(start);
            ta.focus();
        });
    }

    // Painel de cores
    var colorBtn = document.getElementById('color-btn');
    var colorPanel = document.getElementById('color-panel');
    var bgInput = document.getElementById('color-bg');
    var acInput = document.getElementById('color-accent');
    var cardInput = document.getElementById('color-card');
    var textInput = document.getElementById('color-text');
    var resetBtn = document.getElementById('color-reset');
    var DEFAULT_THEME = { bg:'#abc8d2', accent:'#1C62C4', card:'#ffffff', text:'#1c1c1c' };

    function applyThemeFromStorage(){
        var theme = JSON.parse(localStorage.getItem('chatTheme')||'{}');
        if(theme.bg) document.documentElement.style.setProperty('--bg-color', theme.bg);
        if(theme.accent) document.documentElement.style.setProperty('--accent-color', theme.accent);
        if(theme.card) document.documentElement.style.setProperty('--card-bg', theme.card);
        if(theme.text) document.documentElement.style.setProperty('--text-color', theme.text);
        if(theme.bg) bgInput.value = theme.bg;
        if(theme.accent) acInput.value = theme.accent;
        if(theme.card) cardInput.value = theme.card;
        if(theme.text) textInput.value = theme.text;
    }
    applyThemeFromStorage();

    colorBtn.addEventListener('click', function(){
        colorPanel.style.display = colorPanel.style.display === 'none' ? 'block' : 'none';
    });
    function saveAndApply(){
        var theme = {
            bg: bgInput.value,
            accent: acInput.value,
            card: cardInput.value,
            text: textInput.value
        };
        localStorage.setItem('chatTheme', JSON.stringify(theme));
        document.documentElement.style.setProperty('--bg-color', theme.bg);
        document.documentElement.style.setProperty('--accent-color', theme.accent);
        document.documentElement.style.setProperty('--card-bg', theme.card);
        document.documentElement.style.setProperty('--text-color', theme.text);
    }
    bgInput.addEventListener('input', saveAndApply);
    acInput.addEventListener('input', saveAndApply);
    cardInput.addEventListener('input', saveAndApply);
    textInput.addEventListener('input', saveAndApply);
    if(resetBtn){
        resetBtn.addEventListener('click', function(){
            bgInput.value = DEFAULT_THEME.bg;
            acInput.value = DEFAULT_THEME.accent;
            cardInput.value = DEFAULT_THEME.card;
            textInput.value = DEFAULT_THEME.text;
            saveAndApply();
        });
    }

    // Câmera / foto base64
    var camBtn = document.getElementById('camera-btn');
    var fileInput = document.getElementById('photo-input');
    var preview = document.getElementById('photo-preview');
    camBtn.addEventListener('click', function(){ fileInput.click(); });
    fileInput.addEventListener('change', function(){
        var file = fileInput.files && fileInput.files[0];
        if (!file) return;
        var reader = new FileReader();
        reader.onload = function(){
            var dataUrl = reader.result;
            preview.innerHTML = '<img src="'+dataUrl+'" alt="foto">\n<button type="button" id="send-photo" class="btn">Enviar foto</button>';
            preview.style.display = 'block';
            var sendBtn = document.getElementById('send-photo');
            sendBtn.addEventListener('click', function(){
                ta.value = dataUrl; // envia como mensagem
                document.querySelector('form[action="index.php"]').submit();
                preview.style.display = 'none';
            });
        };
        reader.readAsDataURL(file);
    });
});

// Ações de comentário: curtir, dislike e responder (client-side)
function enhanceComments(){
    var cards = document.querySelectorAll('#chat .dados-chat');
    cards.forEach(function(card){
        // garantir barra de ações
        var actions = card.querySelector('.comment-actions');
        if(!actions){ actions = document.createElement('div'); actions.className='comment-actions'; card.appendChild(actions); }

        // garantir botões
        var like = actions.querySelector('.like-btn');
        if(!like){
            like = document.createElement('button'); like.type='button'; like.className='btn-sm like-btn';
            var initialLikes = parseInt(card.dataset.likes||'0',10);
            like.textContent='👍 '+initialLikes; like.dataset.count= String(initialLikes); like.dataset.active = like.dataset.active || 'false';
            actions.appendChild(like);
        }

        var dislike = actions.querySelector('.dislike-btn');
        if(!dislike){
            dislike = document.createElement('button'); dislike.type='button'; dislike.className='btn-sm dislike-btn';
            var initialDislikes = parseInt(card.dataset.dislikes||'0',10);
            dislike.textContent='👎 '+initialDislikes; dislike.dataset.count= String(initialDislikes); dislike.dataset.active = dislike.dataset.active || 'false';
            actions.appendChild(dislike);
        }

        var reply = Array.from(actions.querySelectorAll('.btn-sm')).find(function(b){ return b.textContent.trim().toLowerCase()==='responder'; });
        if(!reply){ reply = document.createElement('button'); reply.type='button'; reply.className='btn-sm'; reply.textContent='Responder'; actions.appendChild(reply); }

        // garantir área de respostas
        var replies = card.querySelector('.comment-replies');
        if(!replies){ replies = document.createElement('div'); replies.className='comment-replies'; card.appendChild(replies); }

        // garantir caixa de resposta
        var box = card.querySelector('.reply-box');
        if(!box){
            box = document.createElement('div'); box.className='reply-box'; box.style.display='none';
            var input = document.createElement('input'); input.type='text'; input.placeholder='Escreva uma resposta...';
            var send = document.createElement('button'); send.type='button'; send.className='btn-sm'; send.textContent='Enviar';
            box.appendChild(input); box.appendChild(send);
            card.appendChild(box);
        }
        var inputEl = box.querySelector('input');
        var sendEl = box.querySelector('button');

        // listeners idempotentes
        function sendReaction(id, type, delta){
            try{
                var body = new URLSearchParams({ id:String(id), type:type, delta:String(delta) });
                fetch('react.php', { method:'POST', headers:{ 'Content-Type':'application/x-www-form-urlencoded' }, body: body })
                .then(function(r){ return r.json(); })
                .then(function(json){
                    if(json && json.ok){
                        like.dataset.count = String(json.likes);
                        dislike.dataset.count = String(json.dislikes);
                        like.textContent = '👍 '+json.likes;
                        dislike.textContent = '👎 '+json.dislikes;
                    }
                })
                .catch(function(){ /* silencia erros de rede */ });
            }catch(e){ /* noop */ }
        }

        if(!like.dataset.bound){
            like.addEventListener('click', function(){
                var isActive = like.dataset.active === 'true';
                var lcount = parseInt(like.dataset.count||'0',10);
                var dcount = parseInt(dislike.dataset.count||'0',10);
                if(isActive){
                    lcount = Math.max(0, lcount-1); like.dataset.active='false'; like.classList.remove('active');
                    sendReaction(card.dataset.id, 'like', -1);
                } else {
                    lcount = lcount+1; like.dataset.active='true'; like.classList.add('active');
                    sendReaction(card.dataset.id, 'like', +1);
                    // desativar dislike se estiver ativo
                    if(dislike.dataset.active==='true'){
                        dcount = Math.max(0, dcount-1); dislike.dataset.active='false'; dislike.classList.remove('active');
                        dislike.dataset.count = String(dcount); dislike.textContent = '👎 '+dcount;
                        sendReaction(card.dataset.id, 'dislike', -1);
                    }
                }
                like.dataset.count = String(lcount);
                like.textContent = '👍 '+lcount;
            });
            like.dataset.bound = 'true';
        }

        if(!dislike.dataset.bound){
            dislike.addEventListener('click', function(){
                var isActive = dislike.dataset.active === 'true';
                var dcount = parseInt(dislike.dataset.count||'0',10);
                var lcount = parseInt(like.dataset.count||'0',10);
                if(isActive){
                    dcount = Math.max(0, dcount-1); dislike.dataset.active='false'; dislike.classList.remove('active');
                    sendReaction(card.dataset.id, 'dislike', -1);
                } else {
                    dcount = dcount+1; dislike.dataset.active='true'; dislike.classList.add('active');
                    sendReaction(card.dataset.id, 'dislike', +1);
                    // desativar like se estiver ativo
                    if(like.dataset.active==='true'){
                        lcount = Math.max(0, lcount-1); like.dataset.active='false'; like.classList.remove('active');
                        like.dataset.count = String(lcount); like.textContent = '👍 '+lcount;
                        sendReaction(card.dataset.id, 'like', -1);
                    }
                }
                dislike.dataset.count = String(dcount);
                dislike.textContent = '👎 '+dcount;
            });
            dislike.dataset.bound = 'true';
        }

        if(!reply.dataset.bound){
            reply.addEventListener('click', function(){
                var show = (box.style.display==='none');
                box.style.display = show ? 'flex' : 'none';
                window.replyActive = show;
                if(show){ inputEl && inputEl.focus(); }
            });
            reply.dataset.bound = 'true';
        }

        if(!sendEl.dataset.bound){
            sendEl.addEventListener('click', function(){
                var txt = (inputEl.value||'').trim(); if(!txt) return;
                var item = document.createElement('div'); item.textContent = txt;
                replies.appendChild(item);
                inputEl.value=''; box.style.display='none';
                window.replyActive = false;
            });
            sendEl.dataset.bound = 'true';
        }
        inputEl.addEventListener('focus', function(){ window.replyActive = true; });
        inputEl.addEventListener('blur', function(){ setTimeout(function(){ if(!box.contains(document.activeElement)) window.replyActive=false; },0); });
    });
}
</script>

</body>
</html>