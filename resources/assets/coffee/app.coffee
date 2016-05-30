window.$ = window.jQuery = require('jquery')
require('bootstrap-sass')
require('moment')
require('fullcalendar')

$(document).ready ->
  console.log('ready')
  $('div.flash-message.alert').not('alert-important').delay(3000).slideUp(300)
