function initMap() {
  var uluru = {
    lat: 34.193778,
    lng: -118.571073
  };
  var map = new google.maps.Map(document.querySelector('.map'), {
    zoom: 13,
    center: uluru,
    disableDefaultUI: true
  });
  var marker = new google.maps.Marker({
    position: uluru,
    map: map
  });
}