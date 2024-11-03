<?php

namespace App\Http\Controllers;

use App\Models\Cripto; // Importando o modelo Cripto
use Illuminate\Http\Request;
use App\Helpers\UtilityFunctions;

class CriptoController extends Controller
{
    public function store(Request $request)
    {

        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'quantidade' => 'required|numeric|min:0',
            'data_compra' => 'required|date',
            'descricao' => 'string|max:255',
            'valorUnitario' => 'required|regex:/^\d{1,6}(\.\d{1,4})?$/',
        ]);
        
        // Criar uma nova instância de Cripto e salvar no banco
        Cripto::create([
            'nome' => $request->nome,
            'quantidade' => $request->quantidade,
            'data_compra' => $request->data_compra,
            'descricao' => $request->descricao,
            'valorUnitario' => $request->valorUnitario,
        ]);

        return redirect()->route('criptos.create')->with('success', 'Criptomoeda cadastrada com sucesso!');
    }
    public function create()
    {
        return view('criptos.create'); // Retorna a view do formulário
    }
    public function edit($id)
    {
        $cripto = Cripto::findOrFail($id);
        return view('criptos.edit', compact('cripto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'quantidade' => 'required|numeric|min:0',
            'data_compra' => 'required|date',
            'descricao' => 'string|max:255',
            'valorUnitario' => 'required|regex:/^\d{1,6}(\.\d{1,4})?$/',
        ]);

        $cripto = Cripto::findOrFail($id);
        $cripto->update([
            'nome' => $request->nome,
            'quantidade' => $request->quantidade,
            'data_compra' => $request->data_compra,
            'descricao' => $request->descricao,
            'valorUnitario' => $request->valorUnitario,
        ]);

        // Passando o ID da criptomoeda para a rota edit
        return redirect()->route('criptos.edit', $cripto->id)->with('success', 'Criptomoeda atualizada com sucesso!');
    }
    public function destroy($id)
    {
        $cripto = Cripto::findOrFail($id);
        $cripto->delete();

        return redirect()->route('dashboard')->with('success', 'Criptomoeda excluída com sucesso!');
    }

     public function getNetworks($asset)
    {
        // Monta a URL da API
        $url = "https://api.mercadobitcoin.net/api/v4/{$asset}/networks";

        // Faz a requisição à API
        $response = Http::get($url);

        // Verifica se a resposta foi bem-sucedida
        if ($response->successful()) {
            return $response->json(); // Retorna o JSON da resposta
        }

        return []; // Retorna um array vazio em caso de erro
    }

}


