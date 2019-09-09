@extends('layouts.app')

@section('title', 'Detalhes do livros')

@section('content')
  <div class="container">
    <div class="row justify-content-between">
      <div class="col text-left">
        <a href="{{ route('livros.index') }}" class="btn btn-outline-danger btn-sm">
          <i class="fas fa-arrow-left"></i> Voltar
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card bg-light mb-3">
          <div class="card-header">
            <h3>{{ $livro->titulo }}</h3>
          </div>
          <div class="card-body">
            <h3>Características</h3>
            <table class="table">
              <caption>Detalhes do livro</caption>
              <tbody>
              <tr>
                <td colspan="2" class="text-center">
                  <img src="{{ $livro->capa }}" alt="{{ $livro->titulo }}"
                       width="287" height="326" class="shadow img-thumbnail m-3">
                </td>
              </tr>
              <tr>
                <th scope="col">#</th>
                <td>{{ $livro->id }}</td>
              </tr>
              <tr>
                <th scope="col">Título</th>
                <td>{{ $livro->titulo }}</td>
              </tr>
              <tr>
                <th scope="col">Autor</th>
                <td>{{ $livro->autor }}</td>
              </tr>
              <tr>
                <th scope="col">Editora</th>
                <td>{{ $livro->editora }}</td>
              </tr>
              <tr>
                <th scope="col">Idioma</th>
                <td>{{ $livro->idioma }}</td>
              </tr>
              <tr>
                <th scope="col">Edição</th>
                <td>{{ $livro->edicao }}</td>
              </tr>
              <tr>
                <th scope="col">Ano</th>
                <td>{{ $livro->ano }}</td>
              </tr>
              <tr>
                <th scope="col">Formato</th>
                <td>{{ $livro->formato }}</td>
              </tr>
              <tr>
                <th scope="col">Páginas</th>
                <td>{{ $livro->paginas }}</td>
              </tr>
              <tr>
                <th colspan="2">Descrição</th>
              </tr>
              <tr>
                <td colspan="2">{{ $livro->sinopse }}</td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('footerScripts')
  <!--  Datatables JS  -->
@endpush