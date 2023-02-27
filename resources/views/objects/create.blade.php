@extends('layouts.app')

@section('title', 'Add Json object')

@section('content')
    <div class="flex flex-col items-center max-w-screen-sm mx-auto">
        @if (session('status'))
            <div role="alert">
                {{ session('status') }}
            </div>
        @endif
        <h1 class="text-gray-500 font-xl pt-6 mb-6">Add JSON Object</h1>
        <form action="/objects/create" class="w-full">
            <input type="hidden" name="_method" value="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <select name="form_method" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
      focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                <option value="post" selected>POST</option>
                <option value="get">GET</option>
            </select>
            <input type="text" name="user_token" id="user_token" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
      focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                   required
                   placeholder="User active Token"/>
            <textarea class="h-32 mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
      focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
            placeholder="JSON object"></textarea>
        </form>
    </div>
@endsection
