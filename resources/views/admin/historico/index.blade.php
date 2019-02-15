@extends('adminlte::page')

@section('title', 'Historico dos recursos')

@section('content_header')
    <h1>Historico</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h4>Registro de entrada e saida dos recursos</h4>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Responsavel pela operação</th>
                        <th>Tipo da operação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listarHistoricos as $listarHistorico)
                        <tr>
                            <td>{{ $listarHistorico->name }}</td>
                            @if ($listarHistorico->tipo == 'E')
                                <td>Entrada</td>
                            @else
                                <td>Saida</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop