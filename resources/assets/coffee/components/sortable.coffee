#$ ->
##  $('.sortable').sortable().bind 'sortupdate', (e, ui) ->
##    console.log('updated')
#  $('.sortable').sortable
#    'containment': 'parent'
#    'revert': true
#    'handle': '.handle'
#    'update': (e, ui) ->
#      $.post(
#        'meal-types/sort'
#        $(this).serialize()
#        (data, textStatus) ->
#          console.log('Answered:')
#          console.log(data)
#          console.log(textStatus)
#          if(!data.success)
#           alert('Something went wrong')
#          else
#            alert('done')
#        'json')