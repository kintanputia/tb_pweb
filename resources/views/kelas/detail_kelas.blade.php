<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Kelas') }}
        </h2>
    </x-slot>
   
    <div class="container">
        <div class="shadow-lg rounded-lg my-4 mx-4">
            <div class="bg-white px-6 py-6 rounded-t flex">
                <div class="flex-grow font-bold text-teal-600">
                    Informasi Kelas
                </div>
            </div>
            <div class="px-6 pb-6 rounded-b text-sm bg-white">
                <table>
                    <tr>
                        <td>Kode Kelas</td>
                        <td>: {{ $kelas->kode_kelas }}</td>
                    </tr>
                    <tr>
                        <td>Kode Mata Kuliah</td>
                        <td>: {{ $kelas->kode_matkul }}</td>
                    </tr>    
                    <tr>
                        <td>Nama Mata Kuliah</td>
                        <td>: {{ $kelas->nama_matkul }}</td>
                    </tr>       
                    <tr>
                        <td>Tahun Ajaran</td>
                        <td>: {{ $kelas->tahun }}</td>
                    </tr>   
                    <tr>
                        <td>Semester</td>
                        <td>: {{ $kelas->semester }}</td>
                    </tr>         
                    <tr>
                        <td>SKS</td>
                        <td>: {{ $kelas->sks }}</td>
                    </tr>        
                </table> 
                <div class="flex flex-row justify-end space-x-4 my-1">
                    <div>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-bold px-2 py-2 border border-blue-700 rounded">
                        <a href="/tambah_peserta">Tambah Peserta Kelas</a>
                    </button>
                    </div>
                    <div>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-bold px-2 py-2 border border-blue-700 rounded">
                            <a href="">Tambah Pertemuan</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
                
            
            <div class="flex flex-row justify-center space-x-4">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                NIM
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama Mahasiswa
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($krs as $mhs)
                            <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                    {{ $mhs->krs_id }}
                                    </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">1911521015</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                Fathania Zulfani
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Hapus</a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
                </div>

                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Pertemuan Ke-
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tanggal Pertemuan
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Aksi
                        </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($sPertemuan as $prt)
                        <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                {{ $prt->pertemuan_id }}
                                </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $prt->pertemuan_ke }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                            {{ $prt->tanggal }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Detail</a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                </div>
                </div>
            </div>

    </div>
   
</x-app-layout>
