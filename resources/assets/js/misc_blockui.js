/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: misc_blockui.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:14 PM
 * Last Modified: 11/1/19, 5:58 PM
 *
 * File Name: misc_blockui.js
 */

$(function() {
  $('#block-ui-block-page').click(function() {
    $.blockUI({
      message: '<div class="sk-folding-cube sk-primary"><div class="sk-cube1 sk-cube"></div><div class="sk-cube2 sk-cube"></div><div class="sk-cube4 sk-cube"></div><div class="sk-cube3 sk-cube"></div></div><h5 style="color: #444">LOADING...</h5>',
      css: {
        backgroundColor: 'transparent',
        border: '0',
        zIndex: 9999999
      },
      overlayCSS:  {
        backgroundColor: '#fff',
        opacity: 0.8,
        zIndex: 9999990
      }
    });

    setTimeout(function() {
      $.unblockUI();
    }, 5000);
  });

  $('#block-ui-block-element').click(function() {
    $('#block-ui-element-example').block({
      message: '<div class="sk-wave sk-primary"><div class="sk-rect sk-rect1"></div> <div class="sk-rect sk-rect2"></div> <div class="sk-rect sk-rect3"></div> <div class="sk-rect sk-rect4"></div> <div class="sk-rect sk-rect5"></div></div>',
      css: {
        backgroundColor: 'transparent',
        border: '0'
      },
      overlayCSS:  {
        backgroundColor: '#fff',
        opacity: 0.8
      }
    });
  });

  $('#block-ui-unblock-element').click(function() {
    $('#block-ui-element-example').unblock();
  });
});
