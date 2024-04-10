@extends('frontend.layouts.app')

@section('title') {{ $$module_name_singular->name }} @endsection

@section('content')

<section class="bg-gray-100 text-gray-600 px-6 sm:px-20">
    <div class="container mx-auto flex py-4 sm:py-8">
        <div class="w-full flex flex-col items-center">
            <!--
            <h1 class="sm:text-4xl text-3xl mb-4 font-medium text-gray-800">
                {{$$module_name_singular->name}}
            </h1>
            -->

            @include('frontend.includes.messages')
        </div>
    </div>
</section>

<section class="bg-gray-100 truncate">
    <div class="container mx-auto mb-8 flex md:flex-row flex-col bg-white rounded-md">
        <div class="flex flex-row items-center sm:w-8/12 py-10 px-10">
            <div class="flex-0-0-100 mr-4">
                @php
                $favicon = getFavicon($$module_name_singular->site);
                @endphp
                <img class="w-24 h-24 rounded-lg" src="{{getFavicon($$module_name_singular->site)}}" alt="{{$$module_name_singular->name}}" />
            </div>
            <div class="flex flex-col flex-1">
                <div class="mb-2 uppercase truncate text-lg font-semibold">
                    {{$$module_name_singular->name}}
                </div>
                @if($$module_name_singular->site != "")
                <div class="mb-2 truncate text-gray-500 hover:text-orange-600">
                    <a href="{{$$module_name_singular->site}}" target="_blank">{{$$module_name_singular->site}} <i class="far fa-external-link"></i></a>
                </div>
                @endif
                @if($$module_name_singular->description != "")
                <div class="mb-2 text-sm text-gray-500">
                    {!!$$module_name_singular->description!!}
                </div>
                @endif
                <div class="mb-2">
                    <x-badge 
                        :url="route('frontend.taxons.show', [encode_id($$module_name_singular->taxon_id), $$module_name_singular->taxon->slug])" 
                        :text="$$module_name_singular->taxon_name"
                        size="small"
                    />
                </div>
            </div>
        </div>
        <div class="flex flex-row items-center sm:w-4/12 py-10 px-10">
            <div class="text-gray-600">AD</div>
        </div>
    </div>

    <div class="container mx-auto mb-8 rounded-md">
        <div class="card mb-6 py-4">
            <div class="card-header flex items-center justify-between mb-3 pb-2 border-b">
                <span class="uppercase pl-2 text-xl font-medium">@lang("Random")</span>
            </div>
            <div class="card-body grid grid-cols-1 sm:grid-cols-4 gap-6">
                @foreach ($random_data as $subject)
                @php
                $detail_url = route("frontend.subjects.show",[encode_id($subject->id), $subject->slug]);
                $target_link = setting('subject_target') == 0 ? $subject->site.'?from=costar' : $detail_url;
                $favicon = getFavicon($subject->site);
                @endphp
                <div 
                    class="bg-white rounded-lg border border-gray-200 hover:shadow-lg dark:bg-gray-800 dark:border-gray-700"
                    data-toggle="tooltip" 
                    data-coreui-placement="top" 
                    title="{{$subject->description ?? $subject->name}}"
                >
                    <div class="flex flex-col items-stretch">
                        <a class="subject-item block p-3" href="{{$target_link}}" target="_blank">
                            <div class="flex items-center">
                                <div class="flex-0-0-48">
                                    <div class="favicon">
                                        <img class="rounded-lg" src="{{$favicon}}" width="36" alt="{{$subject['name']}}" />
                                    </div>
                                </div>
                                <div class="flex-1 truncate">
                                    <h2 class="subject-name uppercase text-base font-semibold truncate">
                                        {{$subject->name}}
                                    </h2>
                                    <p class="text-gray-500 truncate">
                                        {{$subject['site']}}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
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