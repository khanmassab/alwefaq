/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: misc_numeraljs.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:14 PM
 * Last Modified: 11/1/19, 5:58 PM
 *
 * File Name: misc_numeraljs.js
 */

$(function() {
  $('#numeral-example-1').html(numeral(1000.1234).format('0,0'));
  $('#numeral-example-2').html(numeral(1000.1234).format('0,0.00'));
  $('#numeral-example-3').html(numeral(1000.1234).format('+0,0'));
  $('#numeral-example-4').html(numeral(1000.1234).format('.00'));
  $('#numeral-example-5').html(numeral(1000.1234).format('$0,0.00'));
});
