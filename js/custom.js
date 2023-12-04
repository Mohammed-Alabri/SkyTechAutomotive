

// Get Current Year
function getCurrentYear() {
    var d = new Date();
    var year = d.getFullYear();
    document.querySelector("#displayDateYear").innerText = year;
}
getCurrentYear()

//client section owl carousel
$(".owl-carousel").owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    dots: false,
    navText: [
        '<i class="fa fa-long-arrow-left" aria-hidden="true"></i>',
        '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>'
    ],
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        1000: {
            items: 2
        }
    }
});

/** google_map js **/

function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(40.712775, -74.005973),
        zoom: 18,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}
//function to create new review
function createClientReview(review) {
    const container = $(".owl-carousel");

    const itemDiv = document.createElement('div');
    itemDiv.className = 'item';

    const boxDiv = document.createElement('div');
    boxDiv.className = 'box';

    const clientIDDiv = document.createElement('div');
    clientIDDiv.className = 'client_id';

    const imgBoxDiv = document.createElement('div');
    imgBoxDiv.className = 'img-box';
    const imgElement = document.createElement('img');
    imgElement.src = 'images/default_image.jpg'; // You may need to adjust the image source
    imgElement.alt = '';

    imgBoxDiv.appendChild(imgElement);

    const clientDetailDiv = document.createElement('div');
    clientDetailDiv.className = 'client_detail';

    const clientInfoDiv = document.createElement('div');
    clientInfoDiv.className = 'client_info';

    const nameElement = document.createElement('h6');
    nameElement.textContent = review.name;//add name

    clientInfoDiv.appendChild(nameElement);
    //stars validation
    if (review.stars >5){
        alert("bro"+ review.name +" why, we know our work is great but 5 starts is enough.")
        stars = 5;
    }
    if (review.stars < 1){
        alert("bro at least one star no less.")
        stars = 1;
    }
    for (let i = 0; i < review.stars; i++) {//add stars
      const starElement = document.createElement('i');
      starElement.className = 'fa fa-star';
      starElement.setAttribute('aria-hidden', 'true');  
      clientInfoDiv.appendChild(starElement);
    }

    const quoteLeftElement = document.createElement('i');
    quoteLeftElement.className = 'fa fa-quote-left';
    quoteLeftElement.setAttribute('aria-hidden', 'true');

    clientDetailDiv.appendChild(clientInfoDiv);
    clientDetailDiv.appendChild(quoteLeftElement);

    const clientTextDiv = document.createElement('div');
    clientTextDiv.className = 'client_text';

    const textElement = document.createElement('p');
    textElement.textContent = review.message;//add message

    clientTextDiv.appendChild(textElement);

    clientIDDiv.appendChild(imgBoxDiv);
    clientIDDiv.appendChild(clientDetailDiv);

    boxDiv.appendChild(clientIDDiv);
    boxDiv.appendChild(clientTextDiv);

    itemDiv.appendChild(boxDiv);

    //container.appendChild(itemDiv);
    container.trigger("add.owl.carousel", [itemDiv]).trigger("refresh.owl.carousel");
  }

  function submitReview() {
    const userName = $("#userName").val();
    const userRating = $("#userRating").val();
    const userReview = $("#userReview").val();

    // Validate the input
    if (!userName || !userRating || !userReview) {
      alert("Please fill in all fields.");
      return;
    }
    rev = new Review(userName, userRating, userReview);

    // Add the new review
    createClientReview(rev)
    //clearing inputs
    document.getElementById("userName").value = ""
    document.getElementById("userRating").value = ""
    document.getElementById("userReview").value = ""

    alert("you review has been added.")
  }

  function Review(name, stars, message){//review object
    this.name = name;
    this.stars = stars;
    this.message = message;

}


