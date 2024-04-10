@props(['url'=>'', 'text'=>'', 'size'=>''])
@php
    $size_class = '';
    switch ($size)
    {
        case 'small':
            $size_class = 'text-xs px-2 py-[0.32rem]';
            break;  
        case 'lg':
            $size_class = 'text-base px-3 py-1';
            break;
        default:
            $size_class = 'text-sm px-2.5 py-1';
    }
@endphp

<span class="break-words inline-flex m-1">
    @if ($url)
    <a href="{{ $url }}" class="group {{$size_class}} bg-gray-100 hover:bg-gray-200 text-gray-500 rounded dark:bg-gray-700 dark:text-gray-300 transition ease-out duration-300">
        {{ $text }}
    </a>
    @else
    <span class="group text-sm {{$size_class}} bg-gray-100 hover:bg-gray-200 text-gray-500 rounded dark:bg-gray-700 dark:text-gray-300 transition ease-out duration-300">
        {{ $text }}
    </span>
    @endif
</span>