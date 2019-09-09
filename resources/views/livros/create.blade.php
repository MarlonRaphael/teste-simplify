@extends('layouts.app')

@section('title', 'Novo livro')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h3>Adicionar livro</h3>
        <a href="{{ route('livros.index') }}" class="d-block my-3 text-primary">
          <i class="fas fa-arrow-left mr-2"></i> Voltar
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card bg-light mb-3">
          <div class="card-body">
            <form action="{{ route('livros.store') }}" method="post"
                  enctype="multipart/form-data">
              @csrf
              <div class="form-row">
                <div class="col-12 text-left">
                  <div class="form-group @error('capa') has-danger @enderror">
                    <label for="Capa" style="cursor:pointer;">
                      <figure>
                        <img src="{{ asset('img/book-default-cover.jpg') }}" class="img-thumbnail" alt=""
                             style="height: 150px;">
                        <figcaption class="my-2">
                          Selecione a capa
                        </figcaption>
                      </figure>
                    </label>
                    <input type="file" class="d-none" id="Capa" name="capa" value="{{ old('capa') }}" required>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group @error('titulo') has-danger @enderror">
                    <label for="Titulo">Título</label>
                    <input type="text" id="Titulo" name="titulo" min="3" max="255" value="{{ old('titulo') }}"
                           class="form-control @error('titulo') is-invalid @enderror"
                           placeholder="Informe o título*" required>
                    @error('titulo')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group @error('autor') has-danger @enderror">
                    <label for="Autor">Autor</label>
                    <input type="text" id="Autor" name="autor" min="3" max="255" value="{{ old('autor') }}"
                           class="form-control @error('autor') is-invalid @enderror"
                           placeholder="Informe o autor*" required>
                    @error('autor')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group @error('editora') has-danger @enderror">
                    <label for="Editora">Editora</label>
                    <input type="text" id="Editora" name="editora" min="3" max="255" value="{{ old('editora') }}"
                           class="form-control @error('editora') is-invalid @enderror"
                           placeholder="Informe a editora*" required>
                    @error('editora')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group @error('idioma') has-danger @enderror">
                    <label for="Idioma">Idioma</label>
                    <input type="text" id="Idioma" name="idioma" min="3" max="255" value="{{ old('idioma') }}"
                           class="form-control @error('idioma') is-invalid @enderror"
                           placeholder="Informe o idioma*" required>
                    @error('idioma')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group @error('edicao') has-danger @enderror">
                    <label for="Edicao">Edição</label>
                    <input type="number" id="Edicao" name="edicao" min="0" value="{{ old('edicao') }}"
                           class="form-control @error('edicao') is-invalid @enderror"
                           placeholder="Informe a edição*" required>
                    @error('edicao')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group @error('ano') has-danger @enderror">
                    <label for="Ano">Ano</label>
                    <input type="text" id="Ano" name="ano" min="3" max="255" value="{{ old('ano') }}"
                           class="form-control @error('ano') is-invalid @enderror"
                           placeholder="Informe o ano*" required>
                    @error('ano')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group @error('formato') has-danger @enderror">
                    <label for="Formato">Formato</label>
                    <select name="formato" id="Formato" required="required"
                            class="form-control @error('formato') is-invalid @enderror">
                      <option value="ebook">E-book</option>
                      <option value="impresso">Impresso</option>
                    </select>
                    @error('formato')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="form-group @error('ano') has-danger @enderror">
                    <label for="Paginas">Páginas</label>
                    <input type="number" id="Paginas" name="paginas" min="10" value="{{ old('paginas') }}"
                           class="form-control @error('paginas') is-invalid @enderror"
                           placeholder="Informe o número de páginas*" required>
                    @error('paginas')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="form-group @error('sinopse') has-danger @enderror">
                    <label for="Sinopse">Sinopse</label>
                    <textarea type="number" id="Sinopse" name="sinopse"
                              class="form-control @error('sinopse') is-invalid @enderror"
                              placeholder="Sinopse do livro*" rows="10" required>{{ old('sinopse') }}</textarea>
                    @error('sinopse')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="btn-group-sm">
                <button class="btn btn-primary" type="submit" role="button">
                  <i class="fas fa-plus mx-2"></i> Cadastrar
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection