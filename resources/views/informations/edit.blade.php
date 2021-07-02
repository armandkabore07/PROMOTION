<x-master-layout >
    <div  style=" background-color: sylver; background-size: cover;  " class="overflow-auto" >
<br>

         <!-- Card  height:85vh;  overflow-auto   style="height:80vh;" -->
         <div class="card mx-xl-5  shadow-lg p-3 mb-5 bg-white rounded" >
            <!-- Card body -->
            <div class="card-body">
                
                    <div class="row titre">
                        <h3>Modification d'une publication</h3>
                    </div>
                    <br>
                    <div class="row">
                        <a href="{{ route('informations.index') }} " class="btn btn-success"><i class="fa fa-angle-left"></i>  Retour</a>
                    </div>
                   <br>

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
                  
            
                    <form action="{{  route('informations.update',$information->id)}} " method="POST" >
                        @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <strong>Titre:</strong>
                                    <input type="text" name="title" value="{{ old('title') ? old('title') : $information->title }}"
                                        class="form-control" placeholder="Titre">
                                        @if ($errors->any('title'))
                                        <span class="text-danger" >{{$errors->first('title') }} </span>
                                        @endif
                                </div>
                            </div>
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <strong>Message:</strong>
                                    <textarea  name="body" class="form-control" rows="8" placeholder="Message">{{ old('body') ? old('body') : $information->body }}</textarea>
                                        @if ($errors->any('body'))
                                        <span class="text-danger" >{{$errors->first('body') }} </span>
                                    @endif
                                </div>
                            </div>

                            

                            
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <strong>Type:</strong>
                                     <select class="form-control" name="type_id" id="type_id">
                                             <option value="">Aucun</option>
                                             @foreach($types as $type) 
                                                     <option value="{{$type->id}}" @if ( old('type_id') == $type->id ||  $type->id == $information->type->id ) selected @endif>
                                                    {{$type->libelle}}
                                                </option>
                                             @endforeach
                                    </select>
                                    @if ($errors->any('type_id'))
                                        <span class="text-danger" >{{$errors->first('type_id') }} </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-7 col-sm-7 col-md-7" id="montantdepense">
                                <div class="form-group">
                                    <strong>Montant Des Dépenses:</strong>
                                    <input type="number" name="montant_depense" value="{{ old('montant_depense') ? old('montant_depense') : $information->montant_depense }}"
                                        class="form-control" placeholder="Montant Des Dépenses">
                                        @if ($errors->any('montant_depense'))
                                        <span class="text-danger" >{{$errors->first('montant_depense') }} </span>
                                    @endif
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