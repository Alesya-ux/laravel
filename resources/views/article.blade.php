@extends('layouts.tall')
@section('content')
        <div class="content p-6 mt-2">
            <h2 class="text-3xl font-semibold">{{$maintext->name}}</h2>
            {!! $maintext->body !!}
        </div>
@endsection
