<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Géolocalisation</title>
</head>
<body>
    <h1>Géolocalisation</h1>
    <p>Ville: <span id="ville"></span></p>
    <p>Commune: <span id="commune"></span></p>

    <script>
        // Fonction pour obtenir la géolocalisation de l'utilisateur
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("La géolocalisation n'est pas prise en charge par votre navigateur.");
            }
        }

        // Fonction pour afficher la position
        function showPosition(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            
            // Appel à l'API de géocodage inversé de Nominatim pour obtenir la ville et la commune
            var apiURL = `https://nominatim.openstreetmap.org/reverse?lat=${latitude}&lon=${longitude}&format=json`;
            fetch(apiURL)
                .then(response => response.json())
                .then(data => {
                    var city = data.address.state;
                    var commune = data.address.city;
                    document.getElementById("ville").textContent = city;
                    document.getElementById("commune").textContent = commune;
                })
                .catch(error => console.log(error));
        }

        // Appel de la fonction pour obtenir la géolocalisation
        getLocation();
    </script>
</body>
</html>