@php
use App\Helpers\Main;
@endphp

@extends('components.admin-dashboard')
    @section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Chi Kuadrat') }}
    </h2>
    @endsection

    @section('content')
    <div class="p-5">
        <div class="bg-gray-50 shadow relative">

            <div class="p-5 bg-white border-b border-gray-200 rounded-lg shadow-sm overflow-x-scroll">
                <table class="text-left w-full border-collapse">
                    <thead class="bg-sidebar text-white text-center">
                        <tr>
                            <th rowspan="2"
                                class="py-4 px-6 bg-blue-600 font-bold uppercase text-sm text-white border-b">
                                Nilai
                            </th>
                            <th rowspan="2"
                                class="py-4 px-6 bg-blue-600 font-bold uppercase text-sm text-white border-b">
                                Frekuensi
                            </th>
                            <th colspan="2"
                                class="py-4 px-6 bg-blue-600 font-bold uppercase text-sm text-white border-b">
                                Batas Kelas
                            </th>
                            <th colspan="2"
                                class="py-4 px-6 bg-blue-600 font-bold uppercase text-sm text-white border-b">
                                Nilai Z
                            </th>
                            <th colspan="2"
                                class="py-4 px-6 bg-blue-600 font-bold uppercase text-sm text-white border-b">
                                Z Table
                            </th>
                            <th rowspan="2"
                                class="py-4 px-6 bg-blue-600 font-bold uppercase text-sm text-white border-b">
                                Proporsi
                            </th>
                            <th rowspan="2"
                                class="py-4 px-6 bg-blue-600 font-bold uppercase text-sm text-white border-b">
                                fe
                            </th>
                            <th rowspan="2"
                                class="py-4 px-6 bg-blue-600 font-bold uppercase text-sm text-white border-b">
                                Chi<br>Kuadrat
                            </th>
                        </tr>
                        <tr>
                            <th
                                class="py-4 px-6 bg-blue-600 font-bold uppercase text-sm text-white border-b">
                                Atas
                            </th>
                            <th
                                class="py-4 px-6 bg-blue-600 font-bold uppercase text-sm text-white border-b">
                                Bawah
                            </th>
                            <th
                                class="py-4 px-6 bg-blue-600 font-bold uppercase text-sm text-white border-b">
                                Atas
                            </th>
                            <th
                                class="py-4 px-6 bg-blue-600 font-bold uppercase text-sm text-white border-b">
                                Bawah
                            </th>
                            <th
                                class="py-4 px-6 bg-blue-600 font-bold uppercase text-sm text-white border-b">
                                Atas
                            </th>
                            <th
                                class="py-4 px-6 bg-blue-600 font-bold uppercase text-sm text-white border-b">
                                Bawah
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $chiKuadratKumulatif = 0 @endphp
                        @foreach ($data as $item)
                        <tr class="hover:bg-grey-lighter text-center">
                            <td class="py-4 px-6 border-b border-grey-light">{{ $item['end'] }} - {{ $item['begin'] }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $item['freq'] }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">
                                @php $bBawah = $item['end'] - 0.5 @endphp
                                {{ $bBawah }}
                            </td>
                            <td class="py-4 px-6 border-b border-grey-light">
                                @php $bAtas = $item['begin'] + 0.5 @endphp
                                {{ $bAtas }}
                            </td>
                            <td class="py-4 px-6 border-b border-grey-light">
                                @php $zScoreDown = round((($bBawah)-$avg) / $sd, 3, PHP_ROUND_HALF_DOWN) @endphp
                                {{ $zScoreDown }}
                            </td>
                            <td class="py-4 px-6 border-b border-grey-light">
                                @php $zScoreUp = round((($bAtas)-$avg) / $sd, 3, PHP_ROUND_HALF_DOWN) @endphp
                                {{ $zScoreUp }}
                            </td>
                            <td class="py-4 px-6 border-b border-grey-light">
                                @php $zTableDown = Main::getZScoreProbability($zScoreDown) @endphp
                                {{ $zTableDown }}
                            </td>
                            <td class="py-4 px-6 border-b border-grey-light">
                                @php $zTableUp = Main::getZScoreProbability($zScoreUp) @endphp
                                {{ $zTableUp }}
                            </td>
                            <td class="py-4 px-6 border-b border-grey-light">
                                @php $proporsi = abs($zTableDown - $zTableUp) @endphp
                                {{ $proporsi }}
                            </td>
                            <td class="py-4 px-6 border-b border-grey-light">
                                @php $freqEkpetasi = $proporsi * $jmlData @endphp
                                {{ $freqEkpetasi }}
                            </td>
                            <td class="py-4 px-6 border-b border-grey-light">
                                @php $chiKuadrat =
                                (($item['freq'] - $freqEkpetasi) * ($item['freq'] - $freqEkpetasi)) / $freqEkpetasi;
                                $chiKuadratKumulatif += $chiKuadrat;
                                @endphp
                                {{ round($chiKuadrat, 6) }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w-full py-3 px-5 mt-3 bg-white border-2 border-blue-500 shadow">
            <p class="font-bold float-left">
                Nilai Total Chi Kuadrat
            </p>
            <p class="font-bold float-right">
                {{ round($chiKuadratKumulatif, 6)}}
            </p>
            <div class="clear-both"></div>
        </div>
    </div>
    @endsection



