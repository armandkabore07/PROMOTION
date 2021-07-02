<x-master-layout>
    <div  style=" background-color: white; background-size: cover;" class="overflow-auto" >
<br>
         <!-- Card -->
         <div class="card mx-xl-5  shadow-lg p-3 mb-5 bg-white rounded"  >
            <!-- Card body -->
            <div class="card-body">
            
                <div class="">
                    <div class="row titre">
                        <h3>Publications</h3> 
                        
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
                    @role('admin')
                    <div class="row">
                        <a href="{{ route('informations.create') }} " class="btn btn-success"><i class="fa fa-book"></i> Creer une nouvelle publication</a>
                    </div>
                    @endrole
                    <br>
                
                    <div class="row">
                        @if( count($informations)>=1)
                        
                         <div class="card" style="width:100%">
                            <ul class="list-group" >
                                @foreach($informations as $information)
                                <li class="list-group-item " >
                                <span class="badge badge-success badge-pill"> {{$information->type->libelle}} </span> <h3><a href="{{ route('informations.show', $information->id) }}"> {{$information->title}} </a></h3>
                                     <p>{{$information->body}} </p> 
                                    <small>Date de publication:  {{$information->created_at}}@if($information->montant_depense >0) | Dépenses: {{$information->montant_depense}} FCFA @endif  </small> 
                                      @if($todayDate->diffInDays($information->created_at) <= 7 )
                                        <span class="badge badge-warning badge-pill"> Nouveau </span> 
                                      @endif
                                    <br>
                                    @role('admin')
                                    <hr>
                                    <form class="delete"  action="{{ route('informations.destroy', $information->id) }}" method="POST">
                                                @csrf
                                                 <a  href="{{ route('informations.show', $information->id) }} " class="btn btn-info"><i class="fa fa-eye"></i> Detail</a> 
                                                 <a href="{{ route('informations.edit', $information->id) }} " class="btn btn-warning"><i class="fa fa-edit"> </i> Modifier</a> 
                                                @method('DELETE')
                                                <button onclick="return confirm('Voulez vous vraiment supprimer cette publication?')" class="btn btn-danger"><i class="fa fa-trash"></i>Supprimer</button>
                                    </form>
                                    @endrole
                                </li>
                                @endforeach
                            </ul>
                            
                            </div>

                            <br>
                            <br>
                            {!! $informations->links() !!}

                          
                        @else
                          <h3>Aucune publication!</h3>
                        @endif
                    </div>
                </div>






            </div>
            <!-- Card body -->
        </div>
        <!-- Card -->

<br>
    </div>
</x-master-layout>