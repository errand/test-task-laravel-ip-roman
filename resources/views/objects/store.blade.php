@extends('layouts.app')

@section('title', 'Add Json object')

@section('content')
    <div class="flex flex-col items-center max-w-screen-sm mx-auto">
        @if (session('status'))
            <div role="alert">
                {{ session('status') }}
            </div>
        @endif
        <h1 class="text-gray-500 text-4xl pt-6 mb-6">{{ __('Result') }}</h1>
        @if ($object_id)
        <p>Object added with ID: {{ $object_id  }}</p>

        <p>Memory used: {{ floor(($memory_usage / 1024) / 1024) }} MB</p>
        <p>Execution time: {{ $execution_time }} s</p>
        @else
        <p>Invalid token</p>
        @endif

    </div>
@endsection
