<x-admin-dashboard>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kumpulan Data') }}
        </h2>
    </x-slot>

    <div class="py-10">
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

                <div class="py-3 bg-white px-3 rounded-b-lg">
                    {{$datas->links()}}
                </div>
            </div>
        </div>
    </div>
</x-admin-dashboard>
