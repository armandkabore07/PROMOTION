<x-master-layout>
    <div
        style="height:85vh; background-color: white; background-size: cover; background-image: url('images/promo.jpg'); ">
        <br>
        <!-- Card -->
        <div class="card mx-xl-5 overflow-auto shadow-lg p-3 mb-5 bg-white rounded" style="height:80vh;">
            <!-- Card body -->
            <div class="card-body">

                <div class="">
                    <div class="row titre">
                        <h3>Détail des cotisations du membre</h3>
                    </div>
                    <br>
                @role('admin')
                 <div class="row ">
                    <a href="{{route('cotisations.index')}} " class="btn btn-warning"><i class="fa fa-angle-left"></i>    Retour</a>
                </div> 
                 @endrole
                 <br>
                  
                    <div class="container shadow-lg p-3 mb-5 bg-white rounded">
                        @foreach ($members as $member)
                        <div class="row">
                          <div class="col-sm">
                            <strong>Telephone:</strong>
                            {{ $member->telephone }}
                          </div>
                          <div class="col-sm">
                            <strong>Matricule:</strong>
                            {{ $member->matricule }}
                          </div>
                          <div class="col-sm" style="color: red">
                            <strong>Nom:</strong>
                            <strong>{{ $member->nom}}</strong>
                          </div>
                          <div class="col-sm" style="color: red">
                            <strong>Prenom:</strong>
                            <strong>{{ $member->prenom}}</strong>
                          </div>
                        </div>

                        <div class="row">
                            <div class="col-sm">
                              <strong>Email:</strong>
                              {{ $member->email }}
                            </div>
                            <div class="col-sm">
                              <strong>Service:</strong>
                              {{ $member->service }}
                            </div>
                            <div class="col-sm">
                              <strong>Date d'adhésion:</strong>
                              {{date('d-m-Y', strtotime( $member->created_at))}}
                            </div>
                            <div class="col-sm">
                              <strong>Solde initial:</strong>
                              {{ $member->soldeInitial }} FCFA
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm" style="color: green">
                              <strong>Montant total cotisé:</strong>
                              <strong> {{ $member->total_cotisations }} FCFA </strong>
                            </div>
                            <div class="col-sm">
                              
                            </div>
                            <div class="col-sm">
                             
                            </div>
                            <div class="col-sm">
                             
                            </div>
                          </div>
                        @endforeach
                      </div>

               

                    <div class="row">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Annee</th>
                                    <th scope="col">Montant Payé</th>
                                    <th scope="col">Montant Restant</th>
                                    <th scope="col">Date de cotisation</th>
                                    {{-- <th scope="col">Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cotisations as $cotisation)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>{{ $cotisation->annee }} </td>
                                        <td>{{ $cotisation->montantPayer }} FCFA</td>
                                        <td>{{ $cotisation->montantRestant }} FCFA</td>
                                        <td>{{ date('d-m-Y', strtotime($cotisation->dateCotisation)) }}</td>

                                        {{-- <td>{{date('d-m-Y', strtotime( $member->created_at))}}</td> --}}
                                        {{-- <td>{{ $member->soldeInitial }}</td> --}}

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $cotisations->links() !!}
                    </div>
                </div>






            </div>
            <!-- Card body -->
        </div>
        <!-- Card -->

        <br>
    </div>
</x-master-layout>
