



<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
    <br>
    <br>
    <div id="map" style="width:100%;height:500px"></div>
    <br>
    <br>
</div>



<script>
    function initMap() {
        var myLatLng = {lat: <?= $lat ?>, lng: <?= $lgn ?>};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: myLatLng
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
        });
    }
    initMap();
</script>


