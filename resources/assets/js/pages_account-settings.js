/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: pages_account-settings.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:14 PM
 * Last Modified: 11/1/19, 5:58 PM
 *
 * File Name: pages_account-settings.js
 */

$(function() {

  $('.account-settings-multiselect').each(function() {
    $(this)
      .wrap('<div class="position-relative"></div>')
      .select2({
        dropdownParent: $(this).parent()
      });
  });

  $('.account-settings-tagsinput').tagsinput({ tagClass: 'badge badge-default' });

});
