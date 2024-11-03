@extends('auth.layout')

@section('title', 'Dashboard')

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

        #dashboard-wrapper {
            padding: 20px;
            margin-top: 60px;
        }

        h1 {
            color: #024726;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #e9e9e9;
        }

        .button {
            padding: 10px 15px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .add-button {
            background-color: #4CAF50;
        }

        .edit-button {
            background-color: #FFA500;
        }

        .delete-button {
            background-color: #FF0000;
        }

        .button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>

    <div id="header">
        <h2>Bem-vindo ao Dashboard</h2>
    </div>

    <div id="dashboard-wrapper">
        <h1>Lista de Criptomoedas</h1>

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('criptos.create') }}" class="button add-button">Adicionar Criptomoeda</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Data de Compra</th>
                    <th>Descrição</th>
                    <th>Valor unitário</th>
                    
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($criptos as $cripto)
                    <tr>
                        <td>{{ $cripto->id }}</td>
                        <td>{{ $cripto->nome }}</td>
                        <td>{{ $cripto->quantidade }}</td>
                        <td>{{ \Carbon\Carbon::parse($cripto->data_compra)->format('d/m/Y') }}</td>
                        <td>{{ $cripto->descricao }}</td>
                        <td>{{ $cripto->valorUnitario }}</td>

                        
                       

                        <td>
                            <a href="{{ route('criptos.edit', $cripto->id) }}" class="button edit-button">Editar</a>
                            <form action="{{ route('criptos.destroy', $cripto->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button delete-button" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
@endsection
