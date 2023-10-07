/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: pages_articles_list.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:13 PM
 * Last Modified: 12/19/19, 10:37 PM
 *
 * File Name: pages_articles_list.js
 */

$(function() {

  var statuses = {
    1: ['Published', 'success'],
    2: ['Draft', 'info'],
    3: ['Deleted', 'default']
  };

  $('#article-list').dataTable({
    ajax: '/json/pages_articles_list.json',
    columnDefs: [ {
      targets: [6],
      orderable: false,
      searchable: false
    }],
    createdRow: function (row, data, index) {

      // *********************************************************************
      // Article link

      $('td', row).eq(1).html('').append(
        '<a href="javascript:void(0)">' + data[1] + '</a>'
      );

      // *********************************************************************
      // Status

      $('td', row).eq(5).html('').append(
        '<span class="badge badge-outline-' + statuses[data[5]][1] + '">' + statuses[data[5]][0] + '</span>'
      );

      // *********************************************************************
      // Actions

      $('td', row).eq(6).addClass('text-center text-nowrap').html('').append(
        '<button type="button" class="btn btn-default btn-xs icon-btn md-btn-flat article-tooltip" title="Edit"><i class="ion ion-md-create"></i></button>&nbsp;&nbsp;' +
        '<button type="button" class="btn btn-default btn-xs icon-btn md-btn-flat article-tooltip" title="Remove"><i class="ion ion-md-close"></i></button>'
      );

    }
  });

  // Tooltips

  $('body').tooltip({
    selector: '.article-tooltip'
  });

});
