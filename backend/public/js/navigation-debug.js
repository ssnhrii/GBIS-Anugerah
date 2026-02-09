// Navigation Debug Script
(function () {
  "use strict";

  // Log all navigation events
  console.log("Navigation Debug: Script loaded");

  // Monitor all link clicks
  document.addEventListener("click", function (e) {
    const target = e.target.closest("a");
    if (target && target.href) {
      console.log("Link clicked:", target.href);
      console.log("Current page:", window.location.href);
    }
  });

  // Monitor history changes
  window.addEventListener("popstate", function (e) {
    console.log("Browser back/forward button pressed");
    console.log("State:", e.state);
    console.log("Current URL:", window.location.href);
  });

  // Monitor page load
  window.addEventListener("load", function () {
    console.log("Page loaded:", window.location.href);
  });

  // Prevent accidental double clicks on buttons
  let lastClickTime = 0;
  document.addEventListener(
    "click",
    function (e) {
      const target = e.target.closest("a.btn, button");
      if (target) {
        const now = Date.now();
        if (now - lastClickTime < 500) {
          console.log("Double click prevented");
          e.preventDefault();
          e.stopPropagation();
          return false;
        }
        lastClickTime = now;
      }
    },
    true,
  );
})();
