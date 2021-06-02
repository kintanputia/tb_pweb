<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ubah Data Mahasiswa') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="flex justify-center">
      <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 my-4" method="post" action="/dmahasiswa/{{  $user->id }}">
        @method('patch')
        @csrf
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
            Nama Mahasiswa
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px- text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nim" type="text" placeholder="Masukkan Nama Mahasiswa" name="name" value="{{ $user->name }}">
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="nim">
            Nim
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nim" type="text" placeholder="Masukkan Nim" name="nim" value="{{ $user->nim }}">
        </div>
        <div class="flex items-center justify-end">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" onclick="return confimr('Data Berhasil Diubah!')">
            Ubah Data
          </button>
        </div>
      </form>
    </div>
    </div>
</x-app-layout>