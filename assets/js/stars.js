
    var stars = document.querySelectorAll('.star');
    var rating = document.getElementById('rating');
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

    // document.getElementById('avisForm').addEventListener('submit', function(event) {
    //   var nom = document.getElementById('nom').value;
    //   var commentaire = document.getElementById('commentaire').value;
    //   var ratingValue = rating.value;

    //   if (!/^[\sa-zA-ZéèêëàâôûîïçÉÈÊËÀÂÔÛÎÏÇ']*$/.test(nom)) {
    //     alert("Votre nom contient des caractères non autorisés. Veuillez n'utiliser que des lettres et des espaces.");
    //     event.preventDefault();
    //   } else if (nom === "") {
    //     alert("Veuillez insérer votre nom.");
    //     event.preventDefault();
    //   } else if (commentaire === "") {
    //     alert("Veuillez insérer votre avis.");
    //     event.preventDefault();
    //   }
    // });
 
//   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
//   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
//   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>