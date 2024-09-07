
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition2);
    } else {
        alert("La géolocalisation n'est pas prise en charge par votre navigateur.");
    }
}
let loca = document.getElementById('location');
let icon = document.getElementById('icon');
console.log(icon) ;

function showPosition(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    

    var apiURL = `https://nominatim.openstreetmap.org/reverse?lat=${latitude}&lon=${longitude}&format=json`;
    fetch(apiURL)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            var city = data.address.state;
            var commune = data.address.town || data.address.city;
            var postcode = data.address.postcode;
            document.getElementById("ville").textContent = city;
            document.getElementById("commune").textContent = commune;
            document.getElementById("postcode").textContent = postcode;
        })
        .catch(error => console.log(error));
}

function showPosition2(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    
   
    var apiKey = 'pk.3c45d6d7e9367d750117bc6aefed6f43';
    var apiURL = `https://us1.locationiq.com/v1/reverse.php?key=${apiKey}&lat=${latitude}&lon=${longitude}&format=json`;

    fetch(apiURL)
        .then(response => response.json())
        .then(data => {
            console.log(data)
            var city = data.address.state;
            var commune = data.address.city;
            var postcode = data.address.postcode;
            loca.value  = data.address.town;
            document.getElementById("ville").textContent = city;
            document.getElementById("commune").textContent = commune;
            document.getElementById("postcode").textContent = postcode;
            console.log(data.address.town);
        })
        .catch(error => console.log(error));
}

icon.onclick=getLocation;
