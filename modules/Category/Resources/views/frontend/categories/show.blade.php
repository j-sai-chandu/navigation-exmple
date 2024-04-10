@extends('frontend.layouts.app')

@section('title') {{$$module_name_singular->name}} - {{ __($module_title) }} @endsection

@section('content')

<section class="bg-gray-100 text-gray-600 py-10 sm:py-20">
    <div class="container mx-auto flex px-5 items-center justify-center flex-col">
        <div class="text-center lg:w-2/3 w-full">
            <p class="mb-8 leading-relaxed">
                <a href="{{route('frontend.'.$module_name.'.index')}}" class="outline outline-1 outline-gray-800 bg-gray-200 hover:bg-gray-100 text-gray-800 text-sm font-semibold mr-2 px-3 py-1 rounded dark:bg-gray-700 dark:text-gray-300">
                    {{ __($module_title) }}
                </a>
            </p>
            <h1 class="text-3xl sm:text-4xl mb-4 font-medium text-gray-800">
                {{$$module_name_singular->name}}
            </h1>
            <p class="mb-8 leading-relaxed">
                {{$$module_name_singular->description}}
            </p>

            @include('frontend.includes.messages')
        </div>
    </div>
</section>

<section class="bg-white text-gray-600 p-6 sm:p-20">
    <div class="grid grid-cols-1 gap-6">
        @foreach ($posts as $post)
            @php
                $detail_url = route("frontend.posts.show",[encode_id($post->id), $post->slug]);
            @endphp
            <x-frontend.content-list 
                :url="$detail_url"
                :title="$post->name" 
                :image="$post->featured_image"
            >
                <div class="flex flex-row mb-2">
                    @if(count($post->tags))
                    <div class="flex flex-row items-center text-gray-500">
                        <span class="w-5">
                            <i class="fa fa-tag"></i> 
                        </span>
                        @foreach ($post->tags as $tag)
                        <x-badge 
                            :url="route('frontend.tags.show', [encode_id($tag->id), $tag->slug])" 
                            :text="$tag->name"
                        />
                        @endforeach
                    </div>
                    @endif
                </div>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-500">
                    {{$post->intro}}
                </p>
            </x-frontend.content-list>
        @endforeach
    </div>
    <div class="d-flex justify-content-center w-100 mt-4">
        {{$posts->links()}}
    </div>
</section>

@endsection