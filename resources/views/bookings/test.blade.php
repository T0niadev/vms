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
                <div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
                    <div class="dhx_cal_navline">
                        <div class="dhx_cal_prev_button">&nbsp;</div>
                        <div class="dhx_cal_next_button">&nbsp;</div>
                        <div class="dhx_cal_today_button"></div>
                        <div class="dhx_cal_date"></div>
                        <div class="dhx_cal_tab" name="day_tab"></div>
                        <div class="dhx_cal_tab" name="week_tab"></div>
                        <div class="dhx_cal_tab" name="month_tab"></div>
                    </div>
                    <div class="dhx_cal_header"></div>
                    <div class="dhx_cal_data"></div>
                </div>
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
	<script type="text/javascript">

        scheduler.init("scheduler_here");

    </script>

@endsection