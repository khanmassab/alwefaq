/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: ui_app-brand.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:13 PM
 * Last Modified: 12/19/19, 10:37 PM
 *
 * File Name: ui_app-brand.js
 */

$(function () {
  new SideNav($('#sidenav-app-brand-1')[0]);
  new SideNav($('#sidenav-app-brand-2')[0]);
  new SideNav($('#sidenav-app-brand-3')[0]);

  $('#sidenav-app-brand-toggle-collapsed').click(function () {
    $('#sidenav-app-brand-1').toggleClass('sidenav-collapsed');
    $('#sidenav-app-brand-2').toggleClass('sidenav-collapsed');
    $('#sidenav-app-brand-3').toggleClass('sidenav-collapsed');
  });
});
