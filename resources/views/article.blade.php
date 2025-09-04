@extends('layouts.tall')
@section('content')
        <div class = "p-6 ">
            <h2 class="text-3xl font-semibold">{{$maintext->name}}</h2>
            {!! $maintext->body !!}
        </div>
@endsection
