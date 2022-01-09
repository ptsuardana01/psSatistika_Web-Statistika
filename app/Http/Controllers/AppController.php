<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DatasExport;
use App\Imports\DatasImport;
use App\Imports\SkorsImport;
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
        return view('admin.dataBergolong', [
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


    public function formTambahData()
    {
        return view('admin.tambahData');
    }


    public function add(Request $req)
    {
        Datas::create(['value' => $req->value]);
        return redirect('tambah-data');
    }


    public function destroy($id)
    {
        $data = Datas::find($id);
        $data->delete($data);
        return back();
    }


    public function update(Request $req, $id)
    {
        $data = Datas::find($id);
        $data->value = $req->value;
        $data->save();
        return redirect('/');
    }


    public function formUpdate($id)
    {
        $data = Datas::find($id);
        return view('admin.updateData', [
            'data' => $data,
        ]);
    }


    public function chiKuadrat()
    {
        $jmlData = Datas::all()->count();
        $data = Datas::getDataBergolong();
        $avg = Datas::avg();
        $sd = Datas::standarDeviasi();

        return view('admin.chiKuadrat', [
            'data' => $data,
            'avg' => $avg,
            'sd' => $sd,
            'jmlData' => $jmlData,
        ]);
    }


    public function lilliefors()
    {
        $jmlData = Datas::all()->count();
        $data = Datas::getFreqTable();
        $avg = Datas::avg();
        $sd = Datas::standarDeviasi();
        return view('admin.lilliefors', [
            'data' => $data,
            'avg' => $avg,
            'sd' => $sd,
            'jmlData' => $jmlData,
        ]);
    }

    public function ujiT()
    {
        $jmlData = Datas::all()->count();
        $data = Datas::getFreqTable();
        $avg = Datas::avg();
        $sd = Datas::standarDeviasi();
        return view('admin.ujiT', [
            'data' => $data,
            'avg' => $avg,
            'sd' => $sd,
            'jmlData' => $jmlData,
        ]);
    }

    public function anava()
    {
        $jmlData = Datas::all()->count();
        $data = Datas::getFreqTable();
        $avg = Datas::avg();
        $sd = Datas::standarDeviasi();
        return view('admin.anava', [
            'data' => $data,
            'avg' => $avg,
            'sd' => $sd,
            'jmlData' => $jmlData,
        ]);
    }


    public function dataExport()
    {
        return Excel::download(new DatasExport, 'data.xlsx');
    }


    public function skorImport(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataSkor', $namaFile);
        Excel::import(new DatasImport, public_path('DataSkor/' . $namaFile));
        return redirect('/');
    }
}
