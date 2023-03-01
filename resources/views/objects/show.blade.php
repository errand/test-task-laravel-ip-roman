@extends('layouts.app')

@section('title', 'Add Json object')

@section('content')
    <div class="flex flex-col items-center max-w-screen-sm mx-auto">
        <div id="status">

        </div>
        <h1 class="text-gray-500 font-xl pt-6 mb-6">{{ __('Add JSON Object') }}</h1>

    </div>
@endsection
@push('scripts')
    <script>
        async function parseJsonObject() {
            const response = await fetch('/objects/{{ $object_id }}/json');
            try {
                const data = await response.json();
                const obj = await JSON.parse(data.object);
                return obj.data;

            } catch (e) {
                console.log(e)
            }
        }


        function createHtmlList(obj){
            let output = "";
            Object.keys(obj).forEach(function(k) {
                if (typeof obj[k] == "object" && obj[k] !== null){
                        output += "<li>" + k + "<ul>";
                        output += createHtmlList(obj[k]);
                        output += "</ul></li>";
                } else {
                    output += "<li>" + k + " : " + obj[k] + "</li>";
                }
            });

            console.log(output)
            return output;
        }


        (async () => {
            const obj = await parseJsonObject();
            document.getElementById('status').innerHTML = '<ul>' + createHtmlList(obj) + '</ul>';
        })()
    </script>
@endpush
