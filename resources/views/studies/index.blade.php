@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-8">
      <h3>Listagem de Estudos</h3>
    </div>
    <div class="col-4">
      <a href="{{ route('studies.create') }}">
        <button class="btn btn-primary">Cadastrar</button>
      </a>
    </div>
  </div>
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Descrição</th>
        <th scope="col">Área</th>
        <th scope="col">Data Inicial</th>
        <th scope="col">Data Final</th>
        <th scope="col">Situação</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($studies as $study)
      <tr>
        <td>{{ $study->id }}</td>
        <td>{{ $study->description }}</td>
        <td>{{ $study->area->description }}</td>
        <td>{{ $study->date_init }}</td>
        <td>{{ $study->date_finish }}</td>
        <td>{{ $study->status }}</td>
        <td class="btn-group">
          <a href="{{ route('studies.edit', ['study' => $study->id]) }}" class="btn btn-info">Editar</a>
          <form action="{{ route('studies.destroy', ['study' => $study->id]) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="delete">
            <button type="submit" class="btn btn-danger">Excluir</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
    </table>
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        {{ $studies->links() }}
      </ul>
    </nav>
</div>
@endsection
