@extends('layouts.main')

@section('title', 'Teste Maker')

@section('content')

<h1>{{ $teste->nome }}</h1>
<a href="/teste/edit/{{ $teste->id }}"><ion-icon name="create-outline">Editar</ion-icon></a>
@if (count($teste->questoes) > 0)
@foreach ( $teste->questoes as $questao)
<div class="border p-5 rounded">
    <div class="form-group">
        <div class="col-12 mb-3">
            <label for="enunciado" class="form-label">{{ $loop->index + 1}}. {{ $questao->enunciado }}</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-12 mb-3">
            <label for="resposta_a" class="form-label">Resposta A</label>
            <input type="text" class="form-control" id="resposta_a" name="resposta_a" value="{{ $questao->opcao_a }}" disabled>
        </div>
    </div>
    <div class="form-group">
        <div class="col-12 mb-3">
            <label for="resposta_b" class="form-label">Resposta B</label>
            <input type="text" class="form-control" id="resposta_b" name="resposta_b" value="{{ $questao->opcao_b }}" disabled>
        </div>
    </div>
    <div class="form-group">
        <div class="col-12 mb-3">
            <label for="resposta_c" class="form-label">Resposta C</label>
            <input type="text" class="form-control" id="resposta_c" name="resposta_c" value="{{ $questao->opcao_c }}" disabled>
        </div>
    </div>
    <div class="form-group">
        <div class="col-12 mb-3">
            <label for="resposta_d" class="form-label">Resposta D</label>
            <input type="text" class="form-control" id="resposta_d" name="resposta_d" value="{{ $questao->opcao_d }}" disabled>
        </div>
    </div>
    <div class="form-group">
        <div class="col-12 mb-3">
            <label for="resposta_e" class="form-label">Resposta E</label>
            <input type="text" class="form-control" id="resposta_e" name="resposta_e" value="{{ $questao->opcao_e }}" disabled>
        </div>
    </div>
    <div class="form-group">
        <div class="col-3">
            <label for="resposta_correta" class="form-label">Resposta Correta</label>
            <select class="form-control" id="resposta_correta" name="resposta_correta" disabled>
                <option value="A" {{ $questao->opcao_certa == 'A' ? 'selected' : '' }}>A</option>
                <option value="B" {{ $questao->opcao_certa == 'B' ? 'selected' : '' }}>B</option>
                <option value="C" {{ $questao->opcao_certa == 'C' ? 'selected' : '' }}>C</option>
                <option value="D" {{ $questao->opcao_certa == 'D' ? 'selected' : '' }}>D</option>
                <option value="E" {{ $questao->opcao_certa == 'E' ? 'selected' : '' }}>E</option>
            </select>
        </div>
    </div>
    <div class="col-3 mb-3">
        <label for="valor_questao" class="form-label">Valor da Questão</label>
        <input type="number" class="form-control" id="valor_questao" name="valor_questao" step="0.1" value="{{ $questao->valor_questao }}" disabled>
    </div>
</div>
@endforeach
@else
<span>Nenhuma questão encontrada no teste!</span>
@endif
@endsection