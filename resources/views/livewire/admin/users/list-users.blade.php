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
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>
                  <a href="#">
                      <i  class="fa fa-edit text mr-2"></i>
                  </a>
                     <a href="#">
                          <i class="fa fa-trash text-danger" ></i>
                     </a>
              </td>
            </tr>
           
  </tbody>
</table>
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
        <div class="modal fade" id="userForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tilføj new bruger</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                

            <form>
                <div class="form-group">
                    <label for="name">Navn</label>
                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Indtast navn">
                    
                  </div>
                  <div class="form-group">
                    <label for="email">Email adresse</label>
                    <input type="email" class="form-control" id="email1" aria-describedby="emailHelp" placeholder="Indtast email">
                    
                  </div>
                  <div class="form-group">
                    <label for="password">Adgangskode</label>
                    <input type="password" class="form-control" id="passwod" placeholder="Adgangskode">
                  </div>
                  <div class="form-group">
                    <label for="passwordConfirmation">Bekraft adgangskode</label>
                    <input type="passwordConfirmation" class="form-control" id="passwordConfirmation" placeholder="Bekraft Adgangskode">
                  </div>
                 
            </form>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuller</button>
                <button type="button" class="btn btn-primary">Gem</button>
              </div>
            </div>
          </div>
        </div>
</div>
