/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: ui_tooltips.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:14 PM
 * Last Modified: 11/1/19, 5:58 PM
 *
 * File Name: ui_tooltips.js
 */

$(function() {
  // Tooltips

  if ($('html').attr('dir') === 'rtl') {
    $('.tooltip-demo [data-placement=right]').attr('data-placement', 'left').addClass('rtled');
    $('.tooltip-demo [data-placement=left]:not(.rtled)').attr('data-placement', 'right').addClass('rtled');
  }
  $('[data-toggle="tooltip"]').tooltip();

  // Popovers

  if ($('html').attr('dir') === 'rtl') {
    $('.popover-demo [data-placement=right]').attr('data-placement', 'left').addClass('rtled');
    $('.popover-demo [data-placement=left]:not(.rtled)').attr('data-placement', 'right').addClass('rtled');
  }
  $('[data-toggle="popover"]').popover();

});
