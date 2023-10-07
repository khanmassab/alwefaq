/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: pages_file-manager.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:13 PM
 * Last Modified: 12/19/19, 10:37 PM
 *
 * File Name: pages_file-manager.js
 */

$(function() {

  // Checkboxes

  $('.file-manager-container').on('change', '.file-item-checkbox input', function() {
    $(this).parents('.file-item')[this.checked ? 'addClass': 'removeClass']('selected border-primary');
  });

  // Focus

  $('.file-manager-container').on('focusin', '.file-item', function() {
    $(this).addClass('focused');
  });

  $('.file-manager-container').on('focusout', '.file-item', function() {
    if ($('.file-item-actions.show').length) return;
    $(this).removeClass('focused');
  });

  $('.file-manager-container').on('hide.bs.dropdown', '.file-item-actions', function() {
    if ($(this).parents('.file-item').find(':focus').length) return;
    $(this).parents('.file-item').removeClass('focused');
  });

  // Change view

  $('[name="file-manager-view"]').on('change', function() {
    $('.file-manager-container')
      .removeClass('file-manager-col-view file-manager-row-view')
      .addClass(this.value);
  });

  // RTL

  if ($('html').attr('dir') === 'rtl') {
    $('.file-manager-actions .dropdown-menu').addClass('dropdown-menu-right');
    $('.file-item-actions .dropdown-menu').removeClass('dropdown-menu-right');
  }

});
