@extends ('layout.app')

@section ('content')

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                
                <div class="row align-items-center">
                    
                    <div class="col">
                        <div class="mt-5">
                            <h3 class="card-title float-left mt-2">Edit team member details</h3>
                        </div>
                    </div>
                </div>
            </div>
                <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-6">
                    <h1></h1>
                  
                        <form method="Post" action="{{ url('/admin/team/update') }}" name="post" enctype="multipart/form-data">
                           @csrf
                           @method('PUT')  
                        
                   

                            <div class="form-group">
                                <label class="control-label" for="title">Name:</label>
                                <input type="text" name="name" class="form-control"  placeholder="Post Title ..."  value="">
                            
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="author">Role:</label>
                                <input type="text" name="role" class="form-control" placeholder="Post author ..." value="">
                            
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="author">Description:</label>
                                <input type="text" name="description" class="form-control" placeholder="Post author ..."value="">
                            
                            </div>

            

                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Save and post</button>

                                <a href="/admin/team" class="btn btn-primary">Back</a>
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

