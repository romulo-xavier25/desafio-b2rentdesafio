<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use APP\User;
use App\Models\Historico;

class Recurso extends Model
{

    public $timestamps = false;

    public function cadastrar($valoresFormCadastro) : array
    {
        DB::beginTransaction();
        $recurso = new Recurso();
        $recurso->user_id = auth()->user()->id;
        $recurso->descricao = $valoresFormCadastro['descricao'];
        $recurso->quantidade = $valoresFormCadastro['quantidade'];
        $recurso->observacao = $valoresFormCadastro['observacao'];
        $recurso->save();

        // Registro de quem estar realizando a entrada do recurso
        $historico = auth()->user()->historicos()->create([
            'tipo'          => 'E',
        ]);

        if ($recurso && $historico){
            DB::commit();

            return [
                'success' => true,
                'message' => 'recurso cadastrado com sucesso!'
            ];

        } else {
            
            DB::rollback();
            
            return [
                'success' => false,
                'message' => 'falha em cadastrar o recurso'
            ];
        }
    }

    /*
    * o valor colocado em quantidade será o numero a qual o sobrevivente irá retirar
    * EX.: se existir 5 revolver e o usuario inserir o numero 3 em quantidade, será debitado do valor atual que ficaria 2
    */
    public function retirar($request, $id)
    {
        DB::beginTransaction();

        $editarRecurso = Recurso::findOrFail($id);
        $editarRecurso->user_id = auth()->user()->id;
        $editarRecurso->descricao = $request['descricao'];
        $editarRecurso->quantidade = $request['quantidade'];
        $editarRecurso->observacao = $request['observacao'];
        $editarRecurso->save();

        // Registro de quem estar realizando a saida do recurso
        $historico = auth()->user()->historicos()->create([
            'tipo'          => 'S',
        ]);

        if ($editarRecurso){
            DB::commit();

            return [
                'success' => true,
                'message' => 'recurso retirado com sucesso!'
            ];

        } else {
            
            DB::rollback();
            
            return [
                'success' => false,
                'message' => 'falha em retirar o recurso'
            ];
        }
    }

    public function deletar($id)
    {
        DB::beginTransaction();

        $deletarRecurso = Recurso::find($id);
        $deletarRecurso->delete();

        if ($deletarRecurso){
            DB::commit();

            return [
                'success' => true,
                'message' => 'recurso deletado com sucesso!'
            ];

        } else {
            
            DB::rollback();
            
            return [
                'success' => false,
                'message' => 'falha em deletado o recurso'
            ];
        }

    }

}
