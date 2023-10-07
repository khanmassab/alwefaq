/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: pages_contacts.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:14 PM
 * Last Modified: 11/1/19, 5:58 PM
 *
 * File Name: pages_contacts.js
 */

$(function() {

  var $container = $('.contacts-row-view, .contacts-col-view');

  // Initial setup
  $container
    .removeClass('contacts-row-view contacts-col-view')
    .addClass($('[name="contacts-view"]').val());

  $('[name="contacts-view"]').on('change', function() {
    $container
      .removeClass('contacts-row-view contacts-col-view')
      .addClass(this.value);
  });

  if ($('html').attr('dir') === 'rtl') {
    $('.contacts-dropdown-menu').removeClass('dropdown-menu-right');
  }

});
