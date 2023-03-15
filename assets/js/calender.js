$(function() {

	"use strict";

        var today = new Date();
       // var todaydate = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var todaydate = new moment(today).format("YYYY-MM-DD");
        var created_by = 1;
        $.ajax({

            type: 'post',

            url: 'get-event-list',

            data: "created_by ="+ created_by,

            success: function(eventList){
            var eventsList = JSON.parse(eventList);              

 	$('#calendar1').fullCalendar({
 		header: {

 			left: 'prev,next today',

 			center: 'title',

 			right: 'month,agendaWeek,agendaDay'

 		},
 		defaultDate: todaydate,
 		navLinks: true, // can click day/week names to navigate views
 		selectable: true,
 		selectHelper: true,
 		select: function(start, end) { 
                    var d_date = new moment(start).format("YYYY-MM-DD");
                    if(today.getDate() <= new moment(start).format('DD') && (today.getMonth()+1) == new moment(start).format('MM')){

                    $("#myMeeting"). modal('show');                     

                    $("#meeting_start_date").val(d_date)

                    $("#meeting_end_date").val(d_date)



                    }



 		},

 		editable: true,

 		eventLimit: true, // allow "more" link when too many events

 		events:eventsList 

 	});

     }

        });

});

