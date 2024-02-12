
    var stars = document.querySelectorAll('.form_star');
    var rating = document.getElementById('review_rating');
    stars.forEach(function (star, index) {
      star.addEventListener('click', function () {
        rating.value = index + 1;
        stars.forEach(function (innerStar, innerIndex) {
          if (innerIndex < index + 1) {
            innerStar.classList.add('selected');
          } else {
            innerStar.classList.remove('selected');
          }
        });
      });
    });

