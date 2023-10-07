/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: pages_e-commerce_product-item.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:14 PM
 * Last Modified: 11/1/19, 5:58 PM
 *
 * File Name: pages_e-commerce_product-item.js
 */

$(function() {

  $('#product-item-images').on('click', 'a', function(e) {
    e.preventDefault();

    // Select only visible thumbnails
    var links = $('#product-item-images').find('a');

    window.blueimpGallery(links, {
      container: '#product-item-lightbox',
      carousel: true,
      hidePageScrollbars: true,
      disableScroll: true,
      index: this
    });
  });

});
