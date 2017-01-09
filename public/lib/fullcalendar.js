$(document).ready(function() {
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: 'home/view',
        type:'post',
        dataType: 'json',
        cache: false,
        context:this,
        data:{_token:token},
        success: function (data) {
            if(data.status == 'ok'){
                $('#calendar').fullCalendar({
                eventClick: function(data) {
                    $('#view-event').modal('show');
                    // $('#view-event').find('.modal-body h5').text(data.id);
                    $('#view-event').find('.modal-body #title').val(data.title);
                    $('#view-event').find('.modal-body #email').val(data.email);
                    $('#view-event').find('.modal-body .start').val(data.start);
                    $('#view-event').find('.modal-body .end').val(data.end);
                    $('#view-event').find('.modal-body h4 b').text(data.user_name);
                    $('#view-event').find('.modal-body #update_id').val(data.id);
                    $('#view-event').find('.modal-body #groups-event').val(data.group);
                    $('#view-event').find('.modal-body #room-event').val(data.room);
                    $('#view-event').find('.modal-body .pick-a-color').val(data.color);
                },
                header: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,today'
                },
                navLinks: true, // can click day/week names to navigate views
                weekNumbers: true,
                weekNumbersWithinDays: true,
                weekNumberCalculation: 'ISO',

                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events:data.value
            });
            }
        }
    });
    
    
});