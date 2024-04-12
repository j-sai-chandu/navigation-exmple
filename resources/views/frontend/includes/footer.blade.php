@php
$route_path = Request::route()->getName();
@endphp

<footer class="text-center bg-gray-200">
    <div class="max-w-screen-xl px-4 py-8 mx-auto sm:px-6 lg:px-8">
        <div class="mx-auto space-y-6">
            <nav class="relative flex flex-wrap justify-center gap-8 p-4 text-sm font-bold">
                <a href="{{ route('frontend.categories.index') }}" class="{{ $route_path == 'frontend.categories.index' ? 'active border-orange-600' : 'border-transparent'}} text-gray-600 border-b-2 hover:border-orange-600 px-3 py-2 text-base font-medium transition ease-out duration-300">
                    @lang('Categories')
                </a>
                <a href="{{ route('frontend.tags.index') }}" class="{{ $route_path == 'frontend.tags.index' ? 'active border-orange-600' : 'border-transparent'}} text-gray-600 border-b-2 hover:border-orange-600 px-3 py-2 text-base font-medium transition ease-out duration-300">
                    @lang('Tags')
                </a>
                <a href="{{ route('frontend.taxons.index') }}" class="{{ $route_path == 'frontend.taxons.index' ? 'active border-orange-600' : 'border-transparent'}} text-gray-600 border-b-2 hover:border-orange-600 px-3 py-2 text-base font-medium transition ease-out duration-300">
                    @lang('Taxons')
                </a>
            </nav>
            <p class="text-xs font-medium">
                &copy; {{ app_name() }}, {!! setting('footer_text') !!}
            </p>
        </div>
    </div>
    <div class="relative">
        <div class="scroll-progress-indicator text-xs text-gray-500 rounded-lg visible">0%</div>
        <button type="button" class="scroll-to-top w-10 rounded-lg hover:bg-gray-300">
            <i class="fal fa-chevron-circle-up"></i>
        </button>
    </div>
</footer>