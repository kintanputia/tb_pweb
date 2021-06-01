<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ubah Kelas') }}
        </h2>
    </x-slot>
    <div class="container">
    <div class="flex justify-center">
  <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 my-4">
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="kode_kelas">
        Kode Kelas
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px- text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="kode_kelas" type="text" placeholder="Kode Kelas">
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="kode_matkul">
        Kode Mata Kuliah
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="kode_matkul" type="text" placeholder="Kode Mata Kuliah">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_matkul">
        Nama Mata Kuliah
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nama_matkul" type="text" placeholder="Nama Mata Kuliah">
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="tahun">
        Tahun
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="tahun" type="text" placeholder="Tahun">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="semester">
        Semester
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="semester" type="text" placeholder="Semester">
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="sks">
        Sks
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="sks" type="text" placeholder="Sks">
    </div>
    <div class="flex items-center justify-end">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
        Submit
      </button>
    </div>
  </form>
</div>
</div>   
</x-app-layout>
