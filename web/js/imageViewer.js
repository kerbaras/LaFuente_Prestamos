(function($) {
    'use strict';

    var DEFAULTS = {

        trigger: 'input[type="file"]',
        defaulturl: '/img/no-source.jpg',
        i: 0,
        maxHeight: '300px',
        maxWidth: '300px'

    }

    var ImageViewer = function(element, options) {
        this.$element = $(element);
        this.options = $.extend({}, DEFAULTS, options);
        this.inputFiles = $(this.options.trigger);

        this.initialize();
    }

    ImageViewer.prototype.initialize = function() {
        var o = this;

        $(this.$element).css({
            'max-height' : o.options.maxHeight,
            'max-width' : o.options.maxWidth
        })
        .attr('src', this.options.defaulturl);



        $(this.inputFiles).on('change', function(e) {
            o.onImageChange(e);
        });

    }

    ImageViewer.prototype.onImageChange = function(event) {
        console.log('llego el evento');
        var file = event.currentTarget.files[this.options.i],
            o = this;

        if (FileReader && file) {
            var reader = new FileReader();
            reader.onloadend = function() {
                $(o.$element).attr('src', reader.result);
            }
            reader.readAsDataURL(file);
        }else{
            o.$element.attr('src', o.options.defaulturl);
        }
    }

    var plugin = function(option) {
        return this.each(function() {

            var $this = $(this);
            var options = $.extend({},
                DEFAULTS,
                $this.data(),
                typeof option === 'object' && option
            );

            var iv = new ImageViewer(this, options);
        });
    }

    $.fn.imageViewer = plugin;
    $.fn.imageViewer.Constructor = ImageViewer;

}(jQuery));
