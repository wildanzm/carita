const btn = document.getElementById("menu-btn");
const menu = document.getElementById("mobile-menu");

btn.addEventListener("click", () => {
    btn.classList.toggle("open");
    menu.classList.toggle("open");
});

// Scroll Animation Observer
const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -100px 0px",
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add("appear");
        }
    });
}, observerOptions);

// Function to initialize animations
function initializeAnimations() {
    const animatedElements = document.querySelectorAll(
        ".fade-in-up, .fade-in, .slide-in-left, .slide-in-right, .scale-in"
    );
    animatedElements.forEach((el) => observer.observe(el));

    // Initial animation for hero section
    setTimeout(() => {
        document.querySelectorAll(".fade-in-up, .scale-in").forEach((el) => {
            if (el.getBoundingClientRect().top < window.innerHeight) {
                el.classList.add("appear");
            }
        });
    }, 100);
}

// Initialize on DOM load
document.addEventListener("DOMContentLoaded", initializeAnimations);

// Re-initialize on Livewire navigation
document.addEventListener("livewire:navigated", initializeAnimations);
