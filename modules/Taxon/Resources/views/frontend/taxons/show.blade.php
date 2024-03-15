@extends('frontend.layouts.app')

@section('title') {{$$module_name_singular->name}} - {{ __($module_title) }} @endsection

@section('content')

<section class="bg-gray-100 text-gray-600 py-10 sm:py-20">
    <div class="container mx-auto flex px-5 items-center justify-center flex-col">
        <div class="text-center lg:w-2/3 w-full">
            <h1 class="text-3xl sm:text-4xl mb-4 font-medium text-gray-800">
                {{$$module_name_singular->name}}
            </h1>
            <p class="flex-1 h-full mb-3 font-normal text-gray-700 dark:text-gray-400">
                <a href="{{$$module_name_singular->site}}" target="_blank">
                    {{$$module_name_singular->site}}
                </a>
            </p>
            <p class="mb-8 leading-relaxed">
                {{$$module_name_singular->description}}
            </p>
            @include('frontend.includes.messages')
        </div>
    </div>
</section>

<section class="bg-white text-gray-600 p-6 sm:p-20">
    <div class="grid grid-cols-1 sm:grid-cols-4 gap-6">
        @foreach ($subjects as $subject)
        @php
        $detail_url = route("frontend.subjects.show",[encode_id($subject->id), $subject->slug]);
        @endphp
        <div 
            class="bg-white rounded-lg border border-gray-200 shadow hover:shadow-lg dark:bg-gray-800 dark:border-gray-700"
            data-toggle="tooltip" 
            data-coreui-placement="top" 
            title="{{$subject->description ?? $subject->name}}"
        >
            <div class="p-5 flex flex-col items-stretch">
                <a href="{{$detail_url}}" target="_blank">
                    <h2 class="uppercase text-2xl text-gray-900 dark:text-white mb-2 truncate">
                        {{$subject->name}}
                    </h2>
                </a>
                <p class="flex-1 h-full relative mb-3 font-normal text-gray-700 dark:text-gray-400">
                    <i class="fa fa-fw fa-link absolute left-0 top-1 text-gray-500"></i>
                    <a class="ml-8 block truncate" href="{{$subject->site}}" target="_blank">
                        {{$subject->site}}
                    </a>
                </p>
                <p class="flex-1 h-full mb-3 text-sm text-gray-400 dark:text-gray-400 truncate">
                    {{$subject->description}}
                </p>

                <!-- <div class="text-end">
                    <a href="{{$detail_url}}" class="inline-flex items-center text-sm text-gray-700 hover:text-gray-100 bg-gray-200 hover:bg-gray-700 py-2 px-3 rounded">
                        @lang('Read more')
                        <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div> -->
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center w-100 mt-4">
        {{$subjects->links()}}
    </div>
</section>

@endsection