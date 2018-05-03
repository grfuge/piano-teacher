(function () {
  const slideWrapper = document.querySelector(".home-reviews--container--window--wrap");
  let slides = document.querySelectorAll(".home-review--container--window--wrap--review");
  const initialLength = slides.length;
  let slideMargin;
  let slideWidth = parseInt(window.getComputedStyle(slides[0]).getPropertyValue("width"));

  const button = {
    left: document.querySelectorAll(".home-reviews--container--button")[0],
    right: document.querySelectorAll(".home-reviews--container--button")[1]
  }

  const transition = {
    remove: function () {
      slideWrapper.style.transition = "margin-left 0ms";
    },
    add: function () {
      slideWrapper.style.transition = "margin-left 500ms";
    }
  }

  function copySlide(i) {
    if (i === 0) {
      slideWrapper.appendChild(slides[0].cloneNode(true));
    } else {
      slideWrapper.insertBefore(slides[slides.length - 1].cloneNode(true), slides[0]);
    }
    slides = document.querySelectorAll(".home-review--container--window--wrap--review");
    slideWrapper.style.width = (100 * slides.length) + "%";
    transition.remove();
    if (i === 1) slideWrapper.style.marginLeft = (getMarginLeft() - slideWidth) + "px";
  }

  function moveSlide(i) {
    setTimeout(function () {
      transition.add();
      slideWrapper.style.marginLeft = (getMarginLeft() + (i * slideWidth)) + "px";
    }, 0);
    setTimeout(function () {
      eventListeners.add();
    }, 550);
  }

  function repositionSlide(i) {
    setTimeout(function () {
      transition.remove();
      if (i === 0) {
        slideWrapper.style.marginLeft = (-slideWidth * (slides.length - 1)) + "px";
      } else {
        slideWrapper.style.marginLeft = "0px";
      }
      if (slides.length !== initialLength) {
        if (i === 0) {
          slideWrapper.removeChild(slides[0]);
          slideWrapper.style.marginLeft = (getMarginLeft() + slideWidth) + "px";
        } else {
          slideWrapper.removeChild(slides[slides.length - 1]);
        }
        slides = document.querySelectorAll(".home-review--container--window--wrap--review");
      }
    }, 500);
  }

  function mainLeft() {
    eventListeners.remove();
    slideMargin = getMarginLeft();
    if (slideMargin === 0) {
      copySlide(1);
      moveSlide(1);
      repositionSlide(0);
    } else {
      moveSlide(1);
    }
  }

  function mainRight() {
    eventListeners.remove();
    slideMargin = getMarginLeft();
    if (slideMargin === -getSlideWidth() * (slides.length - 1)) {
      copySlide(0)
      moveSlide(-1);
      repositionSlide(1);
    } else {
      moveSlide(-1);
    }
  }

  function getMarginLeft() {
    return parseInt(window.getComputedStyle(slideWrapper).getPropertyValue("margin-left"));
  }

  function getSlideWidth() {
    return parseInt(window.getComputedStyle(slides[0]).getPropertyValue("width"));
  }

  const eventListeners = {
    remove: function () {
      button.left.removeEventListener("click", mainLeft);
      button.right.removeEventListener("click", mainRight);
    },
    add: function () {
      button.left.addEventListener("click", mainLeft);
      button.right.addEventListener("click", mainRight);
    }
  }
  eventListeners.add();

  window.addEventListener("resize", resizeSlide);

  function resizeSlide() {
    let width = parseInt(window.getComputedStyle(slideWrapper).getPropertyValue("width"));
    slideWidth = parseInt(window.getComputedStyle(slides[0]).getPropertyValue("width"));
  }

})();