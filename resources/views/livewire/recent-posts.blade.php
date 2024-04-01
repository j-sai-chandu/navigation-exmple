<div class="container w-full mx-auto flex flex-col items-center justify-center border border-gray-200 rounded-md shadow hover:shadow-lg">
    <div class="w-full px-6 py-4 border-b border-gray-100">
        <h3 class="text-lg leading-6 font-medium text-gray-800">
            @lang('Recent Posts')
        </h3>
        <p class="max-w-2xl text-sm text-gray-500 mb-0">
            {{__('Recently published posts')}}
        </p>
    </div>
    <ul class="w-full py-3">
        @foreach ($recentPosts as $row)
        @php
        $detail_url = route("frontend.posts.show",[encode_id($row->id), $row->slug]);
        @endphp
        <li class="flex items-center flex-row flex-1 transition duration-500 ease-in-out transform hover:-translate-y-1 px-6 py-3">
            <a class="flex w-full" href="{{$detail_url}}">
                <div class="flex-0-0-48 justify-center items-center mr-4">
                    @if($row->featured_image != "")  
                        <img alt="{{ $row->name }}" src="{{$row->featured_image}}" class="mx-auto object-cover rounded h-10 " />
                    @else
                    <x-image-placeholder width='48' height='40' text="Costar" fontSize="14px" class="transform hover:scale-110 duration-300" />
                    @endif
                </div>
                <div class="flex-1">
                    <div class="font-medium">
                        {{ $row->name }}
                    </div>
                    <div class="text-gray-600 text-sm">
                        {{ $row->category_name }}
                    </div>
                </div>
            </a>
        </li>
        @endforeach
    </ul>
</div>
