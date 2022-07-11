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

                              
                                  
                               </div>
                                   
                                      
                            </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Datoen:</label>
                                            <div  wire:ignore class="input-group date" id="appointmentDate" autocomplete ="off"data-target-input="nearest" data-appointmentdate ="@this">
                                                <input   id="appointmentDateInput" type="text" class="form-control datetimepicker-input" data-target="#appointmentDate">
                                                <div class="input-group-append" data-target="#appointmentDate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Aftalen Tid:</label>
                                            <div  wire:ignore class="input-group date" id="appointmentTime" data-target-input="nearest" data-appointment_time ="@this">
                                                <input  id="appointmentTimeInput"type="text" class="form-control datetimepicker-input" data-target="#appointmentTime">
                                                <div class="input-group-append" data-target="#appointmentTime" data-toggle="datetimepicker">
                                                    <div class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
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
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-secondary" wire:click.prevent="cancelForm"><i class="fa fa-times mr-1"></i> Annuller</button>
                                <button  id="submit" type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>Gem</button>
                            </div>
                        </div>
                    </form>
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
      $('#appointmentDate').datetimepicker({
        format:'L',
      });

      $('#appointmentDate').on('change.datetimepicker',function(){
        let date = $(this).data('appointmentdate');
        eval(date).set('state.date',$('#appointmentDateInput').val());
      });

      $('#appointmentTime').datetimepicker({
        format:'LT',
      });
      $('#appointmentTime').on('change.datetimepicker',function(){
        let time = $(this).data('appointment_time');
        eval(time).set('state.time',$('#appointmentTimeInput').val());
      });
    });


    
</script>

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