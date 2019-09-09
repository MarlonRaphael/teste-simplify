@extends('layouts.app')

@section('content')
  <div class="container cards mt-5">
    <h3>Bem vindo(a)</h3>
    <div class="row justify-content-center">
      <div class="col">
        <a href="{{ route('livros.index') }}" class="card card-10 stacked--fan-right">
          <div class="content">
            <code class="title text-light">
              Acessar livraria <i class="fas fa-hand-point-right"></i>
            </code>
          </div>
        </a>
      </div>
    </div>
  </div>
@endsection
