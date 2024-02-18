document.addEventListener("DOMContentLoaded", function() {
  let starsContainer = document.getElementById("stars");
  let selectedStarIndex = -1;
  let inputRating = document.getElementById("review_rating");

  function updateStars() {
    let stars = Array.from(starsContainer.getElementsByClassName("star"));
    stars.forEach((star, index) => {
      if (index <= selectedStarIndex) {
        star.classList.add("fas");
        star.classList.remove("far");
      } else {
        star.classList.add("far");
        star.classList.remove("fas");
      }
    });
  }

  starsContainer.addEventListener("click", function(event) {
    if (event.target.matches(".star, .star *")) {
      let stars = Array.from(starsContainer.getElementsByClassName("star"));
      selectedStarIndex = stars.indexOf(event.target.closest(".star"));
      inputRating.value = selectedStarIndex + 1;
      updateStars();
    }
  });
});