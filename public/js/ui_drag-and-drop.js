/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: ui_drag-and-drop.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:13 PM
 * Last Modified: 12/19/19, 10:37 PM
 *
 * File Name: ui_drag-and-drop.js
 */

// Dragula
$(function() {
  dragula([$('#dragula-left')[0], $('#dragula-right')[0]], {
    revertOnSpill: true
  });

  // Copying
  dragula([$('#dragula-left-copy')[0], $('#dragula-right-copy')[0]], {
    copy: true
  });

  // Drag handle
  dragula([$('#dragula-left-drag-handles')[0], $('#dragula-right-drag-handles')[0]], {
    moves: function (el, container, handle) {
      return handle.classList.contains('handle');
    }
  });
});

// Sortable.js
$(function() {
  Sortable.create(document.getElementById('sortable-1'), { animation: 150 });
  Sortable.create(document.getElementById('sortable-2'), { animation: 150 });
  Sortable.create(document.getElementById('sortable-3'), { animation: 150 });
  Sortable.create(document.getElementById('sortable-4'), {
    animation: 150,
    handle: '.ion'
  });
});
