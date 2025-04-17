@extends('layouts.tall')
@section('content')

    <header>

    </header>

    <main class="bg-white">
        <div class="container mx-auto px-4 py-12 mt-10">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Каталог</h2>



            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6  ">
                @foreach($catalogs as $catalog)
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-3">
                                <a href="{{asset('catalog/'.$catalog->id)}}" class="hover:text-cyan-700 transition duration-200">{{$catalog->name}}</a>
                            </h3>
                            @if($catalog->childs)
                                <ul class="space-y-2">
                                    @foreach($catalog->childs as $child)
                                        <li>
                                            <a
                                                href="/catalog/{{$child->id}}"
                                                class="block py-2 px-4 rounded-md hover:bg-cyan-700 hover:text-base-200 transition duration-200 text-gray-700"
                                            >
                                                {{$child->name}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </main>




@endsection
