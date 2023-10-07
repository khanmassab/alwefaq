/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: bootstrap-daterangepicker.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:14 PM
 * Last Modified: 11/1/19, 5:58 PM
 *
 * File Name: bootstrap-daterangepicker.js
 */

require('bootstrap-daterangepicker/daterangepicker.js');

// Monkey-patch to detect when weeks are shown

var fnDaterangepicker = $.fn.daterangepicker;

$.fn.daterangepicker = function(options, callback) {
  fnDaterangepicker.call(this, options, callback);

  if (options && (options.showWeekNumbers || options.showISOWeekNumbers)) {
    this.each(function() {
      var instance = $(this).data('daterangepicker');
      if (instance && instance.container) instance.container.addClass('with-week-numbers');
    });
  }

  return this;
};
