/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: pages_kanban-board.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:14 PM
 * Last Modified: 11/1/19, 5:58 PM
 *
 * File Name: pages_kanban-board.js
 */

$(function() {

  // Drag&Drop

  dragula(
    Array.prototype.slice.call(document.querySelectorAll('.kanban-box'))
  );

  // RTL

  if ($('html').attr('dir') === 'rtl') {
    $('.kanban-board-actions .dropdown-menu').removeClass('dropdown-menu-right');
  }

});
