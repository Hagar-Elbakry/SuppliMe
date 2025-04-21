document.querySelector(".f-search-icon").addEventListener("click", function () {
  const searchBox = document.getElementById("floating-search");
  searchBox.classList.toggle("d-none");
});

document.addEventListener("DOMContentLoaded", function () {
  const menuIcon = document.querySelector(".icon");
  const categoryList = document.querySelector(".category");

  menuIcon.addEventListener("click", function (event) {
    event.preventDefault();
    categoryList.classList.toggle("active");
  });
});

function scrollSlider(direction) {
  let container = document.querySelector(".items");
  let containerWidth = container.clientWidth;

  let numVisibleItems = window.innerWidth < 768 ? 2 : 5;
  let itemWidth = container.scrollWidth / container.children.length;
  let scrollAmount = itemWidth * numVisibleItems;

  container.scrollBy({
    left: direction * scrollAmount,
    behavior: "smooth",
  });
}

function slide(direction, sliderIndex) {
  let sliders = document.querySelectorAll(".row");
  let container = sliders[sliderIndex];

  if (container) {
    let containerWidth = container.clientWidth;
    container.scrollBy({
      left: direction * containerWidth,
      behavior: "smooth",
    });
  }
}
function handleClick(checkbox) {
  if (checkbox.checked) {
    let pages = {
      Fruits: "./supplime2.html",
      Vegetables: "vegetables.html",
      Drinks: "drinks.html",
      DryFruit: "dry-fruit.html",
      Oil: "oil.html",
      BakeryItems: "bakery.html",
      MilkShake: "milkshake.html",
      Detergents: "detergents.html",
      MilkEggs: "milk-eggs.html",
    };
    window.open(pages[checkbox.id], "_blank");
  }
}
document.querySelectorAll('.stars i').forEach(star => {
  star.addEventListener('click', function() {
      const rating = this.getAttribute('data-rating');
      document.getElementById('rating-value').value = rating;

      
      document.querySelectorAll('.stars i').forEach(s => {
          s.classList.remove('bi-star-fill');
          s.classList.add('bi-star');
      });
      

      for (let i = 0; i < rating; i++) {
          document.querySelectorAll('.stars i')[i].classList.remove('bi-star');
          document.querySelectorAll('.stars i')[i].classList.add('bi-star-fill');
      }
    });
});


const heart = document.getElementById('bi-heart');

heart.addEventListener('click', () => {
  heart.classList.toggle('liked');
});
