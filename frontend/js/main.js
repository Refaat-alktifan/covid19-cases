(function($) {
    "use strict";

    
    $('#search_country').keyup(function(){  
        search_table($(this).val());  
    });  
    function search_table(value){  
        $('.single-country-list').each(function(){  
        var found = 'false';  
        $(this).each(function(){  
            if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
            {  
               found = true;  
            }  
        });  
        if(found == true)  
        {  
            $(this).show();  
        }  
        else  
        {  
            $(this).hide();  
        }  
      });  
    } 


    $(".country-list").niceScroll({ cursorcolor: "#fff" });

    function addCommas(nStr) {
        nStr += '';
        var x = nStr.split('.');
        var x1 = x[0];
        var x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }


    
    // google map

    function basicmap() {
        // Map options
        var options = {
            zoom: parseInt($('#zoom').val()),
            center: { lat: parseInt($('#center_lat').val()), lng: parseInt($('#center_lng').val()) },
            styles: [{
                "featureType": "water",
                "stylers": [{
                    "color": "#0e171d"
                }]
            },
            {
                "featureType": "landscape",
                "stylers": [{
                    "color": "#1e303d"
                }]
            },
            {
                "featureType": "road",
                "stylers": [{
                    "color": "#1e303d"
                }]
            },
            {
                "featureType": "poi.park",
                "stylers": [{
                    "color": "#1e303d"
                }]
            },
            {
                "featureType": "transit",
                "stylers": [{
                    "color": "#182731"
                },
                {
                    "visibility": "simplified"
                }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "labels.icon",
                "stylers": [{
                    "color": "#f0c514"
                },
                {
                    "visibility": "off"
                }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "labels.text.stroke",
                "stylers": [{
                    "color": "#1e303d"
                },
                {
                    "visibility": "off"
                }
                ]
            },
            {
                "featureType": "transit",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#e77e24"
                },
                {
                    "visibility": "off"
                }
                ]
            },
            {
                "featureType": "road",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#94a5a6"
                }]
            },
            {
                "featureType": "administrative",
                "elementType": "labels",
                "stylers": [{
                    "visibility": "simplified"
                },
                {
                    "color": "#e84c3c"
                }
                ]
            },
            {
                "featureType": "poi",
                "stylers": [{
                    "color": "#e84c3c"
                },
                {
                    "visibility": "off"
                }
                ]
            }]
        }

        // New map
        var map = new google.maps.Map(document.getElementById('contact-map'), options);

        // Listen for click on map
        google.maps.event.addListener(map, 'click', function(event) {
            // Add marker
            addMarker({ coords: event.latLng });
        });

        var data = [];
        var allInfo='';

        // Array of markers
        var markers = [];

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var country_url = $("#country_link").val();
        $.ajax({
            type: 'POST',
            url: country_url,
            dataType: 'json',       
            success: function(response){ 
            $.each(response, function(index, value){
               let v =  {
                coords: { lat: value.countryInfo.lat, lng: value.countryInfo.long },
                iconImage: 'https://vigorous-bassi-7b804b.netlify.com/map.png',
                content: "<div class='cases-map-info text-center'><img class='custom-country-img' src='"+value.countryInfo.flag+"'/><div class='country-info text-center pt-15'><h5>"+value.country+"</h5></div><div class='today-new-caces'>+"+value.todayCases+"</div><div class='map-popup-info pt-10'><span>"+value.cases+" Total Cases</span></div><div class='map-popup-info'><span>"+value.recovered+" Total Recovered</span></div><div class='map-popup-info'><span>"+value.deaths+" Total Deaths</span></div></div>"

            }
            markers.push(v);                

            allInfo=response;
        });


        // Loop through markers
        for (var i = 0; i < markers.length; i++) {
            // Add marker
            addMarker(markers[i]);
        }

        // Add Marker Function
        function addMarker(props) {
            var marker = new google.maps.Marker({
                position: props.coords,
                map: map,
                //icon:props.iconImage
            });

            // Check for customicon
            if (props.iconImage) {
                // Set icon image
                marker.setIcon(props.iconImage);
            }

            // Check content
            if (props.content) {
                var infoWindow = new google.maps.InfoWindow({
                    content: props.content
                });

                marker.addListener('mouseover', function() {
                    infoWindow.open(map, marker);
                });

                marker.addListener('mouseout', function() {
                    infoWindow.close(map, marker);
                });
            }
        }


        let totalCases=0;
        let TotalDeaths=0;


        let recovered=0;
        let active=0;


        $.each(allInfo, function(index, value){
            $("#country-list").append("<div class='single-country-list'><a href='javascript:void(0)' onclick='CountryInfo("+index+")'  data-toggle='modal' data-target='.bd-example-modal-xl'><div class='country-name'><span> <img src="+value.countryInfo.flag+" height='20px'></span><span>"+value.country+"</span><span class='city f-right'>Cases "+addCommas(value.cases)+"</span></div></a></div><input type='hidden' id='countryID"+index+"' value="+value.country+">");

            let cases = totalCases + value.cases;
            totalCases = cases;  

            let death=TotalDeaths + value.deaths;
            TotalDeaths = death;


            let recovereds=recovered + value.recovered;
            recovered = recovereds; 

            let actives=active + value.active;
            active = actives;

            $(".loading_bar").fadeOut();
        });
        $('#death').html(addCommas(TotalDeaths));
        $('#Totalcases').html(addCommas(totalCases));
        $('#Toatalrecovered').html(addCommas(recovered));
        $('#active').html(addCommas(active));
        }
    })
}

if ($('#contact-map').length != 0) {
    google.maps.event.addDomListener(window, 'load', basicmap);

}

})(jQuery);


//report by country 
function CountryInfo(par){
    $('#load').show();
    let currenturl= $('#currenturl').val();
    let ids= $('#countryID'+par).val();


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url:  currenturl+'/get-info-country/'+ids,
        dataType: 'json',
        beforeSend: function() {
            $(".loader_country").fadeIn();
            $(".custom-modal-content").addClass('hide_class');
            $(".main_widget").addClass('d-none');
        },      
        success: function(response){ 
            $(".loader_country").fadeOut();
            $(".custom-modal-content").removeClass('hide_class');
            $(".main_widget").removeClass('d-none');
            $('#country').html(response.country);   
            $('#cases').html(response.cases);   
            $('#today').html(response.todayCases);   
            $('#deaths').html(response.deaths);   
            $('#todayDeaths').html(response.todayDeaths);   
            $('#recovered').html(response.recovered);   
            $('#activecases').html(response.active);   
            $('#critical').html(response.critical);   
            $('#casesPerOneMillion').html(response.casesPerOneMillion);   
            $('#deathsPerOneMillion').html(response.deathsPerOneMillion);   
            $('#tests').html(response.tests);   
            $('#testsPerOneMillion').html(response.testsPerOneMillion);   
        }   
    })  
}