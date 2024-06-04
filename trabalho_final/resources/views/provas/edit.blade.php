@extends('layouts.main')

@section('title', 'Editando teste')

@section('content')

<div class="m-5">
  <form action="/teste/update/{{ $teste->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="border p-5 rounded">
      <div class="form-group">
        <h1 class="mb-3">Editar a prova</h1>
      </div>
      <div class="form-group">
        <div class="col-12 mb-3">
          <label for="nome" class="form-label">Nome da Prova</label>
          <input type="text" class="form-control" id="nome" name="nome" value="{{ $teste->nome }}">
        </div>
      </div>
      <div class="form-group">
        <div class="col-3">
          <label for="pontuacao_minima_aprovacao" class="form-label">Nota Minima</label>
          <input type="number" class="form-control" id="pontuacao_minima_aprovacao" name="pontuacao_minima_aprovacao" step="0.1" value="{{ $teste->pontuacao_minima_aprovacao }}" required>
        </div>
      </div>
      <div class="form-group">
        <div class="col-3">
          <input type="submit" class="btn btn-primary" value="Confirmar edição">
        </div>
      </div>
    </div>
  </form>
    <form action="/teste/{{$teste->id}}/questao/create" method="get">
        <button class="btn btn-primary w-30 m-4" type="submit">
            Adicionar Nova Questão
        </button>
    </form>
</div>

@if (count($teste->questoes) > 0)
@foreach ( $teste->questoes as $questao)
<div class="m-5">
<form action="/questoes/update/{{ $questao->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="border p-5 rounded">
            <div class="form-group">
                <h1 class="mb-3">Editar a questão</h1>
            </div>
            <div class="form-group">
                <div class="col-12 mb-3">
                    <label for="enunciado" class="form-label">Enunciado da Questão</label>
                    <textarea class="form-control" id="enunciado" name="enunciado" rows="4">{{ $questao->enunciado }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-12 mb-3">
                    <label for="opcao_a" class="form-label">Resposta A</label>
                    <input type="text" class="form-control" id="opcao_a" name="opcao_a" value="{{ $questao->opcao_a }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-12 mb-3">
                    <label for="opcao_b" class="form-label">Resposta B</label>
                    <input type="text" class="form-control" id="opcao_b" name="opcao_b" value="{{ $questao->opcao_b }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-12 mb-3">
                    <label for="opcao_c" class="form-label">Resposta C</label>
                    <input type="text" class="form-control" id="opcao_c" name="opcao_c" value="{{ $questao->opcao_c }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-12 mb-3">
                    <label for="opcao_d" class="form-label">Resposta D</label>
                    <input type="text" class="form-control" id="opcao_d" name="opcao_d" value="{{ $questao->opcao_d }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-12 mb-3">
                    <label for="opcao_e" class="form-label">Resposta E</label>
                    <input type="text" class="form-control" id="opcao_e" name="opcao_e" value="{{ $questao->opcao_e }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-3">
                    <label for="opcao_certa" class="form-label">Resposta Correta</label>
                    <select class="form-control" id="opcao_certa" name="opcao_certa" required>
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
                <input type="number" class="form-control" id="valor_questao" name="valor_questao" step="0.1" value="{{ $questao->valor_questao }}">
            </div>
            <div class="d-flex justify-content-center form-group">
                <input type="hidden" name="teste_id" value="{{ $questao->teste_id }}">

                <input type="submit" class="btn btn-success w-30 m-4" value="Confirmar edição da questão">
            </div>
        </div>       
    </form>
    <form action="/questoes/{{ $questao->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger w-100 mt-4">Deletar Questão</button>
            </form>
</div>
@endforeach
@endif
@endsection