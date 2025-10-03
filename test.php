<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste Completo - Portal de Jogos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body style="padding:2rem;font-family:Arial,sans-serif">
    <h1>🧪 Teste Completo do Portal de Jogos</h1>
    
    <div style="background:var(--card);padding:2rem;border-radius:12px;margin:1rem 0">
        <h2>✅ Versões HTML (funcionais)</h2>
        <p>Estas páginas funcionam diretamente no navegador:</p>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:1rem;margin:1rem 0">
            <a href="index.html" style="display:block;padding:1rem;background:rgba(0,212,255,0.1);border-radius:8px;text-decoration:none;color:var(--accent)">
                🏠 <strong>Página Inicial</strong><br>
                <small>Portal principal com navegação</small>
            </a>
            <a href="games.html" style="display:block;padding:1rem;background:rgba(0,212,255,0.1);border-radius:8px;text-decoration:none;color:var(--accent)">
                🎮 <strong>Conteúdos</strong><br>
                <small>Jogos, comparações e análises</small>
            </a>
            <a href="contact.html" style="display:block;padding:1rem;background:rgba(0,212,255,0.1);border-radius:8px;text-decoration:none;color:var(--accent)">
                📧 <strong>Contacto</strong><br>
                <small>Formulário funcional com JavaScript</small>
            </a>
            <a href="auth.html" style="display:block;padding:1rem;background:rgba(168,85,247,0.1);border-radius:8px;text-decoration:none;color:#a855f7">
                🔐 <strong>Login/Registro</strong><br>
                <small>Sistema completo de autenticação</small>
            </a>
            <a href="private.html" style="display:block;padding:1rem;background:rgba(16,185,129,0.1);border-radius:8px;text-decoration:none;color:var(--success)">
                � <strong>Área VIP</strong><br>
                <small>Conteúdo exclusivo para membros</small>
            </a>
        </div>
    </div>

    <div style="background:var(--card);padding:2rem;border-radius:12px;margin:1rem 0">
        <h2>🔧 Funcionalidades implementadas</h2>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:1rem">
            <div>
                <h3 style="color:var(--accent)">🔐 Sistema de Autenticação</h3>
                <ul>
                    <li>✅ Login e Registro</li>
                    <li>✅ Validação de formulários</li>
                    <li>✅ Persistência de sessão</li>
                    <li>✅ Proteção de páginas VIP</li>
                </ul>
            </div>
            <div>
                <h3 style="color:var(--accent)">📧 Sistema de Contacto</h3>
                <ul>
                    <li>✅ Formulário com validação</li>
                    <li>✅ Contador de caracteres</li>
                    <li>✅ Categorização de mensagens</li>
                    <li>✅ Armazenamento local</li>
                </ul>
            </div>
            <div>
                <h3 style="color:var(--accent)">👑 Área VIP</h3>
                <ul>
                    <li>✅ Downloads simulados</li>
                    <li>✅ Conteúdo exclusivo</li>
                    <li>✅ Estatísticas do utilizador</li>
                    <li>✅ Modal de conteúdos</li>
                </ul>
            </div>
            <div>
                <h3 style="color:var(--accent)">🎨 Interface Moderna</h3>
                <ul>
                    <li>✅ Design responsivo</li>
                    <li>✅ Tema escuro</li>
                    <li>✅ Animações suaves</li>
                    <li>✅ Navegação intuitiva</li>
                </ul>
            </div>
        </div>
    </div>

    <div style="background:rgba(16,185,129,0.1);padding:2rem;border-radius:12px;margin:1rem 0;border:1px solid var(--success)">
        <h2 style="color:var(--success)">� Como testar</h2>
        <ol style="color:var(--text-primary)">
            <li><strong>Comece pela página inicial:</strong> <a href="index.html" style="color:var(--success)">index.html</a></li>
            <li><strong>Teste o registro:</strong> Vá para Login → Registrar → Crie uma conta</li>
            <li><strong>Faça login:</strong> Use as credenciais criadas ou "aluno"/"senha123"</li>
            <li><strong>Explore a área VIP:</strong> Downloads, conteúdos exclusivos, etc.</li>
            <li><strong>Teste o contacto:</strong> Envie uma mensagem no formulário</li>
            <li><strong>Navegue entre páginas:</strong> Tudo funciona sem PHP!</li>
        </ol>
    </div>

    <div style="text-align:center;margin:2rem 0">
        <a href="index.html" style="background:linear-gradient(45deg,var(--accent),#a855f7);color:white;padding:1rem 2rem;border-radius:8px;text-decoration:none;font-weight:bold">
            🚀 Começar agora
        </a>
    </div>

    <script>
        // Limpar dados se necessário
        function clearData() {
            if (confirm('Tem certeza que quer limpar todos os dados salvos (utilizadores, mensagens, etc.)?')) {
                localStorage.clear();
                alert('Dados limpos! Recarregue a página.');
                window.location.reload();
            }
        }
        
        // Mostrar dados salvos
        const users = JSON.parse(localStorage.getItem('gamePortalUsers') || '[]');
        const contacts = JSON.parse(localStorage.getItem('gamePortalContacts') || '[]');
        
        if (users.length > 0 || contacts.length > 0) {
            document.body.innerHTML += `
                <div style="background:rgba(239,68,68,0.1);padding:1rem;border-radius:8px;margin:1rem 0">
                    <h3 style="color:var(--error)">📊 Dados no sistema:</h3>
                    <p>Utilizadores registados: ${users.length}</p>
                    <p>Mensagens de contacto: ${contacts.length}</p>
                    <button onclick="clearData()" style="background:var(--error);color:white;border:none;padding:0.5rem 1rem;border-radius:4px;cursor:pointer">
                        🗑️ Limpar dados
                    </button>
                </div>
            `;
        }
    </script>
</body>
</html>