@props(['title', 'desc', 'more_url'])

<div class="card w-full mx-auto flex flex-col items-center justify-center border border-gray-200 rounded-md hover:shadow-lg">
    <div class="card-header w-full relative px-6 py-4 border-b border-gray-100">
        <h3 class="text-lg leading-6 font-medium text-gray-800">
            @lang($title)
        </h3>
        <p class="max-w-2xl text-sm text-gray-500 mb-0">
            @lang($desc)
        </p>
        @if ($more_url)
        <span class="flex items-center h-full absolute right-0 top-0 bottom-0 px-3">
            <a href="{$more_url}" target="_blank">@lang("More")</a>
        </span>
        @endif
    </div>
    <div class="card-body w-full py-3">
        {!! $slot !!}
    </div>
    <div class="card-footer"></div>
</div>