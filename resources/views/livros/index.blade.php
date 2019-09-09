@extends('layouts.app')

@section('title', 'Listagem de livros')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card bg-light mb-3">
          <div class="card-header">
            <div class="row justify-content-between">
              <div class="col text-left">
                <a href="{{ route('admin') }}" class="btn btn-outline-danger btn-sm">
                  <i class="fas fa-arrow-left"></i> Voltar
                </a>
              </div>
              <div class="col text-right">
                <a href="{{ route('livros.create') }}" class="btn btn-outline-primary btn-sm">
                  <i class="fas fa-plus"></i> Adicionar
                </a>
              </div>
            </div>
          </div>
          <div class="card-body">
            {!! $dataTable->table() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('footerScripts')
  <!--  Datatables JS  -->
  <script src="{{ asset('js/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('js/datatables/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('js/datatables/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('js/datatables/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('js/datatables/dataTables.select.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>

  {!! $dataTable->scripts() !!}
@endpush