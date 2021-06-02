<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Mahasiswa') }}
        </h2>
    </x-slot>
                
        @if (auth()->user()->level=="admin") 
            <div class="flex flex-row justify-center space-x-4">
            <div class="mt-5 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-5 align-middle inline-block min-w sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama Mahasiswa
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                NIM
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                    {{ $user->id }}
                                    </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ $user->name }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                {{ $user->nim }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                {{ $user->email }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ $user->id }}/umahasiswa" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <form action="/dmahasiswa/{{ $user->id }}" method="post" onsubmit="return confirm('Apakah Anda Yakin Hapus Data Ini ?')" class="text-indigo-600 hover:text-indigo-900">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="text-indigo-600 hover:text-indigo-900">Hapus</button>
                                </form>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
                </div>
            </div>
        @endif
   
</x-app-layout>