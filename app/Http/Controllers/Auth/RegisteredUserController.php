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

class RegisteredUserController extends Controller
{

    public function index()
    {
        //
        $members = User::latest()->paginate(5);
      // return view('members.listmembers', compact('members','montantadhesion','montantcotisation'))->with('i',(request()->input('page', 1) - 1) * 5);
       return view('membres.listeMembres',compact('members'))->with('i',(request()->input('page', 1) - 1) * 5);
    }

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        //return view('auth.register');
        return view('membres.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $member
     * @return \Illuminate\Http\Response
     */
    public function show(User $member)
    {
        //
        return view('members.show',compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
        return view('members.edit',compact('member'));
       
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
        $request->validate([
            'telephone' => 'required|min:8',
            'matricule' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'service' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
           // 'password' => 'required|string|confirmed|min:8',
            'montant' => 'required|integer',
        ]);

        $user = User::create([
            'telephone' => $request->telephone,
            'matricule' => $request->matricule,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'service' => $request->service,
            'email' => $request->email,
            //'password' => Hash::make($request->password),
            'password' => Hash::make('12345678'),
        ]);

        $userId =  $user->id; 
        $montant = $request->montant;
        $montantadhesion = Config::get('param.montantAdhesion');
        $montantcotisation = Config::get('param.montantCotisation');
        $date = Carbon::now()->format('Y');
        $todayDate = Carbon::now()->format('Y-m-d');
        
        Adhesion::create([
            'userId' => $userId,
            'montantAdhesion'=>$montantadhesion,
             'dateAdhesion'=> $todayDate,
        ]);

        $montantACotiser =  $montant - $montantadhesion;

        if ($montantACotiser>0 && $montantACotiser< $montantcotisation) {
            Cotisation::create([
                'userId' => $userId,
                'montantPayer'=>$montantACotiser,
                'montantRestant'=>$montantcotisation-$montantACotiser,
                'annee'=>$date,
                'dateCotisation'=> $todayDate,
            ]);
           
        }else {
           
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
        return redirect()->route('listemembres')->with('success','Membre crée avec succès!');
    }

      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $member)
    {
       

        //return redirect()->route('members.index')->with('success','membre modifié avec succès!');
        return "bonjour";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $member)
    {
        
      //  $member->delete();
      //  return redirect()->route('members.index')->with('success','membre supprimé avec succèss!');
      return "delete";
    }

}
