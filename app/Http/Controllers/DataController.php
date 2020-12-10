<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        $dataset = \App\Models\Dataset::all(); 
        $prediksi = \App\Models\Prediksi::all(); 
        
        // Data Chart
        $tanggal = [];
        $aluminium_cash = [];
        $aluminium = [];
        $alumina = [];

        foreach($prediksi as $p){
            $tanggal[] = $p->tanggal;
            $aluminium_cash[] = $p->aluminium_cash;
            $aluminium[] = $p->aluminium;
            $alumina[] = $p->alumina;
            
        }

        // dd(json_encode($aluminium));

        return view('data.index',['dataset' => $dataset,'tanggal' => $tanggal,'aluminium_cash' => $aluminium_cash,'aluminium' => $aluminium,'alumina' => $alumina]);
    }
}
