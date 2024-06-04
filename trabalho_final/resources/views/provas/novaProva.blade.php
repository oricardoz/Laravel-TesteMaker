@extends('layouts.main')

@section('title', 'Criar Novo Teste')

@section('content')
<div class="m-5">
  <form action="{{ route('teste.store') }}" method="POST">
    @csrf
    <div class="border p-5 rounded">
      <div class="form-group">
        <h1 class="mb-3">Crie uma nova prova</h1>
      </div>
      <div class="form-group">
        <div class="col-12 mb-3">
          <label for="nome" class="form-label">Nome da Prova</label>
          <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
      </div>
      <div class="form-group">
        <div class="col-3">
          <label for="pontuacao_minima_aprovacao" class="form-label">Nota Minima</label>
          <input type="number" class="form-control" id="pontuacao_minima_aprovacao" name="pontuacao_minima_aprovacao" step="0.1" required>
        </div>
      </div>
      <div class="d-flex justify-content-center form-group">
        <input type="submit" class="btn btn-success" value="Adicionar Questão">
      </div>
    </div>
  </form>
</div>
@endsection
