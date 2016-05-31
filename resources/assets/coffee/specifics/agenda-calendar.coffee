$ ->
  console.log('Loading fullcalendar')
  
  $('#fullcalendar').fullCalendar
    dayClick: (date, jsEvent, view, resourceObj) ->
      console.log('Day clicked')
