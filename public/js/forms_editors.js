/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: forms_editors.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:13 PM
 * Last Modified: 12/19/19, 10:37 PM
 *
 * File Name: forms_editors.js
 */

// Bootstrap Markdown
$(function() {
  $('#bs-markdown').markdown({
    iconlibrary: 'fa',
    footer: '<div id="md-character-footer"></div><small id="md-character-counter" class="text-muted">350 character left</small>',

    onChange: function(e) {
      var contentLength = e.getContent().length;

      if (contentLength > 350) {
        $('#md-character-counter')
          .removeClass('text-muted')
          .addClass('text-danger')
          .html((contentLength - 350) + ' character surplus.');
      } else {
        $('#md-character-counter')
          .removeClass('text-danger')
          .addClass('text-muted')
          .html((350 - contentLength) + ' character left.');
      }
    },
  });

  // Update character counter
  $('#markdown').trigger('change');


  // *******************************************************************
  // Fix icons

  $('.md-editor .fa-header').removeClass('fa fa-header').addClass('fas fa-heading');
  $('.md-editor .fa-picture-o').removeClass('fa fa-picture-o').addClass('far fa-image');
});

// Quill
$(function() {
  if (!window.Quill) {
    return $('#quill-editor,#quill-toolbar,#quill-bubble-editor,#quill-bubble-toolbar').remove();
  }

  var editor = new Quill('#quill-editor', {
    modules: {
      toolbar: '#quill-toolbar'
    },
    placeholder: 'Type something',
    theme: 'snow'
  });

  // Get HTML content:
  //
  // var content = editor.root.innerHTML;
  //

  var bubbleEditor = new Quill('#quill-bubble-editor', {
    placeholder: 'Compose an epic...',
    modules: {
      toolbar: '#quill-bubble-toolbar'
    },
    theme: 'bubble'
  });
});
