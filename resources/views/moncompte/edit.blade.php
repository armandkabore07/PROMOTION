<x-master-layout>
      <!--<div  style="height:85vh; background-color: white; background-size: cover; background-image: url('images/promo3.jpg'); " >-->
    <div  style=" background-color: sylver; background-size: cover" class="overflow-auto" >
<br>

         <!-- Card -->
         <div class="card mx-xl-5  shadow-lg p-3 mb-5 bg-white rounded" >
        <!-- <div class="card mx-xl-5 overflow-auto shadow-lg p-3 mb-5 bg-white rounded "  style="height:80vh;">-->
            <!-- Card body -->
            <div class="card-body">
                
                
                    <div class="row titre">
                        <h3>Modification de mes informations</h3>
                    </div>
                    <br>
                    <div class="row">
                        <a href="{{route('moncompte.show',$member->id)}} " class="btn btn-warning"><i class="fa fa-angle-left"></i> Retour</a>
                    </div>
                   

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
                  
                    
                    <form action="{{  route('moncompte.update',$member->id)}} " method="POST" style="">
                        @method('PATCH')
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
                                    <input type="text" name="matricule" value="{{ old('matricule') ? old('matricule') : $member->matricule }}"
                                        class="form-control" placeholder="Matricule" disabled="disabled">
                                </div>
                            </div>
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <strong>Nom:</strong>
                                    <input type="text" name="nom" value="{{ old('nom') ? old('nom') : $member->nom }}" class="form-control"
                                        placeholder="Nom">
                                </div>
                            </div>
            
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <strong>Prenom:</strong>
                                    <input type="text" name="prenom" value="{{ old('prenom') ? old('prenom') : $member->prenom}}" class="form-control"
                                        placeholder="Prenom">
                                </div>
                            </div>
            
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    <input type="email" name="email" value="{{ old('email') ? old('email') : $member->email }}" class="form-control"
                                        placeholder="name@example.com" disabled="disabled">
                                </div>
                            </div>
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <strong>Service:</strong>
                                    <input type="text" name="service" value="{{ old('service') ? old('service') : $member->service }}"
                                        class="form-control" placeholder="Service">
                                </div>
                            </div>
{{--
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <strong>Solde initial:</strong>
                                    <input type="text" name="montant" value="{{ old('montant') ? old('montant') : $member->soldeInitial }}"
                                        class="form-control" placeholder="montant" disabled="disabled">
                                </div>
                            </div>
  --}}         
            
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