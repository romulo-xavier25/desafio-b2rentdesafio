@extends('adminlte::page')

@section('title', 'Cadastrar recurso')

@section('content_header')
    <h1>Cadastrar recurso</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <p>Ensira abaixo o recurso desejado</p>
            <p>Cada recurso cadastrado será salvo um registro informando o responsavel pela a entrada do recurso</p>
        </div>

        <div class="box-body">
            <div class="blocoFormCadastro col-xs-12 col-md-6">
                @include('admin.includes.alerts')

                <form method="post" action="{{ route('cadastrar.store') }}">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <input type="text" name="descricao" class="formPadrao form-control" placeholder="Descrição do recurso">
                    </div>
                    <div class="form-group">
                        <input type="text" name="quantidade" class="formPadrao form-control" placeholder="Quantidade">
                    </div>
                    <div class="form-group">
                        <input type="text" name="observacao" class="formPadrao form-control" placeholder="Observação">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop