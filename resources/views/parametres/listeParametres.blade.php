<x-master-layout>
    <div  style="height:85vh; background-color: white; background-size: cover; background-image: url('images/promo.jpg'); " >
<br>
         <!-- Card -->
         <div class="card mx-xl-5 overflow-auto shadow-lg p-3 mb-5 bg-white rounded"  style="height:80vh;">
            <!-- Card body -->
            <div class="card-body">
            
                <div class="">
                    <div class="row titre">
                        <h3>Parametres</h3>
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
            {{--        <br>
                    <div class="row">
                        <a href="{{ route('creerMembres') }} " class="btn btn-success"><i class="fa fa-user-plus"></i> Creer un nouveau membre</a>
            
                    </div> --}}
                     
                    <br>
                  
                    <div class="row">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                   
                                    <th scope="col">Montant Adhesion</th>
                                    <th scope="col">Montant Cotisation</th>
                                    <th scope="col">Date Enregistrement</th>
                                    <th scope="col">Date Modification</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                             {{--     @foreach ($members as $member)--}}
                                    <tr>
                                        <td>{{ $params->montantAdhesion }} FCFA </td>
                                        <td>{{ $params->montantCotisation }} FCFA</td>
                                        <td>{{ $params->created_at }}</td>
                                        <td>{{ $params->updated_at }}</td>
                                       {{--   <td>{{date('d-m-Y', strtotime( $member->created_at))}}</td>--}}
                                       {{--  <td>{{ $member->soldeInitial }}</td>  --}}
                                        <td>
                                            <form class="delete"  action="" method="POST">
                                                @csrf
                                                 <a  href="{{route('parametres.show',$params->id)}} " class="btn btn-info"><i class="fa fa-eye"></i> Detail</a> 
                                                 <a href="{{route('parametres.edit',$params->id)}} " class="btn btn-warning"><i class="fa fa-edit"> </i> Modifier</a>  
                        
                                            </form>
                                        </td>
                                    </tr>
                              {{--   @endforeach--}}
                            </tbody>
                        </table>
                      
                    </div>
                </div>






            </div>
            <!-- Card body -->
        </div>
        <!-- Card -->

<br>
    </div>
</x-master-layout>