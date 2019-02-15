@extends('adminlte::page')

@section('title', 'Pagina inicial dos recursos')

@section('content_header')
    <h1>Recursos</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            

            <a href="{{ route('itens.cadastrar') }}" class="btn btn-primary"> 
                <i class="fa fa-cart-plus"></i> Cadastrar
            </a>

        </div>

        <div class="box-body">
            @include('admin.includes.alerts')

            @if ($quantidadeRecursos > 0)
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Descrição</th>
                            <th>Quantidade</th>
                            <th>Disponibilidade</th>
                            <th>Retirar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($queryRecursos as $recursos)
                        <tr>
                            <td>{{ $recursos->id }}</td>
                            <td>{{ $recursos->descricao }}</td>
                            <td>{{ $recursos->quantidade }}</td>
                            @if ($recursos->quantidade >0)
                                <td>recurso disponivel</td>
                            @else
                                <td>recurso indisponivel</td>
                            @endif
                            <td>
                                <a href="{{ route('retirar.id', $recursos->id) }}" class="btn btn-warning">
                                    <i class="far fa-edit"></i> retirar
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('deletar.store', $recursos->id) }}" method="post">
                                    {!! csrf_field() !!}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-exclamation-triangle"></i> excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Nenhum recurso foi cadastrado</p>
            @endif
        </div>
    </div>
@stop
