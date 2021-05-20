<x-master-layout>
    <div  style="height:85vh; background-color: sylver; background-size: cover; background-image: url('images/promo3.jpg'); " >
<br>

         <!-- Card -->
         <div class="card mx-xl-5 overflow-auto "  style="height:80vh;">
            <!-- Card body -->
            <div class="card-body">
                
                
                    <div class="row">
                        <h1><strong>Création d'un membre</strong></h1>
                    </div>
                    <div class="row">
                        <a href="{{ route('listemembres') }} " class="btn btn-success"><i class="fa fa-angle-left"></i>Retour</a>
                    </div>
                   

                    @if ($errors->any())
                        <br>
                        <div class="alert alert-danger" role="alert">
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
                  
            
                    <form action="{{  route('register')}} " method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Telephone:</strong>
                                    <input type="number" name="telephone" value="{{ old('telephone') ? old('telephone') : '' }}"
                                        class="form-control" placeholder="Telephone">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Matricule:</strong>
                                    <input type="text" name="matricule" value="{{ old('matricule') ? old('matricule') : '' }}"
                                        class="form-control" placeholder="Matricule">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nom:</strong>
                                    <input type="text" name="nom" value="{{ old('nom') ? old('nom') : '' }}" class="form-control"
                                        placeholder="Nom">
                                </div>
                            </div>
            
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Prenom:</strong>
                                    <input type="text" name="prenom" value="{{ old('prenom') ? old('prenom') : '' }}" class="form-control"
                                        placeholder="Prenom">
                                </div>
                            </div>
            
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    <input type="email" name="email" value="{{ old('email') ? old('email') : '' }}" class="form-control"
                                        placeholder="name@example.com">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Service:</strong>
                                    <input type="text" name="service" value="{{ old('service') ? old('service') : '' }}"
                                        class="form-control" placeholder="Service">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Montant:</strong>
                                    <input type="number" name="montant" value="{{ old('montant') ? old('montant') : '' }}"
                                        class="form-control" placeholder="Montant">
                                </div>
                            </div>
            
                        </div>
            
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>Submit</button>
                    </form>
             
            
               




            </div>
            <!-- Card body -->
        </div>
        <!-- Card -->
    
<br>
    </div>
</x-master-layout>