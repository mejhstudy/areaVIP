# 🎮 Portal de Jogos - Projeto Melhorado

Website completo sobre videojogos com design moderno, segurança aprimorada e funcionalidades avançadas.

## 🚀 Como usar (WAMP no Windows)

1. Coloque a pasta `site_murilo` dentro de `c:\wamp64\www\` (já configurado)
2. Inicie o servidor WAMP (Apache + PHP)
3. Acesse no navegador: **http://localhost/site_murilo/**

## 🔐 Credenciais de acesso

**Utilizador:** `aluno`  
**Palavra-passe:** `senha123`

## 📁 Estrutura do projeto

### Páginas principais
- **`index.html`** — Página inicial com design moderno e cards informativos
- **`games.html`** — Conteúdos detalhados com tabelas, vídeos e galeria de imagens
- **`contact.php`** — Formulário de contacto com validação avançada e proteção CSRF
- **`login.php`** — Sistema de login com rate limiting e segurança melhorada
- **`private.php`** — Área VIP com conteúdos exclusivos e downloads
- **`logout.php`** — Logout seguro com limpeza de sessão
- **`downloads.php`** — Simulador de downloads para área VIP

### Recursos e estilos
- **`css/styles.css`** — Design responsivo moderno com gradientes e animações
- Tema escuro profissional com cores vibrantes
- Layout responsivo para desktop, tablet e mobile
- Animações e transições suaves

## ✨ Melhorias implementadas

### 🎨 Design e UX
- **Interface moderna** com tema escuro e gradientes
- **Ícones emojis** para melhor usabilidade
- **Animações CSS** e efeitos hover
- **Layout responsivo** otimizado para todos os dispositivos
- **Tipografia melhorada** e hierarquia visual clara

### 🔒 Segurança
- **Proteção CSRF** no formulário de contacto
- **Rate limiting** no login (3 tentativas por 5 minutos)
- **Validação rigorosa** de inputs
- **Sanitização** de dados de saída
- **Gestão segura de sessões** com timeout automático
- **Regeneração de session ID** após login

### 📧 Formulário de contacto
- **Validação client-side e server-side**
- **Contador de caracteres** em tempo real
- **Categorização por assunto**
- **Proteção anti-spam** básica
- **Logging de mensagens** (contact_log.txt)

### 🏠 Área reservada
- **Gestão de sessão** com timeout (30 minutos)
- **Downloads simulados** de conteúdo premium
- **Interface personalizada** com nome do utilizador
- **Logout seguro** com confirmação
- **Logging de acessos** (access_log.txt)

### 📱 Responsividade
- **Mobile-first design**
- **Breakpoints otimizados**
- **Navigation adaptável**
- **Imagens responsivas**

## 🛠️ Funcionalidades técnicas

### Validações implementadas
- **Nomes:** 2-100 caracteres
- **Emails:** validação RFC compliant
- **Mensagens:** 10-2000 caracteres
- **Prevenção de links** nas mensagens (anti-spam)

### Segurança de sessões
- **HttpOnly cookies**
- **Strict mode**
- **Session regeneration**
- **Automatic timeout**
- **Rate limiting**

## 📝 Notas técnicas

- **Ambiente local:** Email simulado (não envia realmente)
- **Logs criados:** `contact_log.txt` e `access_log.txt`
- **Compatibilidade:** PHP 7.4+, navegadores modernos
- **Performance:** Otimizado para carregamento rápido

## 🔄 Para produção

### Configurações recomendadas:
1. **HTTPS obrigatório** (altere `session.cookie_secure` para `1`)
2. **Configurar email** real no `contact.php`
3. **Base de dados** para utilizadores e mensagens
4. **Backup automático** dos logs
5. **Monitorização** de segurança

### Extensões possíveis:
- Sistema de registo de utilizadores
- Base de dados MySQL
- Upload de ficheiros
- Sistema de comentários
- API REST
- Painel de administração

---

**Desenvolvido com:** HTML5, CSS3, PHP, JavaScript  
**Compatível com:** WAMP, XAMPP, LAMP  
**Versão:** 2.0 (Melhorada)
