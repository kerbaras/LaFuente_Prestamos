(function(namespace, $) {
    "use strict";

    var newUserPage = function() {
        // Create reference to this instance
        var o = this;
        // Initialize app when document is ready
        $(document).ready(function() {
            o.initialize();
        });

    };
    var p = newUserPage.prototype;

    p.addressMap = null;
    p.addressMapMarker = null;
    p.geocoder = null;

    p.onPositionChange = function(e, address) {
        var o = this;
        o.geocoder.geocode({
            'address': o.formatAddress()
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                o.updateAddressMarker(results[0].geometry.location);
            }
        });
    }

    p.initialize = function() {
        this.initForm();
        $('.imageViewer').imageViewer({
            trigger : '#inputImage'
        });
    }

    p.initForm = function () {
        var o = this;

    }

    p.initGoogleMaps = function() {

        this.addressMap = new google.maps.Map(document.getElementById('addressMap'), {
            center: new google.maps.LatLng(-34.9038077, -57.9381168),
            zoom: 14,
            disableDefaultUI: true
        });

        this.addressMapMarker = new google.maps.Marker({
            position: new google.maps.LatLng(-34.9038077, -57.9381168),
            animation: google.maps.Animation.DROP
        });

        this.addressMapMarker.setMap(this.addressMap);

        this.geocoder = new google.maps.Geocoder();

        this.handlerGMapsEvents();
    }

    p.handlerGMapsEvents = function() {
        var o = this;
        $('#inputStreet, #inputNumber, #inputCity, #inputZip').on('change', function(e) {
            o.onPositionChange(e);
        });
    }

    p.formatAddress = function() {
        var address = [];
        var street = $('#inputStreet').val() + " " + $('#inputNumber').val();
        var city = $('#inputCity').val();
        var zip = $('#inputZip').val();

        // Add values to array if not empty
        if ($.trim(street) !== '') {
            address.push(street);
        }
        if ($.trim(city) !== '') {
            address.push(city);
        }
        if ($.trim(zip) !== '') {
            address.push(zip);
        }

        // Format address to search string
        return address.join(',');
    }

    p.updateAddressMarker = function(location) {
        this.addressMap.setCenter(location);
        this.addressMapMarker.setPosition(location);
    }

    namespace.newUserPage = new newUserPage;

}(this.laFuentePrestamos, jQuery));
