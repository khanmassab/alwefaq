/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: gallery.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:14 PM
 * Last Modified: 11/1/19, 5:58 PM
 *
 * File Name: gallery.js
 */

import * as blueimpGallery from 'blueimp-gallery/js/blueimp-gallery.js';

if ($('html').attr('dir') === 'rtl' || $('body').attr('dir') === 'rtl') {
  var galleryTranslateX = blueimpGallery.prototype.translateX;
  blueimpGallery.prototype.translateX = function(index, x, speed) {
    x = this.touchStart && this.touchStart.x ? x : -1 * x;

    galleryTranslateX.call(this, index, x, 0, speed);
  }

  blueimpGallery.prototype.positionSlide = function (index) {
    var slide = this.slides[index]
    slide.style.width = this.slideWidth + 'px'
    if (this.support.transform) {
      slide.style.right = index * -this.slideWidth + 'px'
      this.move(
        index,
        this.index > index
          ? -this.slideWidth
          : this.index < index ? this.slideWidth : 0,
        0
      )
    }
  }

  blueimpGallery.prototype.ontouchstart = function() {};
  blueimpGallery.prototype.ontouchmove = function() {};
  blueimpGallery.prototype.ontouchend = function()  {};
  blueimpGallery.prototype.ontouchcancel = function() {};
}

export { blueimpGallery };
