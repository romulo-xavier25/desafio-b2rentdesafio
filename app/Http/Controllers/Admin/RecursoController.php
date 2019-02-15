<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Recurso;
use App\Models\Historico;
use App\Http\Requests\MoneyValidationFormRequest;
use DB;

class RecursoController extends Controller
{
    public function index()
    {
        $queryRecursos = DB::table('recursos')->get();
        $quantidadeRecursos = $queryRecursos ? count($queryRecursos) : 0;
        return view('admin.recurso.index', compact('quantidadeRecursos', 'queryRecursos'));
    }

    public function cadastrar()
    {
        return view('admin.recurso.cadastrar');
    }

    public function cadastrarStore(MoneyValidationFormRequest $request)
    {
        $recurso = new Recurso();
        $response = $recurso->cadastrar($request->all());

        if ($response['success'])
            return redirect()
                        ->route('admin.itens')
                        ->with('success', $response['message']);

        return redirect()
                    ->back('admin.recurso')
                    ->with('error', $response['message']);
    }

    public function retirar($id)
    {
        $queryRecurso = Recurso::findOrFail($id);
        return view('admin.recurso.editar', compact('queryRecurso'));
    }

    public function retirarStore(MoneyValidationFormRequest $request, $id)
    {
        $recurso = new Recurso();
        $response = $recurso->retirar($request->all(), $id);

        if ($response['success'])
            return redirect()
                        ->route('admin.itens')
                        ->with('success', $response['message']);

        return redirect()
                    ->back('admin.recurso')
                    ->with('error', $response['message']);
    }

    public function deletar($id)
    {
        //
    }

    public function deletarStore($id)
    {
        $recurso = new Recurso();
        $response = $recurso->deletar($id);

        if ($response['success'])
            return redirect()
                        ->route('admin.itens')
                        ->with('success', $response['message']);

        return redirect()
                    ->back('admin.recurso')
                    ->with('error', $response['message']);
    }
}
