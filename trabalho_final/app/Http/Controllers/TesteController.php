<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teste;
use App\Models\User;

class TesteController extends Controller
{
    public function create() {
        return view("provas.novaProva");
    }

    public function store(Request $request)
    {
        $teste = new Teste;
        $teste->nome = $request->nome;
        $teste->user_id = auth()->id();
        $teste->pontuacao_minima_aprovacao = $request->pontuacao_minima_aprovacao;
        $teste->save();

        return redirect()->route('teste.questao.create', ['teste_id' => $teste->id]);
    }

    public function show($id) {
        $teste = Teste::with('questoes')->findOrFail($id);
        return view('provas.show', ['teste' => $teste]);
    }

    public function dashboard() {
        $user = auth()->user();
        $testes = $user->testes;

        return view('provas.dashboard', ['testes'=> $testes]);
    }

    public function destroy($id) {
        Teste::findOrFail($id)->delete();
        return redirect('/dashboard')->with('msg', 'Teste excluído com sucesso!');
    }

    public function edit($id) {
        $teste = Teste::with('questoes')->findOrFail($id);
        return view('provas.edit', ['teste'=> $teste]);
    }

    public function update(Request $request, $id) {
        $data = $request->all();
        Teste::findOrFail($request->id)->update($data);
        return redirect()->route('teste.edit', $id)->with('msg', 'Teste alterado com sucesso!');
    }
}