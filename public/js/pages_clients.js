/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: pages_clients.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:13 PM
 * Last Modified: 12/19/19, 10:37 PM
 *
 * File Name: pages_clients.js
 */

$(function() {

  function openSidenav() {
    $('.clients-wrapper').addClass('clients-sidebox-open');
  }

  function closeSidenav() {
    $('.clients-wrapper').removeClass('clients-sidebox-open');
    $('.clients-table tr.bg-light').removeClass('bg-light');
  }

  function selectClient(row) {
    openSidenav();
    $('.clients-table tr.bg-light').removeClass('bg-light');
    $(row).addClass('bg-light');
  }

  $('body').on('click', '.clients-table tr', function() {
    // Load client data here
    // ...

    // Select client
    selectClient(this);
  });

  $('body').on('click', '.clients-sidebox-close', function(e) {
    e.preventDefault();
    closeSidenav();
  });

  // Setup scrollbars

  $('.clients-scroll').each(function() {
    new PerfectScrollbar(this, {
      suppressScrollX: true,
      wheelPropagation: true
    });
  });

});
