@extends('layouts.main')

@section('title', 'Criar Novo Teste')

@section('content')
<div class="m-5">
    <form action="{{ route('teste.questao.store', ['teste_id' => $teste_id]) }}" method="POST">
        @csrf
        <div class="border p-5 rounded">
            <div class="form-group">
                <h1 class="mb-3">Crie uma questão</h1>
            </div>
            <div class="form-group">
                <div class="col-12 mb-3">
                    <label for="enunciado" class="form-label">Enunciado da Questão</label>
                    <textarea class="form-control" id="enunciado" name="enunciado" rows="4" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-12 mb-3">
                    <label for="resposta_a" class="form-label">Resposta A</label>
                    <input type="text" class="form-control" id="resposta_a" name="resposta_a" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-12 mb-3">
                    <label for="resposta_b" class="form-label">Resposta B</label>
                    <input type="text" class="form-control" id="resposta_b" name="resposta_b" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-12 mb-3">
                    <label for="resposta_c" class="form-label">Resposta C</label>
                    <input type="text" class="form-control" id="resposta_c" name="resposta_c" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-12 mb-3">
                    <label for="resposta_d" class="form-label">Resposta D</label>
                    <input type="text" class="form-control" id="resposta_d" name="resposta_d" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-12 mb-3">
                    <label for="resposta_e" class="form-label">Resposta E</label>
                    <input type="text" class="form-control" id="resposta_e" name="resposta_e" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-3">
                    <label for="resposta_correta" class="form-label">Resposta Correta</label>
                    <select class="form-control" id="resposta_correta" name="resposta_correta" required>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select>
                </div>
            </div>
            <div class="col-3 mb-3">
                <label for="valor_questao" class="form-label">Valor da Questão</label>
                <input type="number" class="form-control" id="valor_questao" name="valor_questao" step="0.1" required>
            </div>
            <div class="d-flex justify-content-center form-group">
                <button class="btn btn-primary w-30 m-4" formaction="{{ route('teste.questao.add_another', ['teste_id' => $teste_id]) }}" formmethod="POST" type="submit">
                    Adicionar Nova Questão
                </button>

                <input type="hidden" name="teste_id" value="{{ $teste_id }}">

                <input type="submit" class="btn btn-success w-30 m-4" value="Finalizar Teste">
            </div>
        </div>
    </form>
</div>
@endsection
