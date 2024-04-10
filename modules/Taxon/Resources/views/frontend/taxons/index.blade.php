@extends('frontend.layouts.app')

@section('title') {{ __($module_title) }} @endsection

@section('content')

<section class="bg-gray-100 text-gray-600 py-20">
    <div class="container mx-auto flex px-5 items-center justify-center flex-col">
        <div class="text-center lg:w-2/3 w-full">
            <h1 class="text-3xl sm:text-4xl mb-4 font-medium text-gray-800">
                <i class="fa fa-fw fa-link"></i> {{ __($module_title) }}
            </h1>
            <p class="mb-8 leading-relaxed">
                The list of {{ __($module_name) }}.
            </p>

            @include('frontend.includes.messages')
        </div>
    </div>
</section>

<section class="bg-white text-gray-600 p-6 sm:p-20">
    <div class="grid grid-cols-4 sm:grid-cols-3 gap-6">
        @foreach ($$module_name as $$module_name_singular)
            @php
                $detail_url = route("frontend.$module_name.show", [encode_id($$module_name_singular->id), $$module_name_singular->slug]);
                $icon = $$module_name_singular->icon_class ? icon($$module_name_singular->icon_class) : icon("fa fa-folder-open");
            @endphp
        
            <div class="bg-white border border-gray-200 rounded-lg shadow-sharp hover:shadow-lg dark:bg-gray-800 dark:border-gray-700">
                <a class="block p-5" href="{{$detail_url}}" target="_blank">
                    <div class="flex mb-2">
                        <span class="pr-2">{!! html_entity_decode($icon) !!}</span>
                        <div class="uppercase font-semibold text-gray-900">
                            {{$$module_name_singular->name}}
                        </div>
                    </div>
                    @if($$module_name_singular->description)
                    <p class="text-sm text-gray-500 mb-3 truncate">
                        {{$$module_name_singular->description}}
                    </p>
                    @endif
                    <p class="text-xs text-gray-500">
                        @lang("Total :count subjects", ['count'=>$$module_name_singular->subjects->count()])
                    </p>
                </a>
            </div>

        @endforeach
    </div>

    <div class="d-flex justify-content-center w-100 mt-3">
        {{$$module_name->links()}}
    </div>
</section>

@endsection