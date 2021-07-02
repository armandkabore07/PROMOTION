
<x-master-layout>
    <div  style="background-color: white; background-size: cover;  "  class="overflow-auto">
<br>

         <!-- Card -->
         <div class="card mx-xl-5  shadow-lg p-3 mb-5 bg-white rounded "  >
            <!-- Card body -->
            <div class="card-body">
                
                
                <div class="container-fluid">
                    <div class="row titre">
                        <h3>Détail de la publication   </h3>  
                    </div>
                 
                <br>
                    <div class="row">
                        <a href="{{route('informations.index')}} " class="btn btn-warning"><i class="fa fa-angle-left"></i>    Retour</a>   
                    </div> 
                    <br>
                    

                     
                    <div class="card" style="width: 80rem;"  class="shadow-lg p-3 mb-5 bg-white">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                    <label class="badge badge-success">{{ $information->type->libelle }}</label>
                                        <h3>
                                        {{ $information->title }}
                                        </h3>
                                 </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        {{ $information->body }}
                                    </div>
                                </div>
                                
                                
                                 
                                
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
            
                                        <strong>Date de publication:</strong>
                                        {{ $information->created_at }} <span>@if($information->montant_depense >0) | <strong> Dépenses:</strong> {{$information->montant_depense}} FCFA @endif</span>
                                 </div>
                                </div>

                
                            </div>
                        
                        </div>
                      </div>
                
                   
                  </div>




            </div>
            <!-- Card body -->
        </div>
        <!-- Card -->
    
<br>
    </div>
</x-master-layout>