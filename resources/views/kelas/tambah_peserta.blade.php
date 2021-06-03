<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Peserta Kelas') }}
        </h2>
    </x-slot>

    <div class="container">

        <div class="flex justify-center">
            <form method="post" action="/dkelas/{{$kelas->id}}" class=" flex-1 max-w-xl m-4 p-10 bg-white rounded shadow-xl">
            @csrf
                <p class="text-gray-800 font-medium">Pilih Mahasiswa</p>
                <div class="">
                <!-- <label class="block text-sm text-gray-00" for="mahasiswa">Nama Mahasiswa</label> -->
                    <select name="mahasiswa_id" id="mahasiswa" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">Select Name</option>
                        @foreach ($dt as $mhs)
                        <option value="{{ $mhs->id }}">{{ $mhs->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
                <div class="mt-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-bold px-2 py-2 border border-blue-700 rounded">
                        <a href="/dkelas/{{ $kelas->id }}">Kembali</a>
                    </button>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-bold px-2 py-2 border border-blue-700 rounded">
                        Tambah Data
                    </button>
                </div>
            </form>
        </div>

    </div>

</x-app-layout>