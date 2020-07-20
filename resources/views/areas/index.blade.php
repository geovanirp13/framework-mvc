@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-8">
      <h3>Listagem de Áreas</h3>
    </div>
    <div class="col-4">
      <a href="{{ route('areas.create') }}">
        <button class="btn btn-primary">Cadastrar</button>
      </a>
    </div>
  </div>
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Descrição</th>
        <th scope="col">Cor</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($areas as $area)
      <tr>
        <td>{{ $area->id }}</td>
        <td>{{ $area->description }}</td>
        <td>{{ $area->color }}</td>
        <td class="btn-group">
          <a href="{{ route('areas.edit', ['area' => $area->id]) }}" class="btn btn-primary">Editar</a>
          <form action="{{ route('areas.destroy', ['area' => $area->id]) }}" method="post">
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
      {{ $areas->links() }}
    </ul>
  </nav>
</div>
@endsection
