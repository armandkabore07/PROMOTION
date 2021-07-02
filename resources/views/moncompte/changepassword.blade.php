<x-master-layout>
    <div  style="height:85vh; background-color: white; background-size: cover; background-image: url('images/promo3.jpg'); " >
<br>

         <!-- Card -->
         <div class="card mx-xl-5 overflow-auto shadow-lg p-3 mb-5 bg-white rounded"  style="height:80vh;">
            <!-- Card body -->
            <div class="card-body">
                
                
                    <div class="row titre">
                        <h3>Modification de mon mot de passe</h3>
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
                   

                    @if ($errors->any())
                        <br>
                        <div class="alert alert-danger col-xs-7 col-sm-7 col-md-7" role="alert">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        <p>{{ $error }} </p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                  
                    
                    <form action="{{  route('mdp.update',$id)}} " method="POST" style="">
                        @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <strong>Nouveau mot de passe:</strong>
                                    <input type="password" name="password" value=""
                                         placeholder="Nouveau mot de passe" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password" />
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <strong>Confirmer le mot de passe:</strong>
                                    <input type="password" name="password_confirmation" value=""
                                        class="form-control @error('password') is-invalid @enderror" placeholder="Confirmation du mot de passe"  required />
                                </div>
                            </div>
              
                        </div>
            
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>Modifier</button>
                    </form>
             
            
               




            </div>
            <!-- Card body -->
        </div>
        <!-- Card -->
    
<br>
    </div>
</x-master-layout>