<?php

namespace App\Http\Controllers;

use App\Models\Datas;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;


class AppController extends Controller
{
    public function index()
    {
        $datas = Datas::paginate(5);
            return view('admin.kumpulanData', [
                'datas' => $datas
            ]);
    }

    public function tabelFrekuensi()
    {
        $min = Datas::min();
        $max = Datas::max();
        $avg = Datas::avg();
        $data = Datas::getFreqTable();

        return view('admin.tabelFrekuensi', [
            // key => value
            'min' => $min,
            'max' => $max,
            'avg' => $avg,
            'data' => $data,
        ]);
    }
}
