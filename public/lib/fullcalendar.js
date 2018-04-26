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
                    $('#view-event').find('.modal-body h5').text(data.id);
                    $('#view-event').find('.modal-body #title_update').val(data.title);
                    $('#view-event').find('.modal-body #email_update').val(data.email);
                    $('#view-event').find('.modal-body .end_update').val(data.end);
                    $('#view-event').find('.modal-body h4 b').text(data.user_name);
                    $('#view-event').find('.modal-body #update_id_update').val(data.id);
                    $('#view-event').find('.modal-body #groups-event_update').val(data.group);
                    $('#view-event').find('.modal-body #room-event_update').val(data.room);
                    $('#view-event').find('.modal-body #pick-color_update').val(data.color);

                    var strDateTime = data.start;
                    var myDate = new Date(strDateTime);
                    $('.start_update').val(myDate.toLocaleString('en-GB'));
                    endDateTime = data.end;
                    endDate = new Date(endDateTime);
                    $('.end_update').val(endDate.toLocaleString('en-GB'));
                    // alert(endDate.toLocaleString('en-GB'));
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