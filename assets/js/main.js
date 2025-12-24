
// Register ScrollTrigger plugin
gsap.registerPlugin(ScrollTrigger);

document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.getElementById('navbar');
    const menuToggle = document.getElementById('menu-toggle');
    const menuClose = document.getElementById('menu-close');
    const mobileMenu = document.getElementById('mobile-menu');
    const burgerLines = document.querySelectorAll('.burger-line');
    const mobileMenuItems = document.querySelectorAll('.mobile-menu-item');
    const contactOverlay = document.getElementById('contact-overlay');
    const overlayClose = document.getElementById('overlay-close');
    const overlayBackdrop = document.getElementById('overlay-backdrop');

    // 1. Navbar Scroll Effect
    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            navbar.classList.add('shadow-md');
        } else {
            navbar.classList.remove('shadow-md');
        }
    });

    // 2. Mobile Menu Toggle with Animations
    const openMobileMenu = () => {
        mobileMenu.classList.add('active');
        
        // Hide navbar only on small devices (below lg breakpoint: 1024px)
        if (window.innerWidth < 1024) {
            navbar.style.opacity = '0';
            navbar.style.pointerEvents = 'none';
        }
        
        // Burger Animation
        burgerLines[0].classList.toggle('burger-active-1');
        burgerLines[1].classList.toggle('burger-active-2');
        burgerLines[2].classList.toggle('burger-active-3');
        
        // Staggered menu items animation
        gsap.fromTo(mobileMenuItems, 
            { opacity: 0, x: -50 },
            { 
                opacity: 1, 
                x: 0, 
                duration: 0.5, 
                stagger: 0.1,
                ease: 'power3.out',
                delay: 0.2
            }
        );
    };

    const closeMobileMenu = () => {
        mobileMenu.classList.remove('active');
        
        // Show navbar only on small devices
        if (window.innerWidth < 1024) {
            navbar.style.opacity = '1';
            navbar.style.pointerEvents = 'auto';
        }
        
        // Burger Animation Reset
        burgerLines[0].classList.remove('burger-active-1');
        burgerLines[1].classList.remove('burger-active-2');
        burgerLines[2].classList.remove('burger-active-3');
    };

    menuToggle.addEventListener('click', () => {
        // Check if screen is desktop/laptop (>= 1024px)
        if (window.innerWidth >= 1024) {
            // Toggle contact overlay on desktop
            contactOverlay.classList.toggle('active');
            overlayBackdrop.classList.toggle('active');
            
            // Toggle burger animation
            burgerLines[0].classList.toggle('burger-active-1');
            burgerLines[1].classList.toggle('burger-active-2');
            burgerLines[2].classList.toggle('burger-active-3');
        } else {
            // Toggle mobile menu on mobile/tablet
            if (mobileMenu.classList.contains('active')) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
        }
    });

    // Close button handler
    if (menuClose) {
        menuClose.addEventListener('click', closeMobileMenu);
    }

    // Contact Overlay Close Handlers
    const closeContactOverlay = () => {
        contactOverlay.classList.remove('active');
        overlayBackdrop.classList.remove('active');
        
        // Reset burger animation
        burgerLines[0].classList.remove('burger-active-1');
        burgerLines[1].classList.remove('burger-active-2');
        burgerLines[2].classList.remove('burger-active-3');
    };

    if (overlayClose) {
        overlayClose.addEventListener('click', closeContactOverlay);
    }

    if (overlayBackdrop) {
        overlayBackdrop.addEventListener('click', closeContactOverlay);
    }

    // Mobile Dropdown Toggle
    const mobileDropdownToggles = document.querySelectorAll('.mobile-dropdown-toggle');
    mobileDropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            const content = toggle.nextElementSibling;
            const isActive = toggle.classList.contains('active');
            
            // Close all other dropdowns
            mobileDropdownToggles.forEach(otherToggle => {
                if (otherToggle !== toggle) {
                    otherToggle.classList.remove('active');
                    otherToggle.nextElementSibling.classList.remove('active');
                }
            });
            
            // Toggle current dropdown
            toggle.classList.toggle('active');
            content.classList.toggle('active');
        });
    });

    // Close menu when clicking on a link (but not dropdown toggles)
    mobileMenuItems.forEach(item => {
        // Skip if it's a dropdown toggle button
        if (!item.classList.contains('mobile-dropdown-toggle')) {
            item.addEventListener('click', () => {
                closeMobileMenu();
            });
        }
    });

    // 3. GSAP Hero Animation
    const heroTl = gsap.timeline();
    heroTl.from('#hero-bg', { 
        duration: 1.8, 
        scale: 1.3, 
        filter: 'brightness(0)', 
        ease: 'power2.out' 
    })
    .from('#hero-tag', { 
        duration: 1, 
        opacity: 0, 
        y: 30, 
        ease: 'power3.out' 
    }, "-=0.8")
    .from('#hero-title', { 
        duration: 1.2, 
        opacity: 0, 
        y: 40, 
        ease: 'power3.out' 
    }, "-=0.8")
    .from('#hero-btn', { 
        duration: 1, 
        opacity: 0, 
        y: 30, 
        ease: 'power3.out' 
    }, "-=0.8");

    // 4. Reveal Animations on Scroll
    const reveals = document.querySelectorAll('.reveal');
    reveals.forEach((el) => {
        gsap.to(el, {
            scrollTrigger: {
                trigger: el,
                start: "top 85%",
                toggleActions: "play none none none"
            },
            opacity: 1,
            y: 0,
            duration: 1.2,
            ease: "power3.out"
        });
    });

    // 5. Stats Counter Animation
    const counters = document.querySelectorAll('.count');
    counters.forEach((counter) => {
        const target = parseInt(counter.innerText);
        gsap.fromTo(counter, 
            { innerText: 0 }, 
            { 
                innerText: target, 
                duration: 2.5, 
                scrollTrigger: {
                    trigger: counter,
                    start: "top 85%",
                },
                snap: { innerText: 1 },
                ease: "power1.inOut",
                onUpdate: function() {
                    counter.innerText = Math.ceil(counter.innerText);
                }
            }
        );
    });

    // 6. Team Carousel
    const teamCarousel = document.getElementById('team-carousel');
    const teamPrev = document.getElementById('team-prev');
    const teamNext = document.getElementById('team-next');
    
    if (teamCarousel && teamPrev && teamNext) {
        let currentIndex = 0;
        const teamMembers = teamCarousel.querySelectorAll('.group');
        const totalMembers = teamMembers.length;
        
        // Function to get visible items based on screen size
        function getVisibleItems() {
            if (window.innerWidth >= 1024) return 4; // lg breakpoint
            if (window.innerWidth >= 640) return 2;  // sm breakpoint
            return 1; // mobile
        }
        
        function updateCarousel() {
            const visibleItems = getVisibleItems();
            const maxIndex = Math.max(0, totalMembers - visibleItems);
            
            // Ensure currentIndex is within bounds
            currentIndex = Math.max(0, Math.min(currentIndex, maxIndex));
            
            // Calculate translateX percentage
            const translateX = -(currentIndex * (100 / visibleItems));
            
            gsap.to(teamCarousel, {
                x: `${translateX}%`,
                duration: 0.6,
                ease: "power2.out"
            });
            
            // Update button states
            teamPrev.disabled = currentIndex === 0;
            teamNext.disabled = currentIndex >= maxIndex;
            
            // Update button styles
            if (currentIndex === 0) {
                teamPrev.classList.add('opacity-50', 'cursor-not-allowed');
            } else {
                teamPrev.classList.remove('opacity-50', 'cursor-not-allowed');
            }
            
            if (currentIndex >= maxIndex) {
                teamNext.classList.add('opacity-50', 'cursor-not-allowed');
            } else {
                teamNext.classList.remove('opacity-50', 'cursor-not-allowed');
            }
        }
        
        teamNext.addEventListener('click', () => {
            const visibleItems = getVisibleItems();
            const maxIndex = totalMembers - visibleItems;
            if (currentIndex < maxIndex) {
                currentIndex++;
                updateCarousel();
            }
        });
        
        teamPrev.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                updateCarousel();
            }
        });
        
        // Reset carousel on window resize
        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                currentIndex = 0;
                updateCarousel();
            }, 250);
        });
        
        // Initial setup
        updateCarousel();
    }

    // Career Form File Upload Handler
    const resumeInput = document.getElementById('resume');
    const fileNameDisplay = document.getElementById('file-name');
    
    if (resumeInput && fileNameDisplay) {
        resumeInput.addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name || 'Choose File No file chosen';
            fileNameDisplay.textContent = fileName;
            
            if (e.target.files[0]) {
                fileNameDisplay.classList.remove('text-gray-500');
                fileNameDisplay.classList.add('text-gray-900');
            } else {
                fileNameDisplay.classList.remove('text-gray-900');
                fileNameDisplay.classList.add('text-gray-500');
            }
        });
    }

    // Career Form Submission Handler
    const careerForm = document.getElementById('career-form');
    
    if (careerForm) {
        careerForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form values
            const formData = new FormData(careerForm);
            
            // Show success message
            alert('Thank you for your application! We will review your submission and get back to you soon.');
            
            // Reset form
            careerForm.reset();
            fileNameDisplay.textContent = 'Choose File No file chosen';
            fileNameDisplay.classList.remove('text-gray-900');
            fileNameDisplay.classList.add('text-gray-500');
        });
    }
});