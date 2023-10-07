/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: misc_masonry.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:14 PM
 * Last Modified: 11/1/19, 5:58 PM
 *
 * File Name: misc_masonry.js
 */

$(function() {
  $('.masonry-grid').masonry({
    itemSelector: '.masonry-grid-item',
    columnWidth: 160,
    originLeft: !($('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl')
  });
});
