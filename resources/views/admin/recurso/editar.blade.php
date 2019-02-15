@extends('adminlte::page')

@section('title', 'Retirar recurso')

@section('content_header')
    <h1>Retirar recurso</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
        <p>Cada recurso retirado será salvo em um registro informando o responsavel pela a saida do recurso</p>
        </div>
        <div class="box-body">
            <div class="blocoFormCadastro col-xs-12 col-md-6">
                @include('admin.includes.alerts')

                <form method="post" action="{{ route('retirar.store', $queryRecurso->id) }}">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <input type="text" name="descricao" class="formPadrao form-control" value="{{ $queryRecurso->descricao }}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="quantidade" class="formPadrao form-control" value="{{ $queryRecurso->quantidade }}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="observacao" class="formPadrao form-control" value="{{ $queryRecurso->observacao }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning"><i class="far fa-edit"></i>Retirar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop