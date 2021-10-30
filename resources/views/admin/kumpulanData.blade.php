@extends('components.admin-dashboard')
    @section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Kumpulan Data') }}
    </h2>
    @endsection


    @section('content')
    <div class="py-16 relative">
        <div class="mb-3 text-white absolute top-0 right-0">
            <a href="{{ route('export-data') }}" class="bg-white border-2 border-white hover:border-green-500 text-black px-4 py-2.5 shadow-md rounded">
                Export Excel
            </a>
            <button type="button" id="openModal"
                class="ml-2 bg-white border-2 border-white hover:border-yellow-500 text-black px-4 py-2 shadow-md rounded">
                Import Excel
            </button>
        </div>
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-5 bg-white border-b border-gray-200">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="w-2/3 text-center py-3 px-4 uppercase font-semibold text-sm">Data</th>
                                <th class="w-auto text-center py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">

                            @foreach ($datas as $data)
                            <tr>
                                <td class="w-1/3 text-center py-3 px-4">{{$data->value}}</td>
                                <td class="w-1/3 text-center py-3 px-4">
                                    <div class="flex w-full justify-center">
                                        <a href="{{ route('updateData', ["id"=>$data['id']]) }}" class="mr-2 p-2 bg-yellow-300 text-sm rounded-md hover:bg-yellow-500 hover:text-white cursor-pointer">Update</a>
                                        <form action="{{ route('deletedData', ["id"=>$data['id']])}}" onsubmit="return confirm('Anda yakin?')" method="POST" >
                                            @csrf
                                            @method('delete')
                                            <button id="delete" type="submit" class="p-2 bg-red-300 text-sm rounded-md hover:bg-red-500 hover:text-white cursor-pointer">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="py-3 bg-white px-3 rounded-b-lg">
                {{$datas->links()}}
            </div>
        </div>
    </div>


    <div id="modal" class="hidden fixed bg-blue-50 top-0 bottom-0 left-0 right-0 z-20 bg-opacity-80">
        <div class="flex justify-center items-center h-full">
            <div class="bg-gray-50 flex flex-col justify-between items-center h-64 w-96 shadow-lg border">
                <p class="text-xl mt-6 font-bold uppercase">Import Excel File</p>
                <form action="{{ route('import-skor') }}" method="POST" enctype="multipart/form-data" class="mt-6">
                    @csrf
                    <input type="file" name="file" required>
                    <div class="mt-5">
                        <button type="submit"
                            class="bg-yellow-600 hover:bg-yellow-700 px-4 py-2 shadow rounded text-white float-right">
                            Import
                        </button>
                    </div>
                </form>
                <button id="closeModal" class="animate-bounce relative mb-2">
                    <i class="fas fa-times-circle text-xl"></i>
                </button>
            </div>
        </div>
    </div>
    
    <script>
        let open = document.getElementById('openModal');
        let close = document.getElementById('closeModal');
        let modal = document.getElementById('modal');
        open.addEventListener('click', function() {
            modal.classList.toggle('hidden');
        })
        close.addEventListener('click', function() {
            modal.classList.toggle('hidden');
        })
    </script>
    @endsection



