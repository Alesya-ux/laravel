@extends('layouts.tall')
@section('content')




        <div class="content p-6 bg-white rounded-xl shadow-xl mt-6">
            <h2 class=text-3xl font-bold text-base-200>{{$maintext->name}}</h2>


            {!! $maintext->body !!}
        </div>


    </div>

@endsection
