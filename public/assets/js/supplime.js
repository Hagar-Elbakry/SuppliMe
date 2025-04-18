
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
  
