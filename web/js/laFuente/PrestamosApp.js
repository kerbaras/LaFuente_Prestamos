var laFuentePrestamos = {};

(function(namespace, $) {
    "use strict";

    var PrestamosApp = function() {
        // Create reference to this instance
        var o = this;
        // Initialize app when document is ready
        $(document).ready(function() {
            o.initialize();
        });

    };
    var p = PrestamosApp.prototype;

    p.events = {
        card: {
            onRefresh: function(event) {

            },
            onCollapse: function(event) {
                var card = $(event.currentTarget).closest('.card');
                var duration = 400;
                card.find('.nano').slideToggle(duration);
                card.find('.card-body').slideToggle(duration);
                card.find('.card-actionbar').slideToggle(duration);
                card.toggleClass('card-collapsed');
            },
            onClose: function(event) {
                var card = $(event.currentTarget).closest('.card');
                card.fadeOut(700);
            }
        },
        mainMenu: {
            onToggle: function(event) {
                $('body').toggleClass('menu-hidden');
            }
        }
    }

    p.initialize = function() {
        $.material.init();
        this.handlerEvents();
        this.initPlugins();
    }

    p.handlerEvents = function() {

        var o = this;

        $('.card-head .tools .btn-refresh').on('click', function(e) {
            o.events.card.onRefresh(e);
        });

        $('.card-head .tools .btn-collapse').on('click', function(e) {
            o.events.card.onCollapse(e);
        });

        $('.card-head .tools .btn-close').on('click', function(e) {
            o.events.card.onClose(e);
        });

        $('#toggle-main-menu').on('click', function(e) {
            o.events.mainMenu.onToggle(e);
        });

    }

    p.initPlugins = function() {
        $('#menu').metisMenu();
        $('.nano').nanoScroller();
        $('[data-toggle="tooltip"]').tooltip();
    }

    namespace.PrestamosApp = new PrestamosApp;

}(this.laFuentePrestamos, jQuery));
