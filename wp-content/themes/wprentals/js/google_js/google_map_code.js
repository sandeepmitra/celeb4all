/*global google, Modernizr, InfoBox, googlecode_regular_vars, document, window, setOms, OverlappingMarkerSpiderfier, mapfunctions_vars, jQuery, googlecode_regular_vars2, map_cluster, setMarkers*/
var gmarkers = [];
var current_place = 0;
var actions = [];
var categories = [];
var vertical_pan = -190;
var map_open = 0;
var vertical_off = 150;
var pins = '';
var markers = '';
var infoBox = null;
var category = null;
var width_browser = null;
var infobox_width = null;
var wraper_height = null;
var info_image = null;
var map;
var found_id;
var selected_id = '';
var javamap;
var oms;
var bounds_list;

var mcluster;

function initialize() {
    "use strict";
    var mapOptions, styles;
    mapOptions = {
        flat: false,
        noClear: false,
        zoom: parseInt(googlecode_regular_vars.page_custom_zoom, 10),
        scrollwheel: false,
        draggable: true,
        center: new google.maps.LatLng(googlecode_regular_vars.general_latitude, googlecode_regular_vars.general_longitude),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        streetViewControl: false,
        mapTypeControlOptions: {
            mapTypeIds: [google.maps.MapTypeId.ROADMAP]
        },
        disableDefaultUI: true
    };


    if (document.getElementById('googleMap')) {
        map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);
    } else if (document.getElementById('google_map_prop_list')) {
        map = new google.maps.Map(document.getElementById('google_map_prop_list'), mapOptions);
        bounds_list = new google.maps.LatLngBounds();
        
    } else {
        return;
    }

    google.maps.visualRefresh = true;

    if (mapfunctions_vars.map_style !== '') {
        styles = JSON.parse(mapfunctions_vars.map_style);
        map.setOptions({styles: styles});
    }


    google.maps.event.addListener(map, 'tilesloaded', function () {
        jQuery('#gmap-loading').remove();
    });

    if (Modernizr.mq('only all and (max-width: 1025px)')) {
        map.setOptions({'draggable': false});
    }


    if (googlecode_regular_vars.generated_pins === '0') {
        pins = googlecode_regular_vars.markers;
        markers = jQuery.parseJSON(pins);
    } else {
        if (typeof (googlecode_regular_vars2.markers2) !== 'undefined' && googlecode_regular_vars2.markers2.length > 2) {
            pins = googlecode_regular_vars2.markers2;
            markers = jQuery.parseJSON(pins);
          
        }
    }

    if (markers.length > 0) {
        setMarkers(map, markers);
    }

    //set map cluster
    map_cluster();
    function scrollwhel(event) {
        if (map.scrollwheel === true) {
            event.stopPropagation();
        }
    }

    if (document.getElementById('googleMap')) {
        google.maps.event.addDomListener(document.getElementById('googleMap'), 'mousewheel', scrollwhel);
        google.maps.event.addDomListener(document.getElementById('googleMap'), 'DOMMouseScroll', scrollwhel);
    }

    if (document.getElementById('google_map_prop_list')) {

        if (!bounds_list.isEmpty()) {
            map.fitBounds(bounds_list);
        }

        google.maps.event.addDomListener(document.getElementById('google_map_prop_list'), 'mousewheel', scrollwhel);
        google.maps.event.addDomListener(document.getElementById('google_map_prop_list'), 'DOMMouseScroll', scrollwhel);
    }

    oms = new OverlappingMarkerSpiderfier(map, {markersWontMove: true, markersWontHide: true, keepSpiderfied: true, legWeight: 3});
    setOms(gmarkers);

}
///////////////////////////////// end initialize
/////////////////////////////////////////////////////////////////////////////////// 


if (typeof google === 'object' && typeof google.maps === 'object') {
    google.maps.event.addDomListener(window, 'load', initialize);
}