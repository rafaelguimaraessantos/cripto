@extends('auth.layout')

@section('title', 'Editar Criptomoeda')

@section('content')
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            font-family: 'Roboto', sans-serif;
        }

        #header {
            width: 100%;
            background-color: #024726;
            color: white;
            text-align: center;
            padding: 20px 0;
            position: relative;
        }

        #crypto-wrapper {
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            padding: 40px;
            width: 400px;
            margin: 60px auto;
        }

        h1 {
            margin-bottom: 20px;
            color: #024726;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input {
            margin-bottom: 15px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            margin-bottom: 15px;
            text-align: center;
        }

        .success-message {
            color: green;
            margin-bottom: 15px;
            text-align: center;
        }

        .back-button {
            background-color: #ccc;
            color: black;
            text-align: center;
            text-decoration: none;
            padding: 10px 178px;
            border-radius: 5px;
            display: block;
            margin: 20px auto;
            width: fit-content;
        }
    </style>
</head>
<body>

    <div id="header">
        <h2>Editar Criptomoeda</h2>
    </div>

    <div id="crypto-wrapper">
        <h1>Editar Cripto</h1>

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('criptos.update', $cripto->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="nome" value="{{ old('nome', $cripto->nome) }}" placeholder="Nome" required>        
            <input type="number" name="quantidade" value="{{ old('quantidade', $cripto->quantidade) }}" placeholder="Quantidade" required>
            <input type="date" name="data_compra" value="{{ old('data_compra', $cripto->data_compra) }}" required>
            <input type="text" name="descricao" value="{{ old('descricao', $cripto->descricao) }}" placeholder="Descrição" required> 
            <input type="text" name="valorUnitario" value="{{ old('valorUnitario', $cripto->valorUnitario) }}" placeholder="Valor unitário" required>

            <button type="submit">Atualizar</button>
        </form>

        <a href="{{ route('dashboard') }}" class="button back-button">Voltar</a>

    </div>

</body>
</html>
@endsection
