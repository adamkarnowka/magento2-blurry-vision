require([
    "jquery",
    "jquery/jstree/jquery.hotkeys"
], function($){
    'use strict';

    var currentState = 'blurred';

    $('body').on('keyup', function (e) {
       if(e.key == 'b'){
           var selectors = JSON.parse(BLURRY_VISION_SELECTORS);
           if(currentState == 'blurred'){
               // Deblur
               for (var key in selectors) {
                   var value = selectors[key];
                   $(value['selector']).css('filter', 'blur(0px)');
                   console.log($(value['selector']));
                   currentState = 'deblurred';
               }
           } else {
               for (var key in selectors) {
                   var value = selectors[key];
                   $(value['selector']).css('filter', 'blur('+BLURRY_VISION_BLUR_STRENGTH+'px)');
                   currentState = 'blurred';
               }
           }
       }
    })

});

require([
    "jquery",
    "Magento_Ui/js/modal/modal",
    'jquery/jquery.cookie',
    'jquery/jquery-storageapi'
],function($, modal) {
    var options = {
        type: 'popup',
        responsive: true,
        title: 'Blurry vision is enabled',
        buttons: [{
            text: $.mage.__('All right'),
            class: '',
            click: function () {
                this.closeModal();
            }
        }]
    };

    var alreadyShown = $.cookieStorage.get('already_shown');

    if(!alreadyShown) {
        var popup = modal(options, $('#blurry-vision-modal'));
        $('#blurry-vision-modal').modal('openModal');
        $.cookieStorage.set('already_shown', 1);
    }
});
