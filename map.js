 var polygon_int = 0;
        var polygons = [];
        var infoWindow;
        var map;
        var eventNames = <?php echo json_encode ($labelEventNames)?>;
        var eventStart =<?php echo json_encode ($startTime)?>;
        var eventEnd = <?php echo json_encode ($endTime)?>;
        var eventLoc = <?php echo json_encode ($mapLocations)?>;
        function initMap() {
            var mapDiv = document.getElementById('map');
            map = new google.maps.Map(mapDiv, {
                center: {lat: 38.98676, lng: -76.942619},
                zoom: 15
            });
        <?php 
        if ($coordsLength != 0)  {
            foreach($uniqueCoords as $a){ ?>
                var polygon = new google.maps.Polygon({
                polygonID : polygon_int,
                paths: [<?=$a?>],
                strokeColor: '#000000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor:'#00EE00',
                fillOpacity: 0.35
        });
        polygon_int++;
        polygons.push(polygon);
        polygon.setMap(map);
        polygon.addListener('click', showDetails);
        infoWindow = new google.maps.InfoWindow;
        <?php 
            } 
        }?>
        }
        function showDetails(event) {   
            var polygonID = this.polygonID;
            var contentString = '<b>' + eventNames[polygonID] +'</b> <br>'+ eventLoc[polygonID];
            infoWindow.setContent(contentString);
            infoWindow.setPosition(event.latLng);
            infoWindow.open(map);
        }