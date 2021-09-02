<x-master-layout>

    
    <section class="pt-5 pb-5 mt-0 align-items-center d-flex bg-dark image table-responsive overflow-auto" style="background-size: cover; background-image: url('images/promo3.jpg');" >
        <div class="container-fluid">

                <div class="row">
                    
                    <div class="col-lg-3 col-sm-6">
                        <div class="card-box bg-red">
                            <div class="inner">
                                <h3> {{number_format($nbtotalMembre, 0, ',', '.')}} </h3>
                                <p><strong> Nombre Total Des Membres </strong> </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card-box bg-orange">
                            <div class="inner">
                                <h3>  {{number_format($montantEncaisse, 0, ',', '.')}} FCFA </h3>
                                <p><strong> Montant Total Encaissé </strong></p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-money" aria-hidden="true"></i>
                            </div>
                            <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card-box bg-blue">
                            <div class="inner">
                                <h3> {{number_format($montantDepense, 0, ',', '.')}}  FCFA</h3>
                                <p> <strong>Montant Total Des Dépenses </strong></p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-money" aria-hidden="true"></i>
                            </div>
                            <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
        
                    <div class="col-lg-3 col-sm-6">
                        <div class="card-box bg-green">
                            <div class="inner">
                                <h3> {{number_format($montantRestant, 0, ',', '.')}} FCFA</h3>
                                <p> <strong>Reste</strong> </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-money" aria-hidden="true"></i>
                            </div>
                            <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    
                </div>
           


            
               
               


           <div class="row  justify-content-center align-items-center d-flex text-center ">
             <div class="col-12 col-md-8  h-50 ">
                <h1 class="display-2  text-light mb-2 mt-5  text-dark" ><strong>Bienvenue dans <br> votre promotion!</strong> </h1>
                    <p  class="lead  text-light mb-5"> <a class="text-dark" href="https://www.nouvelleviepro.fr/actualite/360/projet-professionnel-10-citations-a-mediter"> « Choisissez un travail que vous aimez et vous n’aurez plus à travailler un seul jour de votre vie. » <br><br> Confucius </a></p>
                    <p><a href="#" class="btn bg-danger shadow-lg btn-round text-light btn-lg btn-rised">s'inscrire ></a>

                    <a href="#" class="btn bg-success shadow-lg btn-round text-light btn-lg btn-rised">Les activités et évenements ></a>
                    <a href="#" class="btn bg-success shadow-lg btn-round text-light btn-lg btn-rised">Liste des membres ></a>

                    <a href="#" class="btn bg-success shadow-lg btn-round text-light btn-lg btn-rised"> Les depenses ></a></p> 
             </div>
           </div>
        </div>
    </section>



</x-master-layout>