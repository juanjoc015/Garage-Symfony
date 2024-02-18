let cars = document.querySelectorAll('.car');

let inputBrand = document.querySelector('#marque');
let inputPrice = document.querySelector('#prix');
let inputYear = document.querySelector('#annee');

function filterCars() {
    cars.forEach(car => {
        const brandMatches = car.dataset.brand === inputBrand.value || inputBrand.value === '';
        const priceMatches = inputPrice.value[0] === '+' ? car.dataset.price >= inputPrice.value.substr(1) : car.dataset.price <= inputPrice.value || inputPrice.value === '';
        const yearMatches = inputYear.value[0] === '+' ? car.dataset.year >= inputYear.value.substr(1) : car.dataset.year <= inputYear.value || inputYear.value === '';

        car.style.display = brandMatches && priceMatches && yearMatches ? 'block' : 'none';
    });
}

inputBrand.addEventListener('input', filterCars);
inputPrice.addEventListener('input', filterCars);
inputYear.addEventListener('input', filterCars);