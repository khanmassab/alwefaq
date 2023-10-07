/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: pages_chat.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:13 PM
 * Last Modified: 12/19/19, 10:37 PM
 *
 * File Name: pages_chat.js
 */

$(function() {

  $('.chat-scroll').each(function() {
    new PerfectScrollbar(this, {
      suppressScrollX: true,
      wheelPropagation: true
    });
  });

  $('.chat-sidebox-toggler').click(function(e) {
    e.preventDefault();
    $('.chat-wrapper').toggleClass('chat-sidebox-open');
  });

});
