
<x-master-layout>
    <div  style=" background-color: white; background-size: cover; " class="overflow-auto">
<br>

         <!-- Card -->
         <div class="card mx-xl-5  shadow-lg p-3 mb-5 bg-white rounded "  >
            <!-- Card body -->
            <div class="card-body">
                
                
                <div class="container-fluid">
                    <div class="row titre">
                        <h3>Détail d'un membre   </h3>  
                    </div>
                   
                <br>
                    <div class="row">
                        <a href="{{route('membres.index')}} " class="btn btn-warning"><i class="fa fa-angle-left"></i>    Retour</a>   
                    </div> 
                    <br>
                    
                        @if($message= Session::get('success'))
                         <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <p>{{ $message }} @if($newmdp=Session::get('newmdp')) Nouveau mot de passe: {{$newmdp}} @endif</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        @endif

                     
                    <div class="card" style="width: 80rem;"  class="shadow-lg p-3 mb-5 bg-white">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Telephone:</strong>
                                        {{ $member->telephone }}
                                 </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Matricule:</strong>
                                        {{ $member->matricule }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nom:</strong>
                                        {{ $member->nom}}
                                    </div>
                                </div>
                        
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Prenom:</strong>
                                        {{ $member->prenom }}
                                 </div>
                                </div>
                
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        {{ $member->email }}
                                 </div>
                                </div>
                
                               
                
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Service:</strong>
                                        {{ $member->service }}
                                 </div>
                                </div>
                
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Date d'adhesion:</strong>
                                        {{date('d-m-Y', strtotime( $member->created_at))}}
                                 </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Solde initial:</strong>
                                        {{ $member->soldeInitial}}
                                 </div>
                           </div>  

                           <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Role:</strong>
                                @if(!empty($member->getRoleNames()))
                                    @foreach($member->getRoleNames() as $v)
                                       <label class="badge badge-success">{{ $v }}</label>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!--
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Role2:</strong>
                                @if(!empty($member->roles))
                                <label class="badge badge-success">{{ $member->roles->first()->name }}</label>
                                @endif
                            </div>
                        </div>  -->

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                        <a href="{{route('membres.reinitialisation',$member->id)}} " class="btn btn-warning"><i class="fa fa-lock"></i>   Reinitialiser le mot de passe <br> </a>
                          </div>
                          <p>NB: Le nouveau mot de passe sera transmis par mail au membre</p>
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