@extends('layouts.tall')
@section('content')

    <header>

    </header>


    <main class="bg-white " >
        <div class="mt-10 ml-4 w-full lg:w-1/2  ">
            <h2 class="text-3xl font-bold text-base-400">
                @if($catalog->parent)


                            <a href="/catalog/{{$catalog->parent->id}}" class="block py-2 px-4 rounded-md hover:bg-gray-200 active-link" data-section="section1">{{$catalog->parent->name}} </a>

                @endif
                {{$catalog->name}}</h2>
        </div>


        <div class="container mx-auto px-4 py-8 flex flex-col md:flex-row  ">

            <div class="w-full md:w-1/4 bg-gray-100 rounded-md p-4 mb-4 md:mb-0 md:mr-4 shadow-md">
                @if($catalog->childs)
                <ul class="space-y-2">

                        @foreach($catalog->childs as $child)
                    <li>

                        <a href="/catalog/{{$child->id}}" class="block py-2 px-4 rounded-md hover:bg-cyan-700 hover:text-base-200 active-link" data-section="section1">
                            {{$child->name}}
                        </a>
                    </li>
                        @endforeach
                    @endif

                </ul>

            </div>

            <div class="w-full lg:w-3/4">
                @if($catalog->products && count($catalog->products) > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($catalog->products as $product)
                            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                <a href="{{ asset('storage/' . $product->picture) }}">
                                    <img src="{{ asset('storage/' . $product->picture) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover object-center">
                                </a>
                                <div class="p-4">
                                    <h3 class="text-md font-semibold text-gray-800">
                                        <a href="{{ asset('storage/' . $product->picture) }}" class="hover:text-cyan-700 transition duration-200">{{ $product->name }}</a>
                                    </h3>
                                    <p class="mt-2 text-gray-600"> {{ $product->price }} рублей</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                @else

                    <div class="bg-white rounded-md p-6 shadow-md">
                        <p class="text-gray-500">В этой категории нет товаров.</p>
                    </div>
                @endif
            </div>


        </div>

    </main>




@endsection
