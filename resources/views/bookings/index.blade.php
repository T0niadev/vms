@extends ('layout.app')


@section ('content')
	<div class="page-wrapper">
				
		<div class="content container-fluid">
			<div class="page-header">
				
				<div class="row align-items-center">
					
					<div class="col">
						<div class="mt-5">
							<h3 class="card-title float-left mt-2">Bookings</h3>
							<a href="{{ url('/booking/create') }}" class="btn btn-primary float-right veiwbutton ">Book date</a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
			   <div id="calendar" style="width:100%; height: 50%"></div>
			</div>
		</div>
		<div id="delete_asset" class="modal fade delete-modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body text-center"> <img src="assets/img/sent.png" alt="" width="50" height="46">
						<h3 class="delete_class">Are you sure want to delete this Asset?</h3>
						<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
							<button type="submit" class="btn btn-danger">Delete</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@push('scripts')
        
	    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
		<link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
		<link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet" />
	
		
		<script> 
		    $("body").bind("ajaxSend", function(elm, xhr, s){
			if (s.type == "POST") {
				xhr.setRequestHeader('X-CSRF-Token', getCSRFTokenValue());
			}
			});
            
                var calendarEl = document.getElementById('calendar');
				var events = [];  
                var calendar = new FullCalendar.Calendar(calendarEl, {
					headerToolbar:{
						left:'prev,next today',
						centre: 'title',
						right:'dayGridMonth,timeGridWeek,timeGridDay'
					},
                    initialView: 'timeGridWeek',
					
					
				
                    slotMinTime: '8:00:00',
                    slotMaxTime: '19:00:00',
                    events: @json($events),
					editable:true,

					  // Deleting The Event
					    eventContent: function(info) {
							var eventTitle = info.event.title;
							var eventStart = info.event.start;
							var eventEnd = info.event.end.toLocaleTimeString();
							console.log(eventStart);
							
							var eventElement = document.createElement('div');
							eventElement.innerHTML = '<span style="cursor: pointer;">❌</span> ' + eventTitle + "</br>" + eventStart  + ' - ' + eventEnd;

							eventElement.querySelector('span').addEventListener('click', function() {
								if (confirm("Are you sure you want to delete this event?")) {
									var eventId = info.event.id;
									$.ajax({
										method: 'delete',
										url: '/delete/booking/' + eventId,
										headers: {
											'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
										},
										success: function(response) {
											console.log('Event deleted successfully.');
											calendar.refetchEvents(); // Refresh events after deletion
										},
										error: function(error) {
											console.error('Error deleting event:', error);
										}
									});
								}
							});
							return {
								domNodes: [eventElement]
							};
						},
						 // Drag And Drop

						eventDrop: function(info) {
							var eventId = info.event.id;
							var newStartDate = info.event.start;
							var newEndDate = info.event.end || newStartDate;
							var newStartDateUTC = newStartDate.toISOString().slice(0, 10);
							var newEndDateUTC = newEndDate.toISOString().slice(0, 10);

							$.ajax({
								method: 'put',
								url: `/update/booking/${eventId}`,
								data: {
									'_token': "{{ csrf_token() }}",
									start_date: newStartDateUTC,
									end_date: newEndDateUTC,
								},
								success: function() {
									console.log('Event moved successfully.');
								},
								error: function(error) {
									console.error('Error moving event:', error);
								}
						});

						


            },

					
                });
                calendar.render();
                
				document.getElementById('searchButton').addEventListener('click', function() {
					var searchKeywords = document.getElementById('searchInput').value.toLowerCase();
					filterAndDisplayEvents(searchKeywords);
				});


				function filterAndDisplayEvents(searchKeywords) {
					$.ajax({
						method: 'GET',
						url: `/events/search?title=${searchKeywords}`,
						success: function(response) {
							calendar.removeAllEvents();
							calendar.addEventSource(response);
						},
						error: function(error) {
							console.error('Error searching events:', error);
						}
					});
				}


				
         
        </script>   
    @endpush

@endsection