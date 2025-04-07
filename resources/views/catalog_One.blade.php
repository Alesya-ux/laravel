@extends('layouts.tall')
@section('content')

    <header>
        <div class="hero mt-10 relative overflow-hidden" style="min-h-200;">
            <div class="hero-bg absolute top-0 left-0 w-full h-full z-0" style="background-image: url('/pictures/forma.png'); background-size: cover; background-position: center; opacity: 0.2;"></div>
            <div class="hero-content flex-col lg:flex-row-reverse relative z-10">
                <img
                    src="/pictures/maskot/maskot.png"
                    class="max-w-sm h-96 object-cover rounded-lg " />
                <div>
                    <h1 class="text-5xl font-bold">АДЕНТИНА СЕРВИС</h1>
                    <p class="py-6">
                        Защита от вирусов и бактерий: дезинфицирующее оборудование и ковры для предприятий!
                    </p>
                    <button class="btn btn-soft bg-cyan-700 text-base-200">Каталог</button>
                </div>
            </div>
        </div>
    </header>


    <main >
        <div class="mt-20 ml-4 w-full lg:w-1/2">
            <h2 class="text-3xl font-bold text-base-200">
                @if($catalog->parent)


                            <a href="/catalog/{{$catalog->parent->id}}" class="block py-2 px-4 rounded-md hover:bg-gray-200 active-link" data-section="section1">{{$catalog->parent->name}} </a>

                @endif
                {{$catalog->name}}</h2>
        </div>


        <div class="container mx-auto px-4 py-8 flex flex-col md:flex-row">
            <!-- Левое меню -->
            <div class="w-full md:w-1/4 bg-gray-100 rounded-md p-4 mb-4 md:mb-0 md:mr-4 shadow-md">  <!-- Added shadow-md -->
                @if($catalog->childs)
                <ul class="space-y-2">

                        @foreach($catalog->childs as $child)
                    <li>

                        <a href="/catalog/{{$child->id}}" class="block py-2 px-4 rounded-md hover:bg-gray-200 active-link" data-section="section1">
                            {{$child->name}}
                        </a>
                    </li>
                        @endforeach
                    @endif

                </ul>

            </div>
            <!-- Правое поле для текста -->
            <div class="w-full md:w-3/4 bg-white rounded-md p-4 shadow-md"> <!-- Added shadow-md -->
                <h2 class="text-lg font-semibold mb-2" id="section1-title"></h2>
                <div id="section1-content" class="text-gray-700 leading-relaxed">
                    @if($catalog->products)
                        <div>
                            @foreach($catalog->products as $product)
                                <div>
                                    <a href="{{asset('storage/'. $product->picture)}}">
                                        <img src="{{asset('storage/'. $product->picture)}}" alt="{{$product->name}}">
                                        </a>
                                        <div><p>
                                                <a href="{{asset('storage/'. $product->picture)}}">{{$product->name}}</a>
                                            </p></div>
                                        <div><p>€ {{$product->price}}</p></div>

                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </main>




@endsection
