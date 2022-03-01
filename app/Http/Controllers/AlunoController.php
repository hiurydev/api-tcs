<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function __construct()
    {
        $this->model = new Aluno;
    }

    public function index(Request $request)
    {
        return $this->model::paginate($request->per_page);
    }

    public function show($id)
    {
        $aluno = $this->model::find($id);

        if (!$aluno) return ['error' => 'Aluno não encontrado'];

        return $aluno;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nome'             => 'required',
            'idade'            => 'required',
            'cpf'              => 'required',
            'nome_responsavel' => 'required'
        ]);

        return $this->model::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $aluno = $this->model::find($id);

        if (!$aluno) return ['error' => 'Aluno não encontrado'];

        $this->validate($request, [
            'nome'             => 'required',
            'idade'            => 'required',
            'cpf'              => 'required',
            'nome_responsavel' => 'required'
        ]);

        $aluno->update($request->all());

        return $aluno;
    }

    public function destroy($id)
    {
        $aluno = $this->model::find($id);

        if (!$aluno) return ['error' => 'Aluno não encontrado'];

        return $aluno->destroy($id);
    }
}
