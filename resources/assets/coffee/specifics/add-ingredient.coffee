#$ ->
#  console.log('add ingredient')
#  $modal = $('#ingredient-modal-add')
#  $modal.find('#auto').autocomplete
#    source: '/getdata',
#    minLength: 1,
#    select: (event, ui) ->
#      console.log('select this')
#      $('#response').val(ui.item.id)
