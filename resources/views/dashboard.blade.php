@extends ('layout.app')

@section ('content')

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                
                <div class="row align-items-center">
                    
                    <div class="col">
                        <div class="mt-5">
                            <h3 class="card-title float-left mt-2">Dashboard</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-2">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="nc-icon nc-money-coins text-warning"></i>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="numbers">
                                        <p class="card-category">{{ __('Total Number of Customers') }}</p>
                                        <h4 class="card-title">100</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-refresh"></i> {{ __('customers till date') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-3">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="nc-icon nc-map-big text-success"></i>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="numbers">
                                        <p class="card-category">{{ __('Total Rooms') }}</p>
                                        <h4 class="card-title">200</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-calendar-o"></i> {{ __('Total rooms') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-3">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="nc-icon nc-pin-3 text-danger"></i>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="numbers">
                                        <p class="card-category">{{ __('Booked Rooms') }}</p>
                                        <h4 class="card-title">100</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-clock-o"></i> {{ __('Booked rooms') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-3">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="nc-icon nc-satisfied text-primary"></i>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="numbers">
                                        <p class="card-category">{{ __('Available Rooms') }}</p>
                                        <h4 class="card-title">100</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-refresh"></i> {{ __('Total Number of rooms available') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-6">
                    <h1></h1>
                  
                       


                      
                    </div>
                    <!-- /.col-sm-4 -->
                </div>
                <!-- /.row -->
            
            </div>
        </div>    
    </div>

@endsection

