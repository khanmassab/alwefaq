/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:53 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: sweetalert2.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:14 PM
 * Last Modified: 11/1/19, 5:58 PM
 *
 * File Name: sweetalert2.js
 */

import * as SwalPlugin from 'sweetalert2/dist/sweetalert2.js'

const Swal = SwalPlugin.mixin({
  buttonsStyling: false,
  customClass: {
    confirmButton: 'btn btn-primary btn-lg',
    cancelButton: 'btn btn-default btn-lg'
  }
})

export { Swal };
