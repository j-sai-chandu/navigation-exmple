@extends('frontend.layouts.app')

@section('title') {{$$module_name_singular->name}} @endsection

@section('content')

<section class="bg-gray-100 text-gray-600 body-font px-6 sm:px-20">
    <div class="container mx-auto flex py-8 sm:py-16 md:flex-row flex-col items-center">
        <div class="w-full flex flex-col items-center">
            <p class="mb-8 leading-relaxed">
                <a href="{{route('frontend.'.$module_name.'.index')}}" class="outline outline-1 outline-gray-800 bg-gray-200 hover:bg-gray-100 text-gray-800 text-sm font-semibold mr-2 px-3 py-1 rounded dark:bg-gray-700 dark:text-gray-300">
                    {{ __($module_title) }}
                </a>
            </p>

            <h1 class="sm:text-4xl text-3xl mb-4 font-medium text-gray-800">
                {{$$module_name_singular->name}}
            </h1>

            @if($$module_name_singular->site != "")
            <p class="mb-8 leading-relaxed">
                <a href="{{$$module_name_singular->site}}" target="_blank">{{$$module_name_singular->site}}</a>
            </p>
            @endif

            @include('frontend.includes.messages')
        </div>
    </div>
</section>

<section class="py-6 sm:py-10 px-6 sm:px-20">
    <div class="container mx-auto flex md:flex-row flex-col">
        <div class="w-full flex flex-col">
            <div class="py-5 border-b">
                {!!$$module_name_singular->description!!}
            </div>

            <div class="py-5 border-b">
                <div class="flex flex-col sm:flex-row justify-between">
                    <div class="pb-2">
                        @lang('Written by'): {{$$module_name_singular->created_by_name}}
                    </div>
                    <div class="pb-2">
                        @lang('Created at'): {{$$module_name_singular->created_at->isoFormat('llll')}}
                    </div>
                </div>
            </div>

            <div class="flex flex-row items-center py-5 border-b">
                <span class="font-weight-bold">
                    @lang('Taxons'):
                </span>
                <x-frontend.badge :url="route('frontend.taxons.show', [encode_id($$module_name_singular->taxon_id), $$module_name_singular->taxon->slug])" :text="$$module_name_singular->taxon_name" />
            </div>
        </div>
    </div>
</section>

@endsection

@push ("after-style")

@endpush

@push ("after-scripts")
<script type="module" src="{{ asset('vendor/sharer/sharer@0.5.1.min.js') }}"></script>
@endpush