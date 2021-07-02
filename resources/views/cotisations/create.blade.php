<x-master-layout>
    <div  style="background-color: sylver; background-size: cover;  " class="overflow-auto">
<br>

         <!-- Card -->
         <div class="card mx-xl-5  shadow-lg p-3 mb-5 bg-white rounded" >
            <!-- Card body -->
            <div class="card-body">
                
                
                    <div class="row titre">
                        <h3>Enregistrement d'une cotisation</h3>
                    </div>
                    <br><br>
                    <div class="row">
                        <a href="{{ route('cotisations.index') }} " class="btn btn-success"><i class="fa fa-angle-left"></i>  Retour</a>
                    </div>
                    <br>
                   
         {{--          @if ($errors->any())
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
                  
            
                    <form action="{{  route('cotisations.store',$member->id)}} " method="POST" >
                        @csrf
                        
                        <div class="row">
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <strong>Telephone:</strong>
                                    <input type="number" name="telephone" value="{{ old('telephone') ? old('telephone') : $member->telephone }}"
                                        class="form-control" placeholder="Telephone" disabled="disabled">
                                </div>
                            </div>
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <strong>Matricule:</strong>
                                    <input type="text" name="matricule" value="{{ old('matricule') ? old('matricule') :  $member->matricule }}"
                                        class="form-control" placeholder="Matricule" disabled="disabled">
                                </div>
                            </div>
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <strong>Nom:</strong>
                                    <input type="text" name="nom" value="{{ old('nom') ? old('nom') :  $member->nom }}" class="form-control"
                                        placeholder="Nom" disabled="disabled">
                                </div>
                            </div>
            
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <strong>Prenom:</strong>
                                    <input type="text" name="prenom" value="{{ old('prenom') ? old('prenom') :  $member->prenom }}" class="form-control"
                                        placeholder="Prenom" disabled="disabled">
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
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>Enregistrer</button>
                    </form>
             
            
               




            </div>
            <!-- Card body -->
        </div>
        <!-- Card -->
    
<br>
    </div>
</x-master-layout>