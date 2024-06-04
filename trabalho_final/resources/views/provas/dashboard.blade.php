@extends('layouts.main')

@section('title', 'Teste Maker')

@section('content')

<h1>Minhas provas</h1>
@if(count($testes) > 0)
    <table class="table" id="tabela-provas">
        <thead>
            <th>Nome</th>
            <th>Nota Min.</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            @foreach($testes as $teste)
            <tr class="row-exibe-teste box-shadow">
                <th><a href="/teste/{{ $teste->id }}" class="nome-prova nav-link"> {{ $teste->nome }} </a></th>
                <td> {{ $teste->pontuacao_minima_aprovacao }} </td>
                <td><a href="/teste/edit/{{ $teste->id }}"><ion-icon name="create-outline">Editar</ion-icon></a></td>
                <td>
                    <form action="/teste/{{ $teste->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button-ioicon"><ion-icon name="trash-outline">Deletar</ion-icon></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
<span>Você ainda não possui nenhum teste cadastrada!</span>
@endif
@endsection