<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>MagniCred - Área de Login</title>

        <link rel="icon" href="{{ asset('favicon.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

        <!-- Styles -->
        <style>
            body {
                background-image: url('/utils/Fundo-site.webp');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                height: 100vh;
                margin: 0;
                font-family: 'Figtree', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="container py-5">
            <div class="w-50 center border rounded px-3 py-3 mx-auto" style="background-color: rgba(255, 255, 255, 0.9);">
                <h1 class="text-center">MagniCred</h1>
                <form id="loginForm" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3 d-grid">
                        <button 
                            type="submit" 
                            class="btn btn-primary" 
                            style="background-color: #69B6FF; border-color: #69B6FF; font-family: 'MontSerrat', sans-serif; font-weight: bold;"
                        >
                            Entrar
                        </button>
                    </div>
                    <div class="text-center mb-3 d-grid">
                        <p>Não possui uma conta? <a href="/register">Clique aqui</a></p>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
            document.getElementById('loginForm').addEventListener('submit', function(event) {
                event.preventDefault();

                const email = event.target.email.value;
                const password = event.target.password.value;

                axios.post('/login', { email, password })
                    .then(response => {
                        if (response.status === 302 || response.status === 200) {
                            Toastify({
                                text: "Login realizado com sucesso! Redirecionando...",
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "center",
                                backgroundColor: "linear-gradient(to right, #4caf50, #81c784)",
                            }).showToast();

                            setTimeout(() => {
                                window.location.href = '/dashboard';
                            }, 3000);
                        }
                    })
                    .catch(error => {
                        Toastify({
                            text: error.response.data.message,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "linear-gradient(to right, #e53935, #ef5350)",
                        }).showToast();
                    });
            });
        </script>
    </body>
</html>
