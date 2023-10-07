/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: pages_articles_edit.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:13 PM
 * Last Modified: 12/19/19, 10:37 PM
 *
 * File Name: pages_articles_edit.js
 */

$(function() {

  $('.article-edit-tagsinput').tagsinput({ tagClass: 'badge badge-default' });

  if (!window.Quill) {
    $('#article-editor,#article-editor-toolbar').remove();
    $('#article-editor-fallback').removeClass('d-none');
  } else {
    $('#article-editor-fallback').remove();
    new Quill('#article-editor', {
      modules: {
        toolbar: '#article-editor-toolbar'
      },
      theme: 'snow'
    });
  }

});
