// window.onerror = function(errorMsg) {
//     $('#console').html($('#console').html()+'<br>'+errorMsg)
// }*/

$.datetimepicker.setLocale('en');

// $('#datetimepicker').datetimepicker({value:'', format: $("#datetimepicker_format_value").val()});
// console.log($('#datetimepicker_format').datetimepicker('getValue'));

// $("#datetimepicker_format_change").on("click", function(e){
//     $("#datetimepicker_format").data('xdsoft_datetimepicker').setOptions({format: $("#datetimepicker_format_value").val()});
// });
// $("#datetimepicker_format_locale").on("change", function(e){
//     $.datetimepicker.setLocale($(e.currentTarget).val());
// });

$('#datetimepicker').datetimepicker({
    dayOfWeekStart : 1,
    lang:'en',
    startDate:  'yyyy/mm/dd'
});
$('#datetimepicker').datetimepicker({value:'yyyy,mm,dd',step:20});

$('#datetimepicker-end').datetimepicker({
    dayOfWeekStart : 1,
    lang:'en',
    startDate:  'yyyy/mm/dd'
});
$('#datetimepicker-end').datetimepicker({value:'yyyy,mm,dd',step:20});

// $('#datetimepicker-start-update').datetimepicker({
//     dayOfWeekStart : 1,
//     lang:'en',
// });
// $('#datetimepicker-start-update').datetimepicker({value:'yyyy/mm/dd',step:20});

$('#datetimepicker-end-update').datetimepicker({
    dayOfWeekStart : 1,
    lang:'en',
});
//$('#datetimepicker-end-update').datetimepicker({value:'yyyy,mm,dd',step:20});

$('#datetimepicker-from').datetimepicker({
    dayOfWeekStart : 1,
    lang:'en',
    startDate:  'yyyy/mm/dd'
});
// $('#datetimepicker-from').datetimepicker({value:'yyyy/mm/dd h:m',step:20});

$('#datetimepicker-to').datetimepicker({
    dayOfWeekStart : 1,
    lang:'en',
    startDate:  'yyyy/mm/dd'
});
// $('#datetimepicker-to').datetimepicker({value:'2016/12/15 05:03',step:20});