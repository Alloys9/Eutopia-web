/*Carousel*/
$(".carousel-container").slick({
  dots: true, // Enable dots navigation
  arrows: true, // Enable arrows navigation
  autoplay: true, // Enable autoplay
  autoplaySpeed: 5000, // Set autoplay speed (in milliseconds)
});

window.addEventListener("DOMContentLoaded", (event) => {
  // Extract the username from the URL query parameters
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  const username = urlParams.get("username");

  // Update the content of the "username" element
  const usernameElement = document.getElementById("username");
  usernameElement.textContent = username;
});

