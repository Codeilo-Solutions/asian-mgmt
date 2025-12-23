  //  mobile navbar=========================

    const menuBtn = document.getElementById("menu-btn");
  const mobileMenu = document.getElementById("mobile-menu");
  const overlay = document.getElementById("menu-overlay"); // optional overlay

  // Function to close menu
  function closeMenu() {
    mobileMenu.classList.add("hidden");
    mobileMenu.classList.remove("block");
    if (overlay) overlay.classList.add("hidden");
  }

  // Toggle menu on button click
  menuBtn.addEventListener("click", (e) => {
    e.stopPropagation(); // prevent click from triggering window click
    mobileMenu.classList.toggle("hidden");
    mobileMenu.classList.toggle("block");
    if (overlay) overlay.classList.toggle("hidden");
  });

  // Auto-close on scroll
  window.addEventListener("scroll", closeMenu);

  // Auto-close on click outside
  window.addEventListener("click", (e) => {
    if (!mobileMenu.contains(e.target) && e.target !== menuBtn) {
      closeMenu();
    }
  });

// mobile navbar end =========================

  // home menu=======================
      // Select the checkbox input and the menu container
    const menuCheckbox = document.querySelector('input[type="checkbox"]');

    // Listen for scroll events
    window.addEventListener('scroll', () => {
      if (menuCheckbox.checked) {
        menuCheckbox.checked = false; // Uncheck the checkbox
        // Optional: remove "close" class from bars if you toggle it
        const bars = document.querySelector('.bars');
        if (bars.classList.contains('close')) {
          bars.classList.remove('close');
        }
      }
    });;

    // Your existing bars toggle function
    function barsClose() {
      document.querySelector('.bars').classList.toggle('close');
    }


    function barsClose() {
  document.querySelector(".bars").classList.toggle("close");
}

    function barClose() {
      // document.querySelector('.bars').classList=toggle('close')

      document.querySelector('.bars').classList.toggle('close')
    }

      // home menu end=======================
    
    //counting section //

document.addEventListener("DOMContentLoaded", () => {
  const counters = document.querySelectorAll(".grid p.font-bold");

  const formatNumber = (value, suffix) => {
    if (!suffix) return value;
    return value + suffix;
  };

  const animateCount = (el) => {
    let text = el.innerText.trim();
    let match = text.match(/^(\d+)([A-Za-z]*)/); 
    let num = match ? parseInt(match[1]) : parseInt(text);
    let suffix = match ? match[2] : "";
    let duration = 2000;
    let startTime = null;

    const step = (timestamp) => {
      if (!startTime) startTime = timestamp;
      let progress = Math.min((timestamp - startTime) / duration, 1);
      let current = Math.floor(progress * num);

      el.childNodes[0].nodeValue = formatNumber(current, suffix);

      if (progress < 1) {
        requestAnimationFrame(step);
      }
    };

    requestAnimationFrame(step);
  };

  const observer = new IntersectionObserver(
    (entries) => {
      if (entries[0].isIntersecting) {
        counters.forEach((el) => animateCount(el));
      }
    },
    { threshold: 0.4 } 
  );

  observer.observe(document.querySelector(".grid"));
});


    const header = document.querySelector("[data-header]");
    const backTopBtn = document.querySelector("[data-back-top-btn]");

    let lastScrollPos = 0;

    const hideHeader = function () {
      const isScrollDown = lastScrollPos < window.scrollY;

      if (isScrollDown) {
        header.classList.add("hide");
      } else {
        header.classList.remove("hide");
      }

      lastScrollPos = window.scrollY;
    }

    window.addEventListener("scroll", function () {
      if (window.scrollY >= 50) {
        header.classList.add("active");       // sticky
        backTopBtn.classList.add("active");
        hideHeader();                         // hide on scroll down
      } else {
        header.classList.remove("active");
        header.classList.remove("hide");
        backTopBtn.classList.remove("active");
      }
    });

  