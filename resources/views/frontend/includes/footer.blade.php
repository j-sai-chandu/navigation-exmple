<footer class="text-center bg-gray-100">
    <div class="max-w-screen-xl px-4 py-8 mx-auto sm:px-6 lg:px-8">
        <div class="mx-auto space-y-6">
            <nav class="relative flex flex-wrap justify-center gap-8 p-4 text-sm font-bold">
                <a href="{{ route('frontend.categories.index') }}" class="text-gray-600 border-transparent border-b-2 hover:border-orange-600 px-3 py-2 text-base font-medium transition ease-out duration-300">
                    {{__('Categories')}}
                </a>
                <a href="{{ route('frontend.tags.index') }}" class="text-gray-600 border-transparent border-b-2 hover:border-orange-600 px-3 py-2 text-base font-medium transition ease-out duration-300">
                    {{__('Tags')}}
                </a>
                <a href="{{ route('frontend.taxons.index') }}" class="text-gray-600 border-transparent border-b-2 hover:border-orange-600 px-3 py-2 text-base font-medium transition ease-out duration-300">
                    {{__('Taxons')}}
                </a>
            </nav>
            <p class="text-xs font-medium">
                &copy; {{ app_name() }}, {!! setting('footer_text') !!}
            </p>
        </div>
    </div>
    <div class="relative">
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

        if(sidebar && content && sidebar_inner) {
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
    		links = navigationContainer ? navigationContainer.querySelectorAll('.quick-navigation-link') : null,
    		sections = document.querySelectorAll('.scroll-section'),
    		progressIndicator = document.querySelector('.scroll-progress-indicator'),
    		scrollToTopBtn = document.querySelector('.scroll-to-top');
    
        if(navigationContainer) {
            ScrollNavigation.init({
                navigationContainer: navigationContainer,
                links: links,
                sections: sections,
                scrollToTopBtn: scrollToTopBtn,
        
                // Customize onScroll behavior
                onScroll: function () {
                    const percentage = ScrollManager.getScrollPercentage();
                    if (percentage >= 10) {
                        scrollToTopBtn.classList.add('visible');
                        progressIndicator.innerHTML = percentage + "%";
                        progressIndicator.classList.add('visible');
                    } else {
                        scrollToTopBtn.classList.remove('visible');
                        progressIndicator.classList.remove('visible');
                    }
                },
        
                // Behavior when a section changes
                // default : highlight links 
        
                // onSectionChange: function (section) {},
        
                //smoothScrollAnimation: function (target) {
                //    TweenLite.to(window, 2, {scrollTo:{y:target}, ease:Power2.easeOut});
                //}
        
            });
        }
    });
</script>