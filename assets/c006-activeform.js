/**
 * Created by user on 12/13/2014.
 */


jQuery(function () {

    jQuery('.c006-activeform-toggle-container')
        //.unbind('click')
        .bind('click',
              function () {
                  var _transistion = 700;
                  var $this = jQuery(this);
                  var $on = $this.find('.c006-activeform-toggle-on');
                  var $off = $this.find('.c006-activeform-toggle-off');
                  var $input = $this.find('input[type=hidden]');

                  if (!$input.attr('item_init') || $input.val() == undefined || $input.val() == "") {
                      if ($input.val()) {
                          $input.val(0)
                      } else {
                          $input.val(1);
                      }
                      $on.switchClass('c006-activeform-on', 'c006-activeform-off', _transistion, "easeInOutQuad");
                      $off.switchClass('c006-activeform-off', 'c006-activeform-on', _transistion, "easeInOutQuad");
                      $input.attr('item_init', 1);
                  } else if ($input.val() == "0") {
                      $input.val(1);
                      $off.switchClass('c006-activeform-on', 'c006-activeform-off', _transistion, "easeInOutQuad");
                      $on.switchClass('c006-activeform-off', 'c006-activeform-on', _transistion, "easeInOutQuad");
                  } else {
                      $input.val(0);
                      $on.switchClass('c006-activeform-on', 'c006-activeform-off', _transistion, "easeInOutQuad");
                      $off.switchClass('c006-activeform-off', 'c006-activeform-on', _transistion, "easeInOutQuad");
                  }
              })
        .trigger('click');

});
