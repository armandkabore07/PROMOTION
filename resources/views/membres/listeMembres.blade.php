<x-master-layout>
    <div  style="height:85vh; background-color: sylver; background-size: cover; background-image: url('images/promo3.jpg'); " >
<br>
         <!-- Card -->
         <div class="card mx-xl-5 overflow-auto"  style="height:80vh;">
            <!-- Card body -->
            <div class="card-body">
            
                <div class="container-fluid">
                    <div class="row">
                        <h1><strong>Liste des membres</strong></h1>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            <p>{{ $message }} </p>
                        </div>
                    @endif
                    <br>
                    <div class="row">
                        <a href="{{ route('register') }} " class="btn btn-success"><i class="fa fa-user-plus"></i> Creer un nouveau membre</a>
            
                    </div>
                     
                    <br>
                    <div class="row">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Matricule</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prenom</th>
                                    <th scope="col">Mail</th>
                                    <th scope="col">Telephone</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Date d'adhésion</th>
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
                                        <td>{{ $member->service }}</td>
                                        <td>{{date('d-m-Y', strtotime( $member->created_at))}}</td>
                                        <td>
                                            <form action="{{ route('deletemembre', $member->id) }}" method="POST">
                                                @csrf
                                                 <a href="{{ route('detailmembre', $member->id) }} " class="btn btn-info"><i class="fa fa-eye"></i> Detail</a> 
                                                 <a href="{{ route('editmembre', $member->id) }} " class="btn btn-warning"><i class="fa fa-edit"> </i> Modifier</a> 
                                                @method('DELETE')
                                                <button class="btn btn-danger"><i class="fa fa-trash"></i>Supprimer</button>
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