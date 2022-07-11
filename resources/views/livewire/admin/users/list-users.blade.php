<div>
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Bruger</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Bruger</li>
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
                  <button class="btn btn-primary " wire:click.prevent="addnew"><i class="fa fa-plus-circle mr-1"></i>tilføj ny bruger</button>
            </div>
            <div class="card">
              <div class="card-body">
                <table class="table table-hover">
            
                <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Navn</th>
                            <th scope="col">Email</th>
                            <th scope="col">valgmuligheder</th>
                          </tr>
                </thead>
                <tbody>
            
              @foreach($users as $user)
                <tr>

                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>
                      <a href="#">
                          <i  wire:click.prevent="editUser({{$user}})" class="fa fa-edit text mr-2"></i>
                      </a>
                         <a href="#">
                              <i  wire:click.prevent ="deleteUserConfirmed({{$user->id}})" class="fa fa-trash text-danger" ></i>
                         </a>
                  </td>
                </tr>
                @endforeach
           
            </tbody>
            
          </table>
          <div class="card-footer m-2">
            {{$users->links()}}

          </div>
              </div>


            </div>

            </div><!-- /.card -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!--modal-form-->
    <!-- Button trigger modal -->


<!-- Modal -->
        <div class="modal fade" id="userForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
          <div class="modal-dialog" role="document">
            <form autocomplete="off" wire:submit.prevent="{{$editUserModalShow ? 'upadateUser':'createUser'}}">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                @if($editUserModalShow )
                  <span class="btn-warning p-2">Rediger bruger</span> 
                @else
                  <span>Tilføj new bruger  </span>
                
                @endif
            </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">           
                <div class="form-group">
                    <label for="name">Navn</label>
                    <input type="text" wire:model.defer="state.name" 
                    class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="textHelp" placeholder="Indtast navn">
                    @error('name')
                      <div class="invalid-feedback">
                        {{$message}}

                    </div>

                    @enderror
                    
                  </div>
                  <div class="form-group">
                    <label for="email">Email adresse</label>
                    <input type="text" wire:model.defer="state.email" class="form-control
                    @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" placeholder="Indtast email">

                    @error('email')

                    <div class="invalid-feedback">
                        {{$message}}

                    </div>
                    @enderror
                    
                  </div>
                  <div class="form-group">
                    <label for="password">Adgangskode</label>
                <input type="password" wire:model.defer="state.password" class="form-control @error('password') is-invalid @enderror "id="password" placeholder="Indtast adgangskode">
                    
                     @error('password')

                    <div class="invalid-feedback">
                        {{$message}}

                    </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="passwordConfirmation">Bekraft adgangskode</label>
                    <input type="password"  wire:model.defer="state.password_confirmation"class="form-control  @error('password_confirmation') is-invalid @enderror " id="passwordConfirmation" placeholder="Bekraft Adgangskode">
                     @error('password_confirmation')

                    <div class="invalid-feedback">
                        {{$message}}

                    </div>
                    @enderror
                  </div>
                 
            

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Annuller</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>Gem</button>
              </div>
              </form>
            </div>
          </div>

       



  </div>
         <!---Delete Confirm Modal-->
         
     <div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">Bekræfte slette
                            </div>
                            <div class="modal-body">
                                <h4>Er du sikker på, at du ønsker at slette denne bruger ?</h4>
                            </div>
                            <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Annuller</button>
                                <button type="button" class="btn btn-danger"><i wire:click.prevent="deleteUser()" class="fa fa-trash mr-1"></i></button>
                            </div>
                     </div>
                </div>
          </div>
     
@push('js')

 <script>
    window.addEventListener('show-form',event=>{
        $('#userForm').modal('show')
    });
    
</script>
 <script>

$(document).ready(function(){
 toastr.options  = {
  "positionClass": "toast-top-center mt-5",
  "progressbar": true,
 }
 window.addEventListener('hide-form', event=>{
     $('#userForm').modal('hide')
     toastr.success(event.detail.message,'Success')
  });
});
window.addEventListener('alert', event=>{
     toastr.success(event.detail.message,'Success')

});

</script>
<script>
  window.addEventListener('showDeleteModal',event=>{
      $('#deleteConfirmModal').modal('show');
  });
</script>

<script>
  window.addEventListener('hide-confirmModal',event=>{
    $('#deleteConfirmModal').modal('hide')
    toastr.success(event.detail.message,'Success')
  });
  
</script>     
@endpush
</div>
