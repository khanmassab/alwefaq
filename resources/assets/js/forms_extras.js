/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: forms_extras.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:14 PM
 * Last Modified: 11/1/19, 5:58 PM
 *
 * File Name: forms_extras.js
 */

// Autosize
$(function() {
  autosize($('#autosize-demo'));
});

// Vanilla Text Mask
$(function() {
  // Phone
  //

  vanillaTextMask.maskInput({
    inputElement: $('#text-mask-phone')[0],
    mask: ['(', /[1-9]/, /\d/, /\d/, ')', ' ', /\d/, /\d/, /\d/, '-', /\d/, /\d/, /\d/, /\d/]
  });

  // Number
  //

  vanillaTextMask.maskInput({
    inputElement: $('#text-mask-number')[0],
    mask: textMaskAddons.createNumberMask({
      prefix: '$'
    })
  });

  // Email
  //

  vanillaTextMask.maskInput({
    inputElement: $('#text-mask-email')[0],
    mask: textMaskAddons.emailMask
  });

  // Date
  //

  vanillaTextMask.maskInput({
    inputElement: $('#text-mask-date')[0],
    mask: [/\d/, /\d/, '/', /\d/, /\d/, '/', /\d/, /\d/, /\d/, /\d/],
    pipe: textMaskAddons.createAutoCorrectedDatePipe('mm/dd/yyyy')
  });
});

// Knob
$(function() {
  $('.knob-example input').knob();
});

// Bootstrap Maxlength
$(function() {
  $('.bootstrap-maxlength-example').each(function() {
    $(this).maxlength({
      warningClass: 'label label-success',
      limitReachedClass: 'label label-danger',
      separator: ' out of ',
      preText: 'You typed ',
      postText: ' chars available.',
      validate: true,
      threshold: +this.getAttribute('maxlength')
    });
  });
});

// Pwstrength-bootstrap
$(function() {
  $('#pwstrength-example').pwstrength({
    ui: {
      progressExtraCssClasses: 'pwstrength-progress',
      useVerdictCssClass: true,
      showErrors: true
    }
  });
});
