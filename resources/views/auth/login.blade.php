@extends('auth.layout')

@section('title', 'Login')

@section('content')
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
        }

        #header {
            width: 100%;
            background-color: #024726; /* Cor da faixa preta */
            color: white;
            text-align: center;
            padding: 10px 0;
            position: absolute; /* Para ficar fixo no topo */
            top: 0;
        }

        #login-wrapper {
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
            margin-top: 60px; /* Espaço para a faixa preta */
        }

        h1 {
            margin-bottom: 20px;
            color: #024726; /* Cor do título */
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
        }

        p {
            margin-top: 15px;
        }
    </style>
</head>
<body>

    <div id="header">
        <h2>Bem-vindo ao Login</h2>
    </div>

    <div id="login-wrapper">
        <h1>Login</h1>

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="password" name="password" placeholder="Senha" required>
            
            <p>Ainda não tem uma conta? <a href="{{ route('register') }}">Registrar</a></p>

            <button type="submit">Entrar</button>
        </form>
    </div>

</body>
</html>
@endsection
