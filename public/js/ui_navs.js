/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: ui_navs.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:13 PM
 * Last Modified: 12/19/19, 10:37 PM
 *
 * File Name: ui_navs.js
 */

$(function() {
  if ($('html').attr('dir') === 'rtl') {
    $('#nav-light-demo .dropdown-menu').addClass('dropdown-menu-right');
    $('#nav-dropdowns-demo .dropdown-menu').addClass('dropdown-menu-right');
  }
});
