<?php

namespace App\Http\Controllers;

use App\DataTables\LivrosDataTables;
use App\Http\Requests\CreateLivroRequest;
use App\Http\Requests\UpdateLivroRequest;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LivrosDataTables $dataTables)
    {
        return $dataTables->render('livros.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateLivroRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLivroRequest $request)
    {
        $validated = $request->validated();

        if ($validated) {

            $livro = new Livro();

            $livro->titulo = $request->titulo;
            $livro->autor = $request->autor;
            $livro->editora = $request->editora;
            $livro->idioma = $request->idioma;
            $livro->edicao = $request->edicao;
            $livro->ano = $request->ano;
            $livro->formato = $request->formato;
            $livro->paginas = $request->paginas;
            $livro->sinopse = $request->sinopse;
            $livro->save();

            if ($request->hasFile('capa') &&
                $request->file('capa')->isValid()) {
                $livro->addMedia($request->file('capa'))
                    ->sanitizingFileName(function ($fileName) {
                        return strtolower(str_replace(['#', '/', '\\', ' '], '-', $fileName));
                    })
                    ->withResponsiveImages()
                    ->toMediaCollection('capa', 'capa');
            }

            return redirect()
                ->route('livros.index')
                ->withInput(['titulo' => $request->input('titulo')]);
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Livro $livro
     * @return \Illuminate\Http\Response
     */
    public function show(Livro $livro)
    {
        abort_if(!$livro, 404);

        return view('livros.show', ['livro' => $livro]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Livro $livro
     * @return \Illuminate\Http\Response
     */
    public function edit(Livro $livro)
    {
        abort_if(!$livro, 404);

        return view('livros.edit', ['livro' => $livro]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLivroRequest $request
     * @param Livro $livro
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateLivroRequest $request, Livro $livro)
    {
        abort_if(!$livro, 404);

        $validated = $request->validated();

        if ($validated) {

            $livro->titulo = $request->titulo;
            $livro->autor = $request->autor;
            $livro->editora = $request->editora;
            $livro->idioma = $request->idioma;
            $livro->edicao = $request->edicao;
            $livro->ano = $request->ano;
            $livro->formato = $request->formato;
            $livro->paginas = $request->paginas;
            $livro->sinopse = $request->sinopse;
            $livro->save();

            if ($request->hasFile('capa') &&
                $request->file('capa')->isValid()) {
                $livro->addMedia($request->file('capa'))
                    ->sanitizingFileName(function ($fileName) {
                        return strtolower(str_replace(['#', '/', '\\', ' '], '-', $fileName));
                    })
                    ->withResponsiveImages()
                    ->toMediaCollection('capa', 'capa');
            }

            return redirect()
                ->route('livros.index')
                ->withInput(['titulo' => $request->input('titulo')]);
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Livro $livro
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Livro $livro)
    {
        abort_if(!$livro, 404);

        try{
            $livro->delete();
        } catch (\Exception $e){
            report($e);
        }

        return back();
    }
}
