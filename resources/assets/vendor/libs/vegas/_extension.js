/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:53 AM
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

// Make vegas responsive
//

const fnVegas = $.fn.vegas;

$.fn.vegas = function(...args) {
  const result = fnVegas.apply(this, args);

  if (args[0] === undefined || typeof args[0] === 'object') {
    this.each(function() {
      if (this.tagName.toUpperCase() === 'BODY' || !this._vegas) { return; }

      $(this).css('height', '');
    });
  }

  return result;
};
