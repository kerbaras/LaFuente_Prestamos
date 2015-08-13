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

    p.initialize = function () {
        
    }

    p.initGoogleMaps = function () {
        this.addressMap = new google.maps.Map(document.getElementById('addressMap'), {
            center: {lat: -34.397, lng: 150.644},
            zoom: 8,
            disableDefaultUI: true,
            draggable: true
        });
    }

    namespace.newUser = new newUserPage;

}(this.laFuente.prestamos.pages, jQuery));
