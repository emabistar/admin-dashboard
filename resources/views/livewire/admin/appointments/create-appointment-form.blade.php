<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1 class="m-0 text-dark">Appointments</h1> -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="">Aftaler</a></li>
                        <li class="breadcrumb-item active">Oprette</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form wire:submit.prevent="createAppointment">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tilføj ny aftale</h3>
                            </div>

                            <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="client">Kunden:</label>
                                                <select class="form-control" wire:model.defer="state.client_id">
                                                    <option value="">Valg kunden</option>
                                                    @foreach($clients as $client)
                                                    <option value="{{$client->id}}">{{$client->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
 
                                   <div class="row">
                                        <div class="col-sm-6">
                                            <div wire:ignore class="form-group " >   
                                                <label for="appointmentDate">Datoen</label>
                                                 <div class="input-group mb-3">
                                                     <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                         <i class="fas fa-calendar"></i></span>
                                                     </div>
                                                    
                                                    <x-datetimepicker wire:model.defer="state.date" id="appointmentDate"/>
                                                 </div>
                                    
                                                       
                                             </div>
                                         </div>
                                          <div class="col-sm-6">
                                                <div wire:ignore class="form-group">
                                                 <label for="appointmentTime">Aftale Tid</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-clock"></i></span>
                                                        </div>
                                                        
                                                         <x-timepicker wire:model.defer="state.time" id="appointmentTime"/>
                                                    </div>
                                                       
                                                </div>
                                        </div>


                                    </div> 
                            </div>           
                                 
                            </div>
                               
                                <div class="row">
                                    <div class="col-md-12">
                                        <div wire:ignore  class="form-group">
                                            <label for="note">Nota:</label>
                                            <textarea  id="note"  data-note="@this" wire:model.defer="state.note" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                               <div class="card-footer">
                                <button type="button" class="btn btn-secondary" wire:click.prevent="cancelForm"><i class="fa fa-times mr-1"></i> Annuller</button>
                                <button  id="submit" type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>Gem</button>
                              </div>
                            </div>
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('js')

   


     <script >
     
         ClassicEditor
                    .create( document.querySelector( '#note') )
                     .then( editor => {
                             
                          // This code sent many requst to the server any typing   not optimal        
                         // editor.model.document.on('change:data', ()=>{
                         //     let note = $('#note').data('note');
                         //     eval(note).set('state.note',editor.getData());
                            


                         // });
                       document.querySelector('#submit').addEventListener('click',function(){
                         let note = $('#note').data('note');
                        eval(note).set('state.note',editor.getData());
                       })

                    }).catch( error => {
                                        console.error( error );
                 });
     </script>

    @endpush
</div>