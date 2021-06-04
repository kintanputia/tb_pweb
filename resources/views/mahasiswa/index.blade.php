<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mahasiswa') }}
        </h2>
    </x-slot>
    @if (auth()->user()->level=="admin")
        <div class="container">
            <div class="flex justify-center  mt-5 pb-3">
                <h1 class="text-xl text-blue-500">List Data Mahasiswa</h1>
            </div>
                
                @if (session('status'))
                <div class="flex justify-center mx-96 px-4 py-2 mb-4 text-sm text-center text-green-800 bg-green-300 rounded-full shadow-sm">
                    {!! session('status') !!}
                </div>
                @endif

                <div class="flex justify-center"> 
                    <div class="bg-white shadow-xl rounded-lg w-1/2">
                        @foreach($mahasiswa as $user)
                        <ul class="divide-y divide-gray-300">
                            <li class="p-4 hover:bg-gray-50 cursor-pointer">
                                {{ $user->name}}
                                <button class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-grey border-green-600 hover:bg-grey">
                                    <a href="/dmahasiswa/{{$user->id}}">Detail</a>
                                </button>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                    <div class="py-2 flex justify-center text-gray-600 bg-secondary-50 my-3">
                        {{ $mahasiswa->links() }}
                    </div>
             </div>
    @endif
    <div class="flex absolute top-20 right-28  mx-10">
        <button class="p-2 ml-4 mr-2 border-2 bg-white rounded hover:text-red-600 text-black border-blue-600 hover:bg-grey">
            <a href="/dashboard">Kembali</a>
        </button>
    </div>
</x-app-layout>
