@extends('layouts.app')

@section('title', 'All Json Objects')

@section('content')
    <div class="flex flex-col items-center">
        @if (session('status'))
            <div role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if (count($objects) > 0)
            <table class="border-separate border-spacing-2 border border-slate-500">
                <tr>
                    <th class="border">ID</th>
                    <th class="border">Created at</th>
                    <th class="border">Actions</th>
                </tr>
            @foreach($objects as $object)
                <tr>
                    <td class="border">{{ $object->id  }}</td>
                    <td class="border">{{ $object->created_at  }}</td>
                    <td class="border"><a href="{{route('objects.edit', $object->id)}}">Edit</a></td>
                </tr>
            @endforeach
            </table>
        @else
            No object found
        @endif
    </div>
@endsection
