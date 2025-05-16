@extends('layouts.tall')
@section('content')

<body>
<section class="rounded-lg bg-neutral-50 shadow-lg p-4 max-w-[95%] mx-auto mt-10">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Вы вошли в систему!") }}
                </div>
            </div>
        </div>
    </div>
</section>

<section class="rounded-lg bg-neutral-50 shadow-lg p-4 max-w-[95%] mx-auto mt-10"><!--   История заказов и возможность продублировать-->
</section>

</body>

@endsection
