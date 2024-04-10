@extends('frontend.layouts.app')

@section('title') {{ __($module_title) }} @endsection

@section('content')

<section class="bg-gray-100 py-20">
    <div class="container mx-auto flex px-5 items-center justify-center flex-col">
        <div class="text-center lg:w-2/3 w-full">
            <h1 class="text-3xl sm:text-4xl mb-4 font-medium text-gray-800">
                {{ __($module_title) }}
            </h1>
            <p class="mb-8 leading-relaxed">
                The list of {{ __($module_name) }}.
            </p>

            @include('frontend.includes.messages')
        </div>
    </div>
</section>

<section class="bg-white p-6 sm:p-20">
    <div class="grid grid-cols-4 sm:grid-cols-3 gap-6">
        @foreach ($$module_name as $$module_name_singular)
            @php
                $detail_url = route("frontend.$module_name.show",[encode_id($$module_name_singular->id), $$module_name_singular->slug]);
            @endphp
            <a class="block" href="{{$detail_url}}">    
                <div class="bg-white p-5 border border-gray-200 rounded-lg shadow-sharp hover:shadow-lg dark:bg-gray-800 dark:border-gray-700">
                    <div class="uppercase text-lg sm:text-xl font-semibold text-gray-900 mb-2">
                        {{$$module_name_singular->name}}
                    </div>
                    @if($$module_name_singular->description)
                    <p class="font-normal text-gray-500 mb-3 truncate">
                        {{$$module_name_singular->description}}
                    </p>
                    @endif
                    <p class="text-sm text-gray-500">
                        @lang("Total :count posts", ['count'=>$$module_name_singular->posts->count()])
                    </p>
                </div>
            </a>
        @endforeach
    </div>
    <div class="d-flex justify-content-center w-100 mt-3">
        {{$$module_name->links()}}
    </div>
</section>

@endsection