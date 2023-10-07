/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: _extension.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:14 PM
 * Last Modified: 11/1/19, 5:58 PM
 *
 * File Name: _extension.js
 */

const originalPicker = $.fn.bootstrapMaterialDatePicker;

$.fn.bootstrapMaterialDatePicker = function (...args) {
  this.each(function() {
    const newInstance = !$.data(this, 'plugin_bootstrapMaterialDatePicker');

    originalPicker.apply($(this), args);

    if (newInstance) {
      const $template = $('body').find(`> #${$.data(this, 'plugin_bootstrapMaterialDatePicker').name}`);

      // Add animation
      $template.addClass('animated fadeIn')

      // Styling buttons
      $template.find('.dtp-btn-now,.dtp-btn-clear,.dtp-btn-cancel').addClass('btn-default btn-sm');
      $template.find('.dtp-btn-ok').addClass('btn-primary btn-sm');
    }
  });

  return this;
};
