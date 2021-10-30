@php
use App\Helpers\Main;
@endphp

@extends('components.admin-dashboard')
    @section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Liliefors') }}
    </h2>
    @endsection

    @section('content')
    <div class="p-5">
        <div class="bg-gray-50 overflow-auto shadow">

            <div class="p-5 bg-white border-b border-gray-200 rounded-lg shadow-sm">
                <table class="text-left w-full border-collapse">
                    <thead class="bg-sidebar text-white text-center">
                        <tr>
                            <th
                                class="py-4 px-6 bg-green-600 font-bold uppercase text-sm">
                                Nilai
                            </th>
                            <th
                                class="py-4 px-6 bg-green-600 font-bold uppercase text-sm">
                                Frekuensi Kumulatif
                            </th>
                            <th
                                class="py-4 px-6 bg-green-600 font-bold uppercase text-sm">
                                Zi
                            </th>
                            <th
                                class="py-4 px-6 bg-green-600 font-bold uppercase text-sm">
                                F(Zi)
                            </th>
                            <th
                                class="py-4 px-6 bg-green-600 font-bold uppercase text-sm">
                                S(Zi)
                            </th>
                            <th
                                class="py-4 px-6 bg-green-600 font-bold uppercase text-sm">
                                |F(Zi) - S(Zi)|
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $fk = 0 @endphp
                        @foreach ($data as $item)
                        <tr class="bg-white text-center">
                            <td class="py-4 px-6 border-b">{{ $item['key'] }}</td>
                            <td class="py-4 px-6 border-b">
                                @php $fk += $item['value'] @endphp
                                {{ $fk }}
                            </td>
                            <td class="py-4 px-6 border-b">
                                @php $zi = ($item['key'] - $avg) / $sd @endphp
                                {{ round($zi, 3) }}
                            </td>
                            <td class="py-4 px-6 border-b">
                                @php $fZi = Main::getZScoreProbability($zi) @endphp
                                {{ $fZi }}
                            </td>
                            <td class="py-4 px-6 border-b">
                                @php $sZi = $fk/$jmlData @endphp
                                {{ $sZi }}
                            </td>
                            <td class="py-4 px-6 border-b">
                                @php $fsZi = abs($fZi - $sZi) @endphp
                                {{ $fsZi }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
