<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $dataset = \App\Models\Dataset::where('id','>',30)->get();
        // dd($dataset);
        $tanggal = [];
        $aluminium_cash = [];
        $aluminium = [];
        $alumina = [];

        foreach($dataset as $ds){
            $tanggal[] = $ds->tanggal;
            $aluminium_cash[] = $ds->aluminium_cash;
            $aluminium[] = $ds->aluminium;
            $alumina[] = $ds->alumina;    
        }
        return view('dashboards.index',['dataset' => $dataset,'tanggal' => $tanggal,'aluminium_cash' => $aluminium_cash,'aluminium' => $aluminium,'alumina' => $alumina]);
    }
}
