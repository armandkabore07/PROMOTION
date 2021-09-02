
<x-master-layout>
 <!--<div  style="height:85vh; background-color: white; background-size: cover; background-image: url('images/promo3.jpg'); " >-->
 <div  style=" background-color: sylver; background-size: cover" class="overflow-auto" >
 
<br>

         <!-- Card -->
         <div class="card mx-xl-5  shadow-lg p-3 mb-5 bg-white rounded" >
        <!-- <div class="card mx-xl-5 overflow-auto shadow-lg p-3 mb-5 bg-white rounded "  style="height:80vh;">-->
            <!-- Card body -->
            <div class="card-body">
                
                
                <div class="container-fluid">
                    <div class="row titre">
                        <h3>Mon profil  </h3>  
                    </div>
                    <br>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <p>{{ $message }} </p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                    @endif
                   
                <br>
                    <div class="row">
                        <a href="{{route('moncompte.edit',$member->id)}} " class="btn btn-warning"><i class="fa fa-pencil"></i>    Modifier</a>   
                    </div> 
                    <br>
                    
                        
                    <div class="card" style=""  class="shadow-lg p-3 mb-5 bg-white">
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