/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: pages_messages.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:13 PM
 * Last Modified: 12/19/19, 10:37 PM
 *
 * File Name: pages_messages.js
 */

$(function() {

  // Collapse sidenav by default
  window.layoutHelpers.setCollapsed(true, false);

  // Enable tooltips
  $('.messages-tooltip').tooltip();

  $('.messages-scroll').each(function() {
    new PerfectScrollbar(this, {
      suppressScrollX: true,
      wheelPropagation: true
    });
  });

  $('.messages-sidebox-toggler').click(function(e) {
    e.preventDefault();
    $('.messages-wrapper, .messages-card').toggleClass('messages-sidebox-open');
  });

  // New message
  // {

    if (!window.Quill) {
      $('#message-editor,#message-editor-toolbar').remove();
      $('#message-editor-fallback').removeClass('d-none');
    } else {
      $('#message-editor-fallback').remove();
      new Quill('#message-editor', {
        modules: {
          toolbar: '#message-editor-toolbar'
        },
        placeholder: 'Type your message...',
        theme: 'snow'
      });
    }

  // }

});
