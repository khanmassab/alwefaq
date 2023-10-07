/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: forms_input-groups.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:13 PM
 * Last Modified: 12/19/19, 10:37 PM
 *
 * File Name: forms_input-groups.js
 */

$(function() {
  if ($('html').attr('dir') === 'rtl') {
    $('.button-dropdown-input-group-demo .dropdown-menu-right').removeClass('dropdown-menu-right').addClass('rtled');
    $('.button-dropdown-input-group-demo .dropdown-menu:not(.rtled)').addClass('dropdown-menu-right');
  }
});
