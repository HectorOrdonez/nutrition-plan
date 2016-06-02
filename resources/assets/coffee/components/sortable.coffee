$ ->
  $('.sortable').sortable().bind 'sortupdate', (e, ui) ->
    console.log('updated')
