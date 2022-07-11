<div>
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Aftaler</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">aftaler</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

       <div class="content">
      <!--  @if(session()->has('message'))
        <div class="alert alert-success  ml-5 mr-5 " role="alert">
        <h4 class="alert-heading"><i class="fa fa-check-circle mr-1"></i>{{session('message')}}</h4>
      
      </div>
       @endif -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
             <div  class="d-flex justify-content-end mb-2">
                <a href=" {{route('admin.appointment.create')}}">
                  <button class="btn btn-primary "><i class="fa fa-plus-circle mr-1"></i>oppreter ny aftaler</button>
              </a>
            </div>
            <div class="card">
              <div class="card-body">
                <table class="table table-hover">
            
                <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col"> Kunden Navn</th>
                            <th scope="col">Datoen</th>
                             <th scope="col">Tid</th>
                             <th scope="col">status</th>
                            <th scope="col">valgmuligheder</th>
                          </tr>
                </thead>
                <tbody>
                     <tr>
                 <th scope="row">#</th>
                  <td>name</td>
                  <td>date</td>
                  <td>Time</td>
                  <td>options</td>
                  <td>
                    option
                  <td>
                  <td>
                      <a href="#">
                          <i  wire:click.prevent="" class="fa fa-edit text mr-2"></i>
                      </a>
                         <a href="#">
                              <i  wire:click.prevent ="" class="fa fa-trash text-danger" ></i>
                         </a>
                  </td>

                     </tr>
            
            
           
            </tbody>
            
          </table>
          <div class="card-footer m-2">
        

          </div>
              </div>


            </div>

            </div><!-- /.card -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


 </div>
    <!--modal-form-->
    <!-- Button trigger modal -->


