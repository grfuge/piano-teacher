(function () {
  /** 
   * DOM Elements
   */

  const Button = {
    left: document.querySelectorAll(".home-reviews--container--button")[0],
    right: document.querySelectorAll(".home-reviews--container--button")[1]
  }

  let Slideshow = {
    wrapper: document.querySelector(".home-reviews--container--window--wrap"),
    slides: document.querySelectorAll(".home-review--container--window--wrap--review")
  }

  /**
   * Data
   */

  const Default = {
    interval: 500,
    length: Slideshow.slides.length,
    width: parseInt(window.getComputedStyle(Slideshow.slides[0]).getPropertyValue("width"))
  }

  let Slide = {
    current: 0
  }

  /**
   * Data Functions
   */

  let GetSlide = {
    width: function () {
      return parseInt(window.getComputedStyle(Slideshow.slides[0]).getPropertyValue("width"));
    },
    margin: function () {
      return parseInt(window.getComputedStyle(Slideshow.wrapper).getPropertyValue("margin-left"));
    },
    offset: function () {
      return Default.width - parseInt(window.getComputedStyle(Slideshow.slides[0]).getPropertyValue("width"));
    },
    wrapWidth: function () {
      return parseInt(window.getComputedStyle(Slideshow.wrapper).getPropertyValue("width"));
    }
  }

  /**
   * DOM Events
   */

  const Events = {
    add: function () {
      Button.left.addEventListener("click", MoveLeft);
      Button.right.addEventListener("click", MoveRight);
    },
    remove: function () {
      Button.left.removeEventListener("click", MoveLeft);
      Button.right.removeEventListener("click", MoveRight);
    }
  }
  Events.add();

  /**
   * DOM Element Manipulation
   */

  function MoveLeft() {
    Events.remove();
    if (Slide.current === 0) {
      CopySlide.left();
    }
    setTimeout(function () {
      Slideshow.wrapper.style.transition = "all 500ms";
      if (Slide.current === 0) {
        Slideshow.wrapper.style.marginLeft = "0px";
      } else {
        Slideshow.wrapper.style.marginLeft = (Slide.current - 1) * -100 + "%";
      }
    }, 1);
    setTimeout(function () {
      Slideshow.wrapper.style.transition = "all 0ms";
      if (Slide.current === 0) {
        Slideshow.wrapper.style.marginLeft = -GetSlide.width() * (Default.length - 1) + "px";
        RemoveSlide.left();
        Slide.current = Default.length - 1;
      } else {
        Slide.current--;
      }
      Events.add();
    }, 501);
  }

  function MoveRight() {
    Events.remove();
    if (Slide.current === Default.length - 1) {
      CopySlide.right();
    }
    setTimeout(function () {
      Slideshow.wrapper.style.transition = "all 500ms";
      if (Slide.current === Default.length - 1) {
        Slideshow.wrapper.style.marginLeft = (-100 * Default.length) + "%";
      } else {
        Slideshow.wrapper.style.marginLeft = (Slide.current + 1) * -100 + "%";
      }
    }, 1);
    setTimeout(function () {
      Slideshow.wrapper.style.transition = "all 0ms";
      if (Slide.current === Default.length - 1) {
        Slideshow.wrapper.style.marginLeft = "0%";
        RemoveSlide.right();
        Slide.current = 0;
      } else {
        Slide.current++;
      }
      Events.add();
    }, 501);
  }

  const CopySlide = {
    left: function () {
      Slideshow.wrapper.insertBefore(Slideshow.slides[Default.length - 1].cloneNode(true), Slideshow.slides[0]);
      Slideshow.slides = document.querySelectorAll(".home-review--container--window--wrap--review");
      Slideshow.wrapper.style.width = (100 * Slideshow.slides.length) + "%";
      Slideshow.wrapper.style.marginLeft = -GetSlide.width() + "px";
    },
    right: function () {
      Slideshow.wrapper.appendChild(Slideshow.slides[0].cloneNode(true));
      Slideshow.slides = document.querySelectorAll(".home-review--container--window--wrap--review");
      Slideshow.wrapper.style.width = (100 * Slideshow.slides.length) + "%";
    }
  }

  const RemoveSlide = {
    left: function () {
      Slideshow.wrapper.removeChild(Slideshow.slides[0]);
      Slideshow.slides = document.querySelectorAll(".home-review--container--window--wrap--review");
      Slideshow.wrapper.style.width = (100 * Slideshow.slides.length) + "%";
      Slideshow.wrapper.style.marginLeft = (Default.length - 1) * -100 + "%";
    },
    right: function () {
      Slideshow.wrapper.removeChild(Slideshow.slides[Slideshow.slides.length - 1]);
      Slideshow.slides = document.querySelectorAll(".home-review--container--window--wrap--review");
      Slideshow.wrapper.style.width = (100 * Slideshow.slides.length) + "%";
    }
  }

})();