<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use App\Models\Historico;

class HistoricoController extends Controller
{
    public function index()
    {
        $listarHistoricos = DB::table('users')
        ->LeftJoin('historicos', 'users.id', '=', 'historicos.user_id')
        ->select('users.name', 'historicos.tipo')
        ->get();
        return view('admin.historico.index', compact('listarHistoricos'));
    }
}
