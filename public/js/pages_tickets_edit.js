/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: pages_tickets_edit.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:13 PM
 * Last Modified: 12/19/19, 10:37 PM
 *
 * File Name: pages_tickets_edit.js
 */

$(function() {

  $('.ticket-assignee').tooltip();

  $('#ticket-tags').tagsinput({ tagClass: 'badge badge-primary' });

  $('#ticket-upload-dropzone').dropzone({
    parallelUploads: 2,
    maxFilesize:     50000,
    filesizeBase:    1000,
    addRemoveLinks:  true
  });

});
