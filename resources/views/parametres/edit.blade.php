<x-master-layout>
    <div  style="height:85vh; background-color: white; background-size: cover; background-image: url('images/promo3.jpg'); " >
<br>

         <!-- Card -->
         <div class="card mx-xl-5 overflow-auto shadow-lg p-3 mb-5 bg-white rounded"  style="height:80vh;">
            <!-- Card body -->
            <div class="card-body">
                
                
                    <div class="row titre">
                        <h3>Modification des parametres</h3>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <a href="{{ route('parametres.index') }} " class="btn btn-warning"><i class="fa fa-angle-left"></i>     Retour</a>
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
                  
                    <br>
                    <form action="{{  route('parametres.update',$param->id)}} " method="POST" style="">
                        @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <strong>Montant Adhesion:</strong>
                                    <input type="number" name="montantAdhesion" value="{{ old('montantAdhesion') ? old('montantAdhesion') : $param->montantAdhesion }}"
                                        class="form-control" placeholder="montantAdhesion" >
                                </div>
                            </div>
                           
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <strong>Montant Cotisation:</strong>
                                    <input type="number" name="montantCotisation" value="{{ old('montantCotisation') ? old('montantCotisation') : $param->montantCotisation }}"
                                        class="form-control" placeholder="montantCotisation" >
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