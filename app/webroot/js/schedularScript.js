var d = new Date();
alert(d);
var month = d.getMonth()+1;
 alert(month);
	var day = d.getDate();
	var todayDate = d.getFullYear() + '-' + ((''+month).length<2 ? '0' : '') + month + '-' +((''+day).length<2 ? '0' : '') + day;
	var response = '';

	var initialLocaleCode = 'en';
		if(response == ''){
			//$.blockUI({ message: $('#domMessage') });
			$('#calendar').fullCalendar({
				header: {
					left: 'prev,next',
					center: 'title',
					right: 'month,agendaWeek,agendaDay,listMonth'
				},
				defaultDate: todayDate,
				locale: initialLocaleCode,
				buttonIcons: false,
				weekNumbers: true,
				navLinks: true,
				editable: true,
				eventLimit: true,
				events: <?php echo $finalEncodedCalender; ?>,
				eventClick:  function(event, jsEvent, view) {
			        //alert('hi');
			        //set the values and open the modal
					//$.unblockUI({ message: $('#domMessage') });

			        // $("#eventInfo").html(event.description);
			        // $("#eventLink").attr('href', event.url);
			        // $("#eventContent").dialog({ modal: true, title: event.title });
			    }
			});
		}