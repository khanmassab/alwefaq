/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: ui_lightbox.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:13 PM
 * Last Modified: 12/19/19, 10:37 PM
 *
 * File Name: ui_lightbox.js
 */

// Photoswipe
$(function() {
  // Utility function (see src/libs/photoswipe/photoswipe.es6)
  // See the docs: http://photoswipe.com/documentation/getting-started.html
  //
  initPhotoSwipeFromDOM('#photoswipe-example');
});

// Blueimp Gallery
$(function() {
  // Lightbox
  $('#blueimp-gallery-example').on('click', '.img-thumbnail', function(e) {
    e.preventDefault();

    var links = $('#blueimp-gallery-example').find('.img-thumbnail');

    window.blueimpGallery(links, {
      container: '#blueimp-gallery-example-container',
      carousel: true,
      hidePageScrollbars: true,
      disableScroll: true,
      index: this
    });
  });

  // Carousel
  window.blueimpGallery([
    '/img/bg/9.jpg',
    '/img/bg/10.jpg',
    '/img/bg/11.jpg',
    '/img/bg/12.jpg',
    '/img/bg/13.jpg',
  ], {
    container: '#blueimp-carousel-example',
    carousel: true
  });
});
