$ ->
  $('.sortable').sortable
    'handle': '.handle'
    'update': ->
      url = $(this).data('url')
      data = $(this).sortable('serialize')
      
      $.post(
        headers:
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        url: url,
        data: data,
        error: ->
          console.log('Could not sort!')
      )
