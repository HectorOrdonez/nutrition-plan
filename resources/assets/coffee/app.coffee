window.$ = window.jQuery = require('jquery')
require('bootstrap-sass')

$(document).ready ->
  console.log('ready')
  $('div.flash-message.alert').not('alert-important').delay(3000).slideUp(300)
