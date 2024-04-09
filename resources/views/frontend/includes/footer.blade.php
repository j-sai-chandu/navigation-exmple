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
        <button class="scroll-to-top rounded-lg hover:bg-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20" height="20" fill="#f0f0f0">
                <path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM377 271L273 167c-9.4-9.4-24.6-9.4-33.9 0L135 271c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l87-87 87 87c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9z"/>
            </svg>
        </button>
    </div>
</footer>

<!-- StickySidebar -->
<script>
    $(document).ready(function(){
        //////////////////////
    	// StickySidebar
    	//////////////////////
    	
        const sidebar = document.querySelector('.sticky_sidebar');
        const content = document.querySelector('.sticky_content');
        const sidebar_inner = document.querySelector('.sticky_sidebar_inner');

        if(StickySidebar && sidebar && content && sidebar_inner) {
            new StickySidebar(".sticky_sidebar", {
                containerSelector: ".sticky_content",
                innerWrapperSelector: ".sticky_sidebar_inner",
                topSpacing: 20,
                bottomSpacing: 20,
            });
        }
    });
</script>

<!-- ScrollNavigation -->
<script>
    $(document).ready(function(){
        //////////////////////
    	// ScrollNavigation init
    	//////////////////////
    
    	let navigationContainer = document.querySelector('.quick-navigation'),
    		navLinks = navigationContainer ? navigationContainer.querySelectorAll('.quick-navigation-link') : null,
    		sections = document.querySelectorAll('.scroll-section'),
    		progressIndicator = document.querySelector('.scroll-progress-indicator'),
    		scrollToTopBtn = document.querySelector('.scroll-to-top');
        
        if(ScrollNavigation) {
            ScrollNavigation.init({
                navigationContainer,
                navLinks,
                sections,
                scrollToTopBtn,
        
                // Customize onScroll behavior
                onScroll: function () {
                    const percentage = ScrollNavigation.getScrollPercentage();
                    if (percentage >= 10) {
                        if(scrollToTopBtn) {
                            scrollToTopBtn.classList.add('visible');
                        }
                        if(progressIndicator) {
                            progressIndicator.innerHTML = percentage + "%";
                            progressIndicator.classList.add('visible');
                        }
                    } else {
                        if(scrollToTopBtn) {
                            scrollToTopBtn.classList.remove('visible');
                        }
                        if(progressIndicator) {
                            progressIndicator.classList.remove('visible');
                        }
                    }
                },
        
                // Behavior when a section changes
                // onSectionChange: function (section) {},
        
                //smoothScrollAnimation: function (target) {
                //    TweenLite.to(window, 2, {scrollTo:{y:target}, ease:Power2.easeOut});
                //}
        
            });
        }
        
    });
</script>