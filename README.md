<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

# Ferramentas Utilizadas

### 🚀 **Laragon**
Ambiente de desenvolvimento local, utilizado para gerenciar o servidor, banco de dados e outras configurações do projeto de forma rápida e eficiente.

### ⚙️ **Laravel + Blade + Breeze**
- **Laravel**: Framework principal para o desenvolvimento do sistema, garantindo robustez e organização.
- **Blade**: Motor de templates utilizado para construir as interfaces de forma dinâmica e estruturada.
- **Breeze**: Solução simples e eficiente para autenticação e gerenciamento de sessões.

### 🎨 **Tailwind CSS**
Biblioteca de estilização que facilitou a criação de um design responsivo e moderno com uma abordagem baseada em utilitários.

### 🗄️ **MySQL**
Banco de dados tradicional e robusto, escolhido para armazenar e gerenciar as informações do sistema de forma segura e eficiente.

### 🐞 **Laravel Debugbar**
Ferramenta de depuração para facilitar o desenvolvimento, permitindo visualizar informações detalhadas sobre consultas ao banco de dados, tempo de execução, rotas e outras métricas úteis.

### 🌐 **Biblioteca Laravel pt-BR - lucascudo**
Pacote para traduzir mensagens e validações padrão do Laravel para o português do Brasil. Facilitou a localização do sistema, substituindo textos padrão como mensagens de erro e validações.

### 🔔 **Biblioteca Toastify**
Utilizada para exibir notificações "toast" (temporárias), melhorando a experiência do usuário ao fornecer feedback visual de alertas e confirmações de ações ou mensagens de erro.

---

# 📝 Observação
Foi criada uma **seed** para popular o banco de dados com os registros de testes apresentados no vídeo. Para rodar a seed, utilize o comando:

```bash
php artisan db:seed
```

Além disso, é recomendado utilizar o arquivo .env adequado para garantir que as traduções funcionem corretamente.

---
# 👥 Contas para Testes
```
            nome => 'Gestor de Locatários',
            email => 'gestor.locatarios@magnicred.com.br',
            senha => '12345',
            permissão => 'gestor_locatarios',

            nome => 'Gestor de Imobiliárias',
            email => 'gestor.imobiliarias@magnicred.com.br',
            senha => '12345'
            permissão' => 'gestor_imobiliarias',

            nome => 'Usuário Normal',
            email => 'user@gmail.com',
            senha => '12345'
            permissão => 'Usuário normal'
```
---
# 🎥 Link para um vídeo demonstrativo
https://drive.google.com/file/d/1o_hZqpXpBjkhALFy7jiU-GW_-iVwyIVH/view?usp=sharing
