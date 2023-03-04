@extends('layouts.app')

@section('title', 'Add Json object')

@section('content')
    <div class="flex flex-col items-center max-w-screen-sm mx-auto">
        <h1 class="text-gray-500 text-3xl pt-6 mb-6">{{ __('View JSON Object') }}</h1>

        <div id="status">

        </div>

        <div class="pt-6">
            <a href="{{route('objects.edit')}}">{{ __('Edit') }}</a> | <a href="/">Home</a>
        </div>

    </div>
@endsection
@push('scripts')
    <script>
        async function parseJsonObject() {
            const response = await fetch('/objects/{{ $object_id }}/json');
            try {
                const data = await response.json();
                const obj = await JSON.parse(data.object);
                return obj;

            } catch (e) {
                console.log(e)
            }
        }


        function createHtmlList(obj){
            let output = "";
            Object.keys(obj).forEach(function(k) {
                if (typeof obj[k] == "object" && obj[k] !== null){
                        output += "<li class='toggler'><details><summary>" + k + "</summary><ul class='ml-4'>";
                        output += createHtmlList(obj[k]);
                        output += "</ul></details></li>";
                } else {
                    output += "<li>" + k + " : " + obj[k] + "</li>";
                }
            });
            return output;
        }


        (async () => {
            const obj = await parseJsonObject();
            document.getElementById('status').innerHTML = '<ul>' + createHtmlList(obj) + '</ul>';
        })()
    </script>
@endpush
