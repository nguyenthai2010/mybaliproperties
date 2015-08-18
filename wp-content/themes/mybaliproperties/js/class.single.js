

var clsProperties = (function() {
    //PARAMATER

    //INIT
    function init(){
        popup();
        createRadio();

        //share
        $('#facebookID').click(function(){
            share_feed();
        });

        $('#twitterID').click(function(){
            twShare();
        });
    }

    //FANCYBOX
    function popup(){


        $(".fancybox").fancybox({
            padding: 0,
            helpers: {
                overlay: {
                    locked: false
                }
            }
        });
    }
    function createRadio(){
        $('.iCheck input, .accept-this').iCheck();
    }
    //MAP
    function render_map( $el ) {

        // var
        var $markers = $el.find('.marker');

        // vars
        var args = {
            scrollwheel: false,
            zoom		: 16,
            center		: new google.maps.LatLng(0, 0),
            mapTypeId	: google.maps.MapTypeId.ROADMAP
        };

        // create map
        var map = new google.maps.Map( $el[0], args);

        // add a markers reference
        map.markers = [];

        // add markers
        $markers.each(function(){

            add_marker( $(this), map );

        });

        // center map
        center_map( map );

    }

    /*
     *  add_marker
     *
     *  This function will add a marker to the selected Google Map
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	4.3.0
     *
     *  @param	$marker (jQuery element)
     *  @param	map (Google Map object)
     *  @return	n/a
     */

    function add_marker( $marker, map ) {

        // var
        var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

        // create marker
        var marker = new google.maps.Marker({
            position	: latlng,
            map			: map
        });

        // add to array
        map.markers.push( marker );

        // if marker contains HTML, add it to an infoWindow
        if( $marker.html() )
        {
            // create info window
            var infowindow = new google.maps.InfoWindow({
                content		: $marker.html()
            });

            // show info window when marker is clicked
            google.maps.event.addListener(marker, 'click', function() {

                infowindow.open( map, marker );

            });
        }

    }

    /*
     *  center_map
     *
     *  This function will center the map, showing all markers attached to this map
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	4.3.0
     *
     *  @param	map (Google Map object)
     *  @return	n/a
     */

    function center_map( map ) {

        // vars
        var bounds = new google.maps.LatLngBounds();

        // loop through all markers and create bounds
        $.each( map.markers, function( i, marker ){

            var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

            bounds.extend( latlng );

        });

        // only 1 marker?
        if( map.markers.length == 1 )
        {
            // set center of map
            map.setCenter( bounds.getCenter() );
            map.setZoom( 16 );
        }
        else
        {
            // fit to bounds
            map.fitBounds( bounds );
        }

    }


    //SHARING
    function twShare(){
        var share_url = $("meta[name='twitter:url']").attr("content");
        var description = $("meta[name='twitter:description']").attr("content");
        if(description.length > 96){
            description = description.substr(0,96);
            var last_space= description.lastIndexOf(' ');
            if(last_space > 0){
                description = description.substr(0,last_space);
            }
            description = description + '...';
        }

        var url = 'https://twitter.com/intent/tweet?text='+description+'&url='+share_url;
        var w = 620;
        var h = 360;
        var left = (screen.width/2)-(w/2);
        var top = (screen.height/2)-(h/2);
        return window.open(url, 'Share', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
        window.open(url);
    }

    function share_feed()
    {
        var share_link = $("meta[property='og:url']").attr("content");
        var picture = $("meta[property='og:image']").attr("content");
        var name = $("meta[property='og:title']").attr("content");
        var caption = '';
        var description = $("meta[property='og:description']").attr("content");

        var obj = {
            method: 'feed',
            link: share_link,
            picture: picture,
            name: name,
            caption: caption,
            description: description,
            actions: [{ name: name, link: share_link }]
        };
        FB.ui(obj);
    }

    //RETURN
    return {
        init:init,
        twShare:twShare,
        share_feed:share_feed,
        render_map:render_map
    }
})();
