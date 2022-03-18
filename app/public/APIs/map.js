function initMap() {
    // The location of Uluru
    const uluru = { lat: 52.3787103837758, lng: 4.63765463883837 };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 70,
        center: uluru,
    });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
        position: uluru,
        map: map,
    });
    }