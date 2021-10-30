<?php

namespace App\Models;

use App\Models\Datas as ModelDatas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Datas extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function min()
    {
        $data = DB::table('datas')
            ->min('value');
        return $data;
    }


    public static function max()
    {
        $data = DB::table('datas')
            ->max('value');
        return $data;
    }


    public static function avg()
    {
        $data = DB::table('datas')
            ->avg('value');
        return $data;
    }

    public static function jangkauan()
    {
        $min = ModelDatas::min();
        $max = ModelDatas::max();
        $res = $max - $min;
        return $res;
    }


    public static function jmlKelas()
    {
        $data = ModelDatas::all()->count();
        $res = ceil(1 + (3.3 * log($data, 10)));
        return $res;
    }


    public static function pjgKelas()
    {
        $j = ModelDatas::jangkauan();
        $k = ModelDatas::jmlKelas();
        $res = ceil($j / $k);
        return $res;
    }


    public static function getFreqTable()
    {
        $datas = ModelDatas::all('value')->toArray();
        $arr = [];
        foreach ($datas as $data) {
            array_push($arr, $data['value']);
        }
        $key = array_unique($arr);
        sort($key);

        $res = [];
        foreach ($key as $k) {
            array_push($res, [
                "key" => $k,
                "value" => count(array_keys($arr, $k)),
            ]);
        }
        return $res;
    }


    public static function getDataBergolong()
    {
        $jmlKelas = ModelDatas::jmlKelas();
        $pjgKelas = ModelDatas::pjgKelas();
        $min = ModelDatas::min();

        $arr = [];
        for ($i = 0; $i < $jmlKelas; $i++) {
            array_push($arr, [
                'end' => $min + ($pjgKelas * $i),
                'begin' => $min + ($pjgKelas * ($i + 1)) - 1,
            ]);
        }

        $res = [];
        foreach ($arr as $a) {
            array_push($res, [
                "end" => $a['end'],
                "begin" => $a['begin'],
                "freq" => DB::table('datas')
                    ->where('value', '>=', $a['end'])
                    ->where('value', '<=', $a['begin'])
                    ->count(),
            ]);
        }
        return $res;
    }


    public static function standarDeviasi()
    {
        $allData = ModelDatas::all();
        $sumData = $allData->sum('value');
        // dd($sumData);
        $jmlData = $allData->count();
        $kuadratData = collect();
        foreach ($allData as $a) {
            $kuadratData->push($a->value * $a->value);
        }
        $sumKuadratData = $kuadratData->sum();

        $res = sqrt(($sumKuadratData - (($sumData * $sumData) / $jmlData)) / ($jmlData - 1));
        return $res;
    }

}
