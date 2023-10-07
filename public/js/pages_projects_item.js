/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: pages_projects_item.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:13 PM
 * Last Modified: 12/19/19, 10:37 PM
 *
 * File Name: pages_projects_item.js
 */

$(function() {

  // Drag&Drop

  dragula(Array.prototype.slice.call(document.querySelectorAll('.project-task-list')), {
    moves: function (el, container, handle) {
      return handle.classList.contains('project-task-handle');
    }
  });

  // RTL

  if ($('html').attr('dir') === 'rtl') {
    $('.project-task-actions .dropdown-menu, .project-priority .dropdown-menu').removeClass('dropdown-menu-right');
  }

});
