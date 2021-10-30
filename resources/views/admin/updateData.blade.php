@extends('components.admin-dashboard')
    @section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Update Data') }}
    </h2>
    @endsection

    @section('content')
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-5">
            <div class="overflow-hidden sm:rounded-lg grid sm:grid-cols-1 lg:grid-cols-4 gap-4">
                <!-- tabel data -->
                <div class="p-5 bg-blue-500 border-b border-gray-200 rounded-lg shadow-sm grid lg:col-span-2 lg:col-start-2">
                    <form action="{{ route('updateData',["id"=>$data['id']]) }}" method="POST" class="p-10 bg-white rounded-lg">
                        @csrf
                        @method('put')
                        <div>
                            <label class="block text-gray-700" for="value">Data</label>
                            <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="value" name="value" type="number"
                                required placeholder="Masukkan Data" aria-label="Skor" value="{{$data['value']}}" autofocus>
                        </div>
                        <div class="mt-6 ">
                            <button class=" px-4 py-2 text-white font-light tracking-wider bg-green-500 hover:bg-green-700 rounded shadow"
                                type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
