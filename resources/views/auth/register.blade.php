@extends('auth.layout')

@section('title', 'Registrar')

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

        #register-wrapper {
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
            align-items: stretch; /* Para que os inputs ocupem toda a largura */
        }

        .form-group {
            display: flex;
            flex-direction: row; /* Exibe label e input lado a lado */
            align-items: center; /* Centraliza verticalmente */
            margin-bottom: 15px; /* Espaço entre os grupos */
        }

        label {
            text-align: left; /* Alinha o texto da label à esquerda */
            margin-right: 10px; /* Espaço entre a label e o input */
            width: 100px; /* Largura fixa para as labels */
        }

        input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            flex: 1; /* Faz os inputs ocuparem o restante do espaço */
            margin-left: -55px;
        }

        .confirm-password {
            margin-left: -30px; /* Ajuste específico para o input de confirmar senha */
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
        <h2>Criar Conta</h2>
    </div>

    <div id="register-wrapper">
        <h1>Registrar</h1>

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmar Senha:</label>
                <input type="password" name="password_confirmation" required class="confirm-password">
            </div>
            <button type="submit">Registrar</button>
        </form>

        <p>Já tem uma conta? <a href="{{ route('login') }}">Entrar</a></p>
    </div>

</body>
</html>
@endsection
