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
  try {
    const s = document.querySelector(".trinds__slider--one");
    console.log(s);
    console.log(Splide);
    const splideTrindsTwo = new Splide(".trinds__slider--one", {
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
  } catch (error) {
    console.log(error.message);
  }
  