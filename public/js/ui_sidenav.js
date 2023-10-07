/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: ui_sidenav.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:13 PM
 * Last Modified: 12/19/19, 10:37 PM
 *
 * File Name: ui_sidenav.js
 */

// Vertical
$(function() {
  new SideNav($('#sidenav-1')[0]);

  $('#sidenav-1-toggle-collapsed').click(function() {
    $('#sidenav-1').toggleClass('sidenav-collapsed');
  });
});

// Horizontal
$(function() {
  new SideNav($('#sidenav-2')[0], {
    orientation: 'horizontal'
  });
});

// Horizontal (Show dropdown on hover)
$(function() {
  new SideNav($('#sidenav-3')[0], {
    orientation: 'horizontal',
    showDropdownOnHover: true
  });
});

// Horizontal (within container)
$(function() {
  new SideNav($('#sidenav-4')[0], {
    orientation: 'horizontal'
  });
});

// No animation
$(function() {
  new SideNav($('#sidenav-5')[0], {
    animate: false
  });

  new SideNav($('#sidenav-6')[0], {
    orientation: 'horizontal',
    animate: false
  });

  $('#sidenav-5-toggle-collapsed').click(function() {
    $('#sidenav-5').toggleClass('sidenav-collapsed');
  });
});

// No accordion
$(function() {
  new SideNav($('#sidenav-7')[0], {
    accordion: false
  });

  new SideNav($('#sidenav-8')[0], {
    orientation: 'horizontal',
    accordion: false
  });

  $('#sidenav-7-toggle-collapsed').click(function() {
    $('#sidenav-7').toggleClass('sidenav-collapsed');
  });
});

// Elements
$(function() {
  $('.sidenavs-9').each(function() {
    new SideNav(this);
  });

  $('#sidenavs-9-toggle-collapsed').click(function() {
    $('.sidenavs-9').toggleClass('sidenav-collapsed');
  });
});

// Colors (vertical)
$(function() {
  $('.sidenavs-10').each(function() {
    new SideNav(this);
  });

  $('#sidenavs-10-toggle-collapsed').click(function() {
    $('.sidenavs-10').toggleClass('sidenav-collapsed');
  });
});

// Colors (horizontal)
$(function() {
  $('.sidenavs-11').each(function() {
    new SideNav(this, {
      orientation: 'horizontal'
    });
  });
});

// With background
$(function() {
  $('.sidenavs-12').each(function() {
    new SideNav(this);
  });

  $('#sidenavs-12-toggle-collapsed').click(function() {
    $('.sidenavs-12').toggleClass('sidenav-collapsed');
  });
});
