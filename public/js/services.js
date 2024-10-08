// Initialize the first slider (trinds__slider--two)
const splideTrindsTwo = new Splide(".trinds__slider--two", {
    type: "loop",
    perPage: 4, // Default for large screens
    perMove: 1, // Moves one slide at a time
    breakpoints: {
      768: {
        perPage: 2, // Show 2 slides on medium screens
      },
      576: {
        perPage: 1, // Show 1 slide on smaller screens
      },
    },
  });
  splideTrindsTwo.mount();
  
  // Initialize and mount the second slider (trinds__slider--one)
  try {
    const sliderOneElement = document.querySelector(".trinds__slider--one");
  
    if (sliderOneElement) {
      const splideTrindsOne = new Splide(".trinds__slider--one", {
        type: "loop",
        perPage: 4, // Default for large screens
        perMove: 1,
        breakpoints: {
          768: {
            perPage: 2, // Show 2 slides on medium screens
          },
          576: {
            perPage: 1, // Show 1 slide on smaller screens
          },
        },
      });
      splideTrindsOne.mount();
    } else {
      console.log("Slider one element not found");
    }
  } catch (error) {
    console.log("Error initializing slider one:", error.message);
  }
  
  // Initialize and mount the third slider (trinds__slider--three)
  try {
    const sliderThreeElement = document.querySelector(".trinds__slider--three");
  
    if (sliderThreeElement) {
      const splideTrindsThree = new Splide(".trinds__slider--three", {
        type: "loop",
        perPage: 4, // Default for large screens
        perMove: 1,
        breakpoints: {
          768: {
            perPage: 2, // Show 2 slides on medium screens
          },
          576: {
            perPage: 1, // Show 1 slide on smaller screens
          },
        },
      });
      splideTrindsThree.mount();
    } else {
      console.log("Slider three element not found");
    }
  } catch (error) {
    console.log("Error initializing slider three:", error.message);
  }
  
  // Initialize and mount the fourth slider (trinds__slider--four)
  try {
    const sliderFourElement = document.querySelector(".trinds__slider--four");
  
    if (sliderFourElement) {
      const splideTrindsFour = new Splide(".trinds__slider--four", {
        type: "loop",
        perPage: 4, // Default for large screens
        perMove: 1,
        breakpoints: {
          768: {
            perPage: 2, // Show 2 slides on medium screens
          },
          576: {
            perPage: 1, // Show 1 slide on smaller screens
          },
        },
      });
      splideTrindsFour.mount();
    } else {
      console.log("Slider four element not found");
    }
  } catch (error) {
    console.log("Error initializing slider four:", error.message);
  }
  
  // Initialize and mount the fifth slider (trinds__slider--five)
  try {
    const sliderFiveElement = document.querySelector(".trinds__slider--five");
  
    if (sliderFiveElement) {
      const splideTrindsFive = new Splide(".trinds__slider--five", {
        type: "loop",
        perPage: 4, // Default for large screens
        perMove: 1,
        breakpoints: {
          768: {
            perPage: 2, // Show 2 slides on medium screens
          },
          576: {
            perPage: 1, // Show 1 slide on smaller screens
          },
        },
      });
      splideTrindsFive.mount();
    } else {
      console.log("Slider five element not found");
    }
  } catch (error) {
    console.log("Error initializing slider five:", error.message);
  }
  