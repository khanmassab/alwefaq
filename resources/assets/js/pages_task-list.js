/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: pages_task-list.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:14 PM
 * Last Modified: 11/1/19, 5:58 PM
 *
 * File Name: pages_task-list.js
 */

$(function() {

  // Drag&Drop

  dragula(Array.prototype.slice.call(document.querySelectorAll('.task-list')), {
    moves: function (el, container, handle) {
      return handle.classList.contains('task-list-handle');
    }
  });

  // RTL

  if ($('html').attr('dir') === 'rtl') {
    $('.task-list-actions .dropdown-menu').removeClass('dropdown-menu-right');
  }

});
