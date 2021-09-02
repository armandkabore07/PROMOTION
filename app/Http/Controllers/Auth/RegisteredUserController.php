<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Adhesion;
use App\Models\Cotisation;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{

    /***********************************/
    /* Génère un mot de passe */
    /***********************************/
    // $size : longueur du mot passe voulue
    public function Genere_Password($size)
    {
    // Initialisation des caractères utilisables
    $characters = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m",
    "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z","@","!","?","#");
    $password = "";

    for($i=0;$i<$size;$i++) { $password .=($i%2) ? strtoupper($characters[array_rand($characters)]) :$characters[array_rand($characters)]; } 
        return $password; 
    }



    public function index()
    {
        //
        $members = User::latest()->paginate(8);
        $mdp = self::Genere_Password(8);
       // return view('members.listmembers', compact('members','montantadhesion','montantcotisation'))->with('i',(request()->input('page', 1) - 1) * 5);
       return view('membres.listeMembres',compact('members','mdp'))->with('i',(request()->input('page', 1) - 1) * 8);
    }

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = \Spatie\Permission\Models\Role::all();
      //return view('auth.register');
      return view('membres.create',compact('roles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $member
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $member = User::findorfail($id);
       return view('membres.show',compact('member'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     */
    public function edit($id)
    {
       
        $member = User::findorfail($id);
        $roles = \Spatie\Permission\Models\Role::all();
        $userrole =  $member->roles->first();
        return view('membres.edit',compact('member','roles','userrole'));
        //return $member;
       
    }


    

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $mdp = self::Genere_Password(8);
        $montant = $request->montant;
        $montantadhesion = Config::get('param.montantAdhesion');
        $montantcotisation = Config::get('param.montantCotisation');
        $date = Carbon::now()->format('Y');
        $todayDate = Carbon::now()->format('Y-m-d');

        $request->validate([
            'telephone' => 'required|integer|min:8|unique:users',
            'matricule' => 'required|string|max:255|unique:users',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'service' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required',
           // 'password' => 'required|string|confirmed|min:8',
            'montant' => 'required|integer|gte:'.$montantadhesion.'',
        ]);

        
     if($montant>=$montantadhesion) {
        $mailuser = $request->email;

        $user = User::create([
            'telephone' => $request->telephone,
            'matricule' => $request->matricule,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'service' => $request->service,
            'email' => $request->email,
            'soldeInitial'  => $request->montant,
            //'password' => Hash::make($request->password),
            //'password' => Hash::make('12345678'),
            'password' => Hash::make($mdp),
           // 'password' => Hash::make($mdp),
        ]);
    
        $userId =  $user->id; 
        $user->assignRole($request->role);
        
        
        Adhesion::create([
            'userId' => $userId,
            'montantAdhesion'=>$montantadhesion,
             'dateAdhesion'=> $todayDate,
        ]);

        $montantACotiser =  $montant - $montantadhesion;

       

        if ($montantACotiser>=0 && $montantACotiser< $montantcotisation) {
            Cotisation::create([
                'userId' => $userId,
                'montantPayer'=>$montantACotiser,
                'montantRestant'=>$montantcotisation-$montantACotiser,
                'annee'=>$date,
                'dateCotisation'=> $todayDate,
            ]);
           
         }elseif($montantACotiser>0 && $montantACotiser>=$montantcotisation) {
           
            while ($montantACotiser >= $montantcotisation) {
                Cotisation::create([
                    'userId' => $userId,
                    'montantPayer'=>$montantcotisation,
                    'montantRestant'=>0,
                    'annee'=>$date,
                    'dateCotisation'=> $todayDate,
                ]);

                $montantACotiser = $montantACotiser - $montantcotisation;
                $date = $date+1;

            }

            if ($montantACotiser >0 && $montantACotiser< $montantcotisation) {
                Cotisation::create([
                    'userId' => $userId,
                    'montantPayer'=>$montantACotiser,
                    'montantRestant'=>$montantcotisation-$montantACotiser,
                    'annee'=>$date,
                    'dateCotisation'=> $todayDate,
                ]);
            }
    
        }

        //event(new Registered($user));
        //Auth::login($user);
        //return redirect(RouteServiceProvider::HOME);
        //Envoi de mail
        $details = [
            'title' => 'Mail from promotion@support.com',
       //   'body' => 'Cher '.$request->nom.', Votre compte a été crée avec succès veuillez vous connecter avec le lien suivant  http://localhost  votre mot de passe est: '.$mdp
            'body' => 'Cher '.$request->nom.', Votre compte a été crée avec succès veuillez vous connecter avec le lien suivant  http://www.cellule260.com/  votre mot de passe est: '.$mdp
        ];
    
        Mail::to( $mailuser)->send(new \App\Mail\MailCreation($details));

        return redirect()->route('membres.index')->with('success','Membre crée avec succès!');
            
 }

    }

      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
       
        $request->validate([
            'telephone' => 'required|min:8|unique:users,telephone,'.$id,
            'matricule' => 'required|string|max:255|unique:users,matricule,'.$id,
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'service' => 'required|string|max:255',
            'role' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
           // 'password' => 'required|string|confirmed|min:8',
            //'montant' => 'required|integer',
        ]);

        $member= User::findorfail($id);

        // $member->telephone = $request->telephone;
        // $member->matricule= $request->matricule;
        // $member->email = $request->email;
        // $member->nom = $request->nom;
        // $member->prenom = $request->prenom;
        // $member->service = $request->service;
        // $member->save();
        //if($member->telephone!=$request->telephone){ }

        $member->update($request->all());

        if($member->roles->first()->name==$request->role){ }
        else{ 
            $member->removeRole($member->roles->first()->name);
            $member->assignRole($request->role);
        }
       // $member->assignRole('user');
       // $member->assignRole('admin');

        return redirect()->route('membres.index')->with('success','membre modifié avec succès!');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Adhesion::where('userId',$id)->delete();
       Cotisation::where('userId',$id)->delete();
       $member= User::findorfail($id);
       $member->delete();
       return redirect()->route('membres.index')->with('success','membre supprimé avec succèss!');
     
    }

    public function reinitialisation($id)
    {
        $mdp = self::Genere_Password(8);
        $member= User::findorfail($id);
        $member->password  = Hash::make($mdp);
        $member->save();

        $details = [
            'title' => 'Mail from promotion@support.com',
            'body' => 'Cher '.$member->nom.', Votre mot de passe a été reinitialisé avec succès veuillez vous connecter avec le lien suivant  http://www.cellule260.com/  votre nouveau mot de passe est: '.$mdp
        ];
    
        Mail::to($member->email)->send(new \App\Mail\MailCreation($details));

        return redirect()->route('membres.show',$id)->with(
            [ 'success' => 'Succèss de reinitialisation du mot de passe!',
            'newmdp' => $mdp,]); 
    }

}
