
<x-master-layout>
    <div  style="height:85vh; background-color: white; background-size: cover; background-image: url('images/promo.jpg'); " >
<br>

         <!-- Card -->
         <div class="card mx-xl-5 overflow-auto shadow-lg p-3 mb-5 bg-white rounded "  style="height:80vh;">
            <!-- Card body -->
            <div class="card-body">
                
                
                <div class="container-fluid">
                    <div class="row titre">
                        <h3>Détail des parametres</h3>
                    </div>
                   
                <br>
                    <div class="row">
                        <a href="{{route('parametres.index')}} " class="btn btn-warning"><i class="fa fa-angle-left"></i>    Retour</a>
                    </div> 
                    <br>
                    
                        
                    <div class="card" style="width: 80rem;"  class="shadow-lg p-3 mb-5 bg-white">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Montant Adhesion::</strong>
                                        {{ $param->montantAdhesion }} FCFA
                                 </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Montant Cotisation:</strong>
                                        {{ $param->montantCotisation }} FCFA
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Date d'enregistrement:</strong>
                                        {{$param->created_at}}
                                    </div>
                                </div>
                        
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Date de modification:</strong>
                                        {{ $param->updated_at }}
                                 </div>
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