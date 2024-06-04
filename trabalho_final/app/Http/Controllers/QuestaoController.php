<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Questao;
use App\Models\Teste;

class QuestaoController extends Controller
{
    public function view() {
        return view('questoes.criar-questoes');
    }

    public function create($teste_id) {
        return view('questoes.criar-questoes', compact('teste_id'));
    }

    public function store(Request $request, $teste_id)
    {

        $questao = new Questao;
        $questao->teste_id = $teste_id;
        $questao->enunciado = $request->enunciado;
        $questao->opcao_a = $request->resposta_a;
        $questao->opcao_b = $request->resposta_b;
        $questao->opcao_c = $request->resposta_c;
        $questao->opcao_d = $request->resposta_d;
        $questao->opcao_e = $request->resposta_e;
        $questao->opcao_certa = $request->resposta_correta;
        $questao->valor_questao = $request->valor_questao;
        $questao->save();

        return redirect()->route('dashboard');
    }

    public function storeAndAddAnother(Request $request, $teste_id)
    {
        $this->store($request, $teste_id);
        return redirect()->route('teste.questao.create', ['teste_id' => $teste_id]);
    }

    public function destroy($id) {
        $questao = Questao::findOrFail($id);
        $id_teste = $questao->teste_id;
        $questao->delete();
        return redirect("/teste/edit/{$id_teste}")->with('msg', 'Questão excluída com sucesso!');
    }    

    public function update(Request $request, $id) {
        $data = $request->all();
        Questao::findOrFail($request->id)->update($data);
        $id_teste = Questao::findOrFail($id)->teste_id;
        return redirect()->route('teste.edit', $id_teste)->with('msg', 'Questão alterada com sucesso!');
    }
}
