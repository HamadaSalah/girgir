const select = document.querySelector("#type");
const passwordInput = document.querySelectorAll(".password");
const providerPassowrd = document.querySelectorAll(".provider-password");
const companyIdInput = document.querySelector(".companyId");
const companyWebsite = document.querySelector(".website");
const account = document.querySelector(".account");

//////////////////////////////////////////////
//// Make the slider works with splide
try {
  const splideTrindsOne = new Splide(".trinds__slider--one", {
    type: "loop",
    perPage: 4, // Default for large screens
    perMove: 1, // Moves one slide at a time
    breakpoints: {
      // Bootstrap's medium screen size (768px and below)
      768: {
        perPage: 2, // Show 2 slides on medium screens
      },
      // Bootstrap's small screen size (576px and below)
      576: {
        perPage: 1, // Show 1 slide on smaller screens
      },
    },
  });

  splideTrindsOne.mount();

  const splideTrindsTwo = new Splide(".trinds__slider--two", {
    type: "loop",
    perPage: 4, // Default for large screens
    perMove: 1, // Moves one slide at a time
    breakpoints: {
      // Bootstrap's medium screen size (768px and below)
      768: {
        perPage: 2, // Show 2 slides on medium screens
      },
      // Bootstrap's small screen size (576px and below)
      576: {
        perPage: 1, // Show 1 slide on smaller screens
      },
    },
  });

  splideTrindsTwo.mount();

  const splideTrindsThree = new Splide(".trinds__slider--three", {
    type: "loop",
    perPage: 4, // Default for large screens
    perMove: 1, // Moves one slide at a time

    breakpoints: {
      // Bootstrap's medium screen size (768px and below)
      768: {
        perPage: 2, // Show 2 slides on medium screens
      },
      // Bootstrap's small screen size (576px and below)
      576: {
        perPage: 1, // Show 1 slide on smaller screens
      },
    },
  });

  splideTrindsThree.mount();

  const splideServicesOne = new Splide(".services__slider--one", {
    type: "loop",
    perPage: 5, // Default for large screens
    perMove: 1, // Moves one slide at a time

    breakpoints: {
      // Bootstrap's medium screen size (768px and below)
      768: {
        perPage: 2, // Show 2 slides on medium screens
      },
      // Bootstrap's small screen size (576px and below)
      576: {
        perPage: 1, // Show 1 slide on smaller screens
      },
    },
  });

  splideServicesOne.mount();

  var splide = new Splide(".progress", {
    pagination: false,
  });
  var bar = splide.root.querySelector(".my-slider-progress-bar");

  // Updates the bar width whenever the carousel moves:
  splide.on("mounted move", function () {
    var end = splide.Components.Controller.getEnd() + 1;
    var rate = Math.min((splide.index + 1) / end, 1);
    bar.style.width = String(100 * rate) + "%";
  });

  splide.mount();

  //////////////////////////////////////////////
  //// toggle overlay and progress box

  const btnStart = document.querySelector(".start__planning");
  const overlay = document.querySelector(".overlay");
  const overlayContent = document.querySelector(".overlay__content");
  const btnClose = document.querySelector(".close");

  btnStart.addEventListener("click", function () {
    overlay.classList.toggle("visually-hidden");
    overlayContent.classList.toggle("visually-hidden");
  });

  overlay.addEventListener("click", function () {
    overlay.classList.toggle("visually-hidden");
    overlayContent.classList.toggle("visually-hidden");
  });

  btnClose.addEventListener("click", function () {
    overlay.classList.toggle("visually-hidden");
    overlayContent.classList.toggle("visually-hidden");
  });

  //////////////////////////////////////////
  ///// progress budget and guests
  const rangeInput = document.getElementById("range");
  const circle = document.getElementById("circle");

  // Function to update the position of the circle element
  function updateCirclePosition() {
    const rangeValue = rangeInput.value;
    const max = rangeInput.max;
    const min = rangeInput.min;

    // Calculate the percentage of the current value relative to the max/min range
    const percentage = ((rangeValue - min) / (max - min)) * 100;

    // Update the content of the circle
    circle.textContent = rangeValue;

    // Move the circle element above the thumb
    const thumbOffset = (rangeInput.offsetWidth * percentage) / 100 - 15; // Center the circle
    circle.style.transform = `translateX(${thumbOffset}px)`;
  }

  // Update position on input change
  rangeInput.addEventListener("change", updateCirclePosition);

  // Initial update when page loads
  updateCirclePosition();

  /////////////////////////////////////////
  ///// progress budget and guests
  const rangeInputTwo = document.querySelector(".range--2");
  const circleTwo = document.querySelector(".circle--2");

  // Function to update the position of the circleTwo element
  function updatecircleTwoPosition() {
    const rangeValue = rangeInputTwo.value;
    const max = rangeInputTwo.max;
    const min = rangeInputTwo.min;

    // Calculate the percentage of the current value relative to the max/min range
    const percentage = ((rangeValue - min) / (max - min)) * 100;

    // Update the content of the circleTwo
    circleTwo.textContent = rangeValue + "$";

    // Move the circleTwo element above the thumb
    const thumbOffset = (rangeInputTwo.offsetWidth * percentage) / 100 - 15; // Center the circleTwo
    circleTwo.style.transform = `translateX(${thumbOffset}px)`;
  }

  // Update position on input change
  rangeInputTwo.addEventListener("change", updatecircleTwoPosition);

  // Initial update when page loads
  updatecircleTwoPosition();

  ////////////////////////////////////////
  //////// Conditionally show the main and search results and search empty

  const mainContent = document.querySelector(".main__content");
  const searchResults = document.querySelector(".search__results");
  const searchEmpty = document.querySelector(".search__empty");
  const formNav = document.querySelector(".form__nav");
  const formNavInput = document.querySelector(".form__nav--input");
  const homeMain = document.querySelectorAll(".home__main");

  formNav.addEventListener("submit", function (e) {
    e.preventDefault();
    const searchValue = formNavInput.value;
    console.log(searchValue);
    if (searchValue !== "") {
      searchResults.classList.remove("d-none");
      searchEmpty.classList.add("d-none");
      mainContent.classList.add("d-none");
    } else if (searchValue === "") {
      console.log("cart is empty!!!");
      searchResults.classList.add("d-none");
      searchEmpty.classList.remove("d-none");
      mainContent.classList.add("d-none");
    }
  });

  homeMain.forEach((el) => {
    el.addEventListener("click", function () {
      searchResults.classList.add("d-none");
      searchEmpty.classList.add("d-none");
      mainContent.classList.remove("d-none");
    });
  });

  ////////////////////////////////////////
  //// toggle vendours
  const vendours = document.querySelector(".vendours");
  console.log(vendours);
  vendours.addEventListener("click", function (e) {
    if (!e.target.classList.contains("col")) return;
    e.target.classList.toggle("btn-primary");
  });

  const events = document.querySelectorAll(".events");
  events.forEach((event) => {
    event.addEventListener("click", function () {
      event.classList.toggle("btn-primary-light");
    });
  });
} catch (error) {
  console.log(error.message);
}

////////////////////////////////////////
//////// for sign up selection
select.addEventListener("change", function (e) {
  const selected = e.target.value;

  if (selected == "company_provider") {
    passwordInput.forEach((input) => {
      input.classList.add("d-none");
    });
    providerPassowrd.forEach((input) => {
      input.classList.remove("d-none");
    });
    account.classList.remove("d-none");
    companyIdInput.classList.remove("d-none");
    companyWebsite.classList.remove("d-none");
  } else if (selected == "user") {
    passwordInput.forEach((input) => {
      input.classList.add("d-none");
    });
    providerPassowrd.forEach((input) => {
      input.classList.remove("d-none");
    });
    companyIdInput.classList.add("d-none");
    companyWebsite.classList.add("d-none");
  } else {
    passwordInput.forEach((input) => {
      input.classList.remove("d-none");
    });
    providerPassowrd.forEach((input) => {
      input.classList.add("d-none");
    });
    companyIdInput.classList.add("d-none");
    companyWebsite.classList.add("d-none");
  }
});
