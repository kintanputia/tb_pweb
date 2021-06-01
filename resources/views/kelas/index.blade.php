<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelas') }}
        </h2>
    </x-slot>
    @if (auth()->user()->level=="admin")
        <div class="container">
            <div class="flex justify-center p-4 mb-10">
                <h1 class="text-xl text-blue-500">Daftar Kelas</h1>
            </div>
            <div class="flex justify-center">
                    <div class="bg-white shadow-xl rounded-lg w-1/2">
                    @foreach($data_krs as $kelas)
                        <ul class="divide-y divide-gray-300">
                            <li class="p-4 hover:bg-gray-50 cursor-pointer">
                            {{ $kelas->kode_kelas }}
                            <button class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-grey border-grey hover:bg-grey">
                            <a href="/dkelas/{{$kelas->id}}">Detail</a>
                            </button>
                            <button class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-grey border-grey hover:bg-grey">
                            <a href="/ukelas/{{$kelas->id}}">Ubah</a>
                            </button>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <button class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-grey border-grey hover:bg-grey">
                            <a href="/tkelas">Tambah</a>
                            </button>
                </div>
        </div>
    @endif
</x-app-layout>
