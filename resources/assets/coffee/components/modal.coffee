$('.modal').find('.submit-button').click ->
  $form = $(this).parent().parent().find('.modal-body').find('form')
  $form.submit()
