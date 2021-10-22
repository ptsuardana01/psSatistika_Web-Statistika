<?php

namespace App\Http\Controllers;

use App\Models\Datas;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;


class AppController extends Controller
{
    public function index()
    {
        $datas = Datas::paginate(10);
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


    public function dataBergolong()
    {
        $min = Datas::min();
        $max = Datas::max();
        $avg = Datas::avg();
        $jmlData = Datas::all()->count();
        $jangkauan = Datas::jangkauan();
        $jmlKelas = Datas::jmlKelas();
        $pjgKelas = Datas::pjgKelas();

        $data = Datas::getDataBergolong();
        return view ('admin.dataBergolong', [
            'min' => $min,
            'max' => $max,
            'avg' => $avg,
            'jmlData' => $jmlData,
            'jangkauan' => $jangkauan,
            'jmlKelas' => $jmlKelas,
            'pjgKelas' => $pjgKelas,
            'data' => $data,
        ]);
    }
}
