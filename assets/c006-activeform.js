/**
 * Created by user on 12/13/2014.
 */


jQuery(function () {

    jQuery('.c006-activeform-toggle-container')
        .unbind('click')
        .bind('click',
              function () {
                  var $this = jQuery(this);
                  var $on = $this.find('.c006-activeform-toggle-on');
                  var $off = $this.find('.c006-activeform-toggle-off');
                  var $input = $this.find('input[type=hidden]');

                  if ($input.val() == undefined || $input.val() == "" || $input.val() * 1.00 < 1) {
                      $input.val(1);
                      $on.switchClass('c006-activeform-on', 'c006-activeform-off', 1000, "easeInOutQuad");
                      $off.switchClass('c006-activeform-off', 'c006-activeform-on', 1000, "easeInOutQuad");
                  } else {
                      $input.val(0);
                      $off.switchClass('c006-activeform-on', 'c006-activeform-off', 1000, "easeInOutQuad");
                      $on.switchClass('c006-activeform-off', 'c006-activeform-on', 1000, "easeInOutQuad");
                  }
              });

});
