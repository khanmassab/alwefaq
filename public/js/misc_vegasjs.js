/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: misc_vegasjs.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:13 PM
 * Last Modified: 12/19/19, 10:37 PM
 *
 * File Name: misc_vegasjs.js
 */

$(function() {
  $('#vegas-example').vegas({
    slides: [
      { src: "/img/bg/1.jpg" },
      { src: "/img/bg/2.jpg" },
      { src: "/img/bg/3.jpg" },
      { src: "/img/bg/4.jpg" },
      { src: "/img/bg/5.jpg" }
    ],
    transition: [ 'fade', 'zoomOut', 'zoomIn', 'blur' ],
    animation: [ 'kenburnsUp', 'kenburnsDown', 'kenburnsLeft', 'kenburnsRight' ]
  });

  // Progess color
  $('#vegas-example .vegas-timer-progress').css('background', 'rgba(0,0,0,.2)');

  // Overlays
  $('#vegas-dark-overlay-example, #vegas-light-overlay-example').vegas({
    overlay: true,
    timer: false,
    shuffle: true,
    slides: [
      { src: "/img/bg/1.jpg" },
      { src: "/img/bg/2.jpg" },
      { src: "/img/bg/3.jpg" },
      { src: "/img/bg/4.jpg" },
      { src: "/img/bg/5.jpg" }
    ],
    transition: [ 'fade', 'blur' ],
  });

  // Fixed bg
  $('#vegas-fixed-bg-example').vegas({
    overlay: false,
    timer: false,
    shuffle: true,
    slides: [
      { src: "/img/bg/1.jpg" },
      { src: "/img/bg/2.jpg" },
      { src: "/img/bg/3.jpg" },
      { src: "/img/bg/4.jpg" },
      { src: "/img/bg/5.jpg" }
    ],
    transition: [ 'fade', 'blur' ],
  });
});
