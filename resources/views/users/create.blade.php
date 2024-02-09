@extends ('layout.app')

@section ('content')

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                
                <div class="row align-items-center">
                    
                    <div class="col">
                        <div class="mt-5">
                            <h3 class="card-title float-left mt-2">Add new user</h3>
                        </div>
                    </div>
                </div>
            </div>
                <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-6">
                    <h1></h1>
                  
                        <form method="POST" action="{{ url('/user/store') }}" enctype="multipart/form-data">   
                            @csrf                 
                    

                            <div class="form-group">
                                <label class="control-label" for="title">Name:</label>
                                <input type="text" name="name" class="form-control"  placeholder="name ..."  >
                            
                            </div>


                            <div class="form-group">
                                <label class="control-label" for="title">Email:</label>
                                <input type="email" name="password" class="form-control"  placeholder="email ..."  >
                            
                            </div>


                            <div class="form-group">
                                <label class="control-label" for="title">Password:</label>
                                <input type="password" name="password" class="form-control"  placeholder=""  >
                            
                            </div>
                          

                          

            

                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Save</button>

                                <a href="/user" class="btn btn-primary">Back</a>
                           </div>

                        </form>

                        <br>


                      
                    </div>
                    <!-- /.col-sm-4 -->
                </div>
                <!-- /.row -->
            
            </div>
        </div>    
    </div>

@endsection

