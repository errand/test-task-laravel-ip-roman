@extends('layouts.app')

@section('title', 'All Json Objects')

@section('content')
    <div class="flex flex-col items-center">
        @if (session('status'))
            <div role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if (count($objects))
            @foreach($objects as $object)
                {{ $object->data  }}
            @endforeach
        @else
            No object found
        @endif
    </div>
@endsection
