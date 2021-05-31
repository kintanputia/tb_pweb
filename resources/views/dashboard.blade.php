<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<!-- component -->
<!-- This is an example component -->
<div>
  <div class="relative items-center justify-center">
    <!-- Header Text-->
    <h1 class="text-left text-2xl font-bold p-4 bg-white-800 text-black-400">Selamat Datang {{ Auth::user()->name }} !</h1>
    <!-- All Cards Container -->
    <div class="lg:flex items-center container mx-auto my-auto">

      <!-- Card 1 -->
      @if (auth()->user()->level=="admin")
      <div class="lg:m-4 shadow-md hover:shadow-lg hover:bg-gray-100 rounded-lg bg-white my-12 mx-8">
        <div class="p-4">
          <h2 class="font-medium text-2xl text-gray-600 text-lg my-2 uppercase">Mahasiswa</h2>
          <div class="mt-5">
            <a href="" class="hover:bg-gray-700 rounded-full py-2 px-3 font-semibold hover:text-white bg-gray-400 text-gray-100">Lihat Detail</a>
          </div>
        </div>
      </div>
      @endif
      <!-- Card 2 -->
      <div class="lg:m-4 shadow-md hover:shadow-lg hover:bg-gray-100 rounded-lg bg-white my-12 mx-8">
        <!-- Card Content -->
        <div class="p-4">
          <h2 class="font-medium text-2xl text-gray-600 text-lg my-2 uppercase">Kelas</h2>
          <div class="mt-5">
            <a href="/kelas" class="hover:bg-gray-700 rounded-full py-2 px-3 font-semibold hover:text-white bg-gray-400 text-gray-100">Lihat Detail</a>
          </div>
        </div>
      </div>
    </div>
</div>
</x-app-layout>
