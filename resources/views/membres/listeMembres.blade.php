<x-master-layout>
    <div  style=" background-color: white; background-size: cover; " class="overflow-auto">
<br>
         <!-- Card -->
         <div class="card mx-xl-5  shadow-lg p-3 mb-5 bg-white rounded" >
            <!-- Card body -->
            <div class="card-body">
            
                <div class="">
                    <div class="row titre">
                        <h3>Liste des membres</h3>
                        
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
                    
                    <div class="row">
                        <a href="{{ route('creerMembres') }} " class="btn btn-success"><i class="fa fa-user-plus"></i> Creer un nouveau membre</a>
            
                    </div>
                     
                    <br>
                  
                     <!--{{"Mot de passe du nouveau user : ".$mdp}}-->
                    <div class="row table-responsive">
                        <table class="table  table-bordered table-hover table-striped" style="width100%; overflow: scroll;">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Matricule</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prenom</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Telephone</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Service</th>
                                   {{--  <th scope="col">Date d'adhésion</th>--}}
                                {{--   <th scope="col">Solde initial</th> --}} 
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $member)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>{{ $member->matricule }} </td>
                                        <td>{{ $member->nom }}</td>
                                        <td>{{ $member->prenom }}</td>
                                        <td>{{ $member->email }}</td>
                                        <td>{{ $member->telephone }}</td>
                                        <td> <label class="badge badge-success">{{ $member->roles->first()->name }}</label></td>
                                        <td>{{ $member->service }}</td>
                                        {{-- <td>{{date('d-m-Y', strtotime( $member->created_at))}}</td>--}}
                                       {{--  <td>{{ $member->soldeInitial }}</td>  --}}
                                        <td>
                                            <form class="delete"  action="{{ route('membres.destroy', $member->id) }}" method="POST">
                                                @csrf
                                                 <a  href="{{ route('membres.show', $member->id) }} " class="btn btn-info"><i class="fa fa-eye"></i> Detail</a> 
                                                 <a href="{{ route('membres.edit', $member->id) }} " class="btn btn-warning"><i class="fa fa-edit"> </i> Modifier</a> 
                                                @method('DELETE')
                                                <button onclick="return confirm('Voulez vous vraiment supprimer ce membre?')" class="btn btn-danger"><i class="fa fa-trash"></i>Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $members->links() !!}
                    </div>
                </div>






            </div>
            <!-- Card body -->
        </div>
        <!-- Card -->

<br>
    </div>
</x-master-layout>