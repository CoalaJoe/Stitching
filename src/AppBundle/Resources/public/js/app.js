/**
 * @author Dominik Müller (Ashura) ashura@aimei.ch
 */

"use strict";

var app = {
    init:              function() {
        $.material.init();
        $('body').tooltip({'trigger': 'hover', 'selector': '[data-toggle="tooltip"]'});
        app.boot();
        app.setEventListeners();
    },
    boot:              function() {
        $('.bootable.boot-start').each(function(index) {
            var that = this;
            setTimeout(function() {
                $(that).addClass('boot').addClass('booted');
            }, 200 * index);
        });

        $('.slideDown').delay(1000).slideDown(600);
    },
    unboot:            function() {
        $('.booted').removeClass('boot');
        $('.open').removeClass('open');
    },
    setEventListeners: function() {
        $('window').on('unload', function() {
            app.unboot();
        });
        $('body').on('click', '.btn-delete', function() {
            if (window.confirm('Sind Sie sicher dass Sie dieses Bild löschen wollen?')) {
                var id = $(this).data('id');
                window.location.href = '/app_dev.php/delete/' + id;
            }
        });
    }
};

app.init();