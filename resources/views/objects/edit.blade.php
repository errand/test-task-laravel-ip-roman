@extends('layouts.app')

@section('title', 'Add Json object')

@section('content')
    <div class="flex flex-col items-center max-w-screen-sm mx-auto">
        <div id="status">

        </div>
        <h1 class="text-gray-500 text-3xl pt-6 mb-6">{{ __('Add JSON Object') }}</h1>

        <form id="object_form" action="" class="w-full" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <select id="form_method" name="form_method" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
      focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                <option value="POST" selected>POST</option>
                <option value="POST">GET</option>
            </select>
            <input type="text" name="user_token" id="user_token" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
      focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                   required
                   placeholder="{{ __('User active token') }}" />
            <input type="number" name="object_id" id="object_id" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
      focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                   required
                   placeholder="{{ __('Object ID') }}" />
            <textarea id="data" name="data" class="h-32 mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
      focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                      placeholder="$data->list->sublist[0] = 0;
$data->list->sublist[1] = 2;
"
                      required></textarea>
            <button>{{ __('Send') }}</button>
        </form>
    </div>
@endsection
@push('scripts')
    <script src="{{ Vite::asset('resources/js/method_select.js') }}"></script>
@endpush
