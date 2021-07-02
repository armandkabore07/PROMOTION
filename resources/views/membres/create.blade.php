<x-master-layout >
    <div  style=" background-color: sylver; background-size: cover; background-image: url('images/promo.jpg'); " class="overflow-auto" >
<br>

         <!-- Card  height:85vh;  overflow-auto   style="height:80vh;" -->
         <div class="card mx-xl-5  shadow-lg p-3 mb-5 bg-white rounded" >
            <!-- Card body -->
            <div class="card-body">
                
                
                    <div class="row titre">
                        <h3>Enregistrement d'un membre</h3>
                    </div>
                    <br>
                    <div class="row">
                        <a href="{{ route('membres.index') }} " class="btn btn-success"><i class="fa fa-angle-left"></i>  Retour</a>
                    </div>
                   

             {{--      @if ($errors->any())
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
                    @endif --}} 
                  
            
                    <form action="{{  route('membres.store')}} " method="POST" >
                        @csrf
                        <div class="row">
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <strong>Telephone:</strong>
                                    <input type="number" name="telephone" value="{{ old('telephone') ? old('telephone') : '' }}"
                                        class="form-control" placeholder="Telephone">
                                        @if ($errors->any('telephone'))
                                        <span class="text-danger" >{{$errors->first('telephone') }} </span>
                                        @endif
                                </div>
                            </div>
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <strong>Matricule:</strong>
                                    <input type="text" name="matricule" value="{{ old('matricule') ? old('matricule') : '' }}"
                                        class="form-control" placeholder="Matricule">
                                        @if ($errors->any('matricule'))
                                        <span class="text-danger" >{{$errors->first('matricule') }} </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <strong>Nom:</strong>
                                    <input type="text" name="nom" value="{{ old('nom') ? old('nom') : '' }}" class="form-control"
                                        placeholder="Nom">
                                        @if ($errors->any('nom'))
                                        <span class="text-danger" >{{$errors->first('nom') }} </span>
                                       @endif
                                </div>
                            </div>
            
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <strong>Prenom:</strong>
                                    <input type="text" name="prenom" value="{{ old('prenom') ? old('prenom') : '' }}" class="form-control"
                                        placeholder="Prenom">
                                        @if ($errors->any('prenom'))
                                        <span class="text-danger" >{{$errors->first('prenom') }} </span>
                                    @endif
                                </div>
                            </div>
            
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    <input type="email" name="email" value="{{ old('email') ? old('email') : '' }}" class="form-control"
                                        placeholder="name@example.com">
                                        @if ($errors->any('email'))
                                        <span class="text-danger" >{{$errors->first('email') }} </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <strong>Service:</strong>
                                    <input type="text" name="service" value="{{ old('service') ? old('service') : '' }}"
                                        class="form-control" placeholder="Service">
                                        @if ($errors->any('service'))
                                        <span class="text-danger" >{{$errors->first('service') }} </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <strong>Montant:</strong>
                                    <input type="number" name="montant" value="{{ old('montant') ? old('montant') : '' }}"
                                        class="form-control" placeholder="Montant">
                                        @if ($errors->any('montant'))
                                        <span class="text-danger" >{{$errors->first('montant') }} </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <strong>Role:</strong>
                                     <select class="form-control" name="role">
                                             <option value="">Aucun</option>
                                             @foreach($roles as $role) 
                                                     <option value="{{$role->name}}" >
                                                    {{$role->name}}
                                                </option>
                                             @endforeach
                                    </select>
                                    @if ($errors->any('role'))
                                        <span class="text-danger" >{{$errors->first('role') }} </span>
                                    @endif
                                </div>
                            </div>
            
                        </div>
            
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>Enregistrer</button>
                    </form>
             
            
               




            </div>
            <!-- Card body -->
        </div>
        <!-- Card -->
    
<br>
    </div>
</x-master-layout>