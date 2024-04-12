<!-- Menu & User Dropdown -->
<script>
    $(document).ready(function(){
        const { NextPopover } = window;
        const { PlacementType, EmitType } = NextPopover;
        
        const localeMenuBtn = document.getElementById("locale-menu-button");
        const localeMenuBox = document.getElementById("locale-menu-box") 
            ? document.getElementById("locale-menu-box").cloneNode(true) 
            : null;
        if(localeMenuBox) {
            localeMenuBox.classList.remove("hidden");
            new NextPopover.default({
                trigger: localeMenuBtn, // required
                content: localeMenuBox, // required
                placement: PlacementType.Bottom, // placement: "bottom",
                emit: EmitType.Click, // emit: "click",
                onBeforeEnter: function(that) {
                    console.log('onBeforeEnter', that);
                },
                onOpen: function() {
                    console.log('onOpen');
                }
            });
        }
        
        const userMenuBtn = document.getElementById("user-menu-button");
        const userMenuBox = document.getElementById("user-menu-box") 
            ? document.getElementById("user-menu-box").cloneNode(true) 
            : null;
        if(userMenuBox) {
            userMenuBox.classList.remove("hidden");
            new NextPopover.default({
                trigger: userMenuBtn, // required
                content: userMenuBox, // required
                placement: PlacementType.Bottom, // placement: "bottom",
                emit: EmitType.Click, // emit: "click",
            });
        }
    });
    
</script>

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