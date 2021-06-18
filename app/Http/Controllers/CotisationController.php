<?php

namespace App\Http\Controllers;

use App\Models\Cotisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;

class CotisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* $members = DB::table('users')
                        ->join('cotisations','users.id','=','cotisations.userID')
                        ->orderBy('users.created_at', 'DESC')
                        ->paginate(5)
                       ; */
        $members = DB::table('users')
                        ->join('cotisations','users.id','=','cotisations.userID')
                        ->select('users.*', DB::raw('SUM(cotisations.montantPayer) as total_cotisations'))
                        ->groupBy('users.id')
                        ->orderBy('users.created_at', 'DESC')
                        ->paginate(5)
                       ;
                //return dd($members);
        //$members = User::latest()->paginate(5);
       return view('cotisations.listeCotisation',compact('members'))->with('i',(request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
       $member = DB::table('users')->find($id);
       return view('cotisations.create',compact('member'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        //
        $montantcotisation = Config::get('param.montantCotisation');

        $request->validate([
           // 'telephone' => 'required|integer|min:8|unique:users',
           // 'matricule' => 'required|string|max:255|unique:users',
           // 'nom' => 'required|string|max:255',
           // 'prenom' => 'required|string|max:255',
            'montant' => 'required|integer',
        ]);

        $derniercoti = Cotisation::where('userId','=',$id)->orderBy('annee','desc')->first();
        $montantACotiser = $request->montant;
        $montdonner= $montantACotiser;
        $montantRestant = $derniercoti->montantRestant;
        $date = $derniercoti->annee;
        $todayDate = Carbon::now()->format('Y-m-d');
        $userId = $id;
        $date = $date+1;

        if ( $montantRestant>0) {
            $montantACotiser = $montantACotiser- $montantRestant;
            if ($montantACotiser==0) {
               //return dd('il reste '.$montantACotiser);
               $cotisation= Cotisation::findorfail($derniercoti->id);
               $cotisation->montantPayer = $cotisation->montantPayer + $montdonner;
               $cotisation->montantRestant = 0;
               $cotisation->dateCotisation =$todayDate ;
               $cotisation->save();
               #arret

            }elseif ($montantACotiser>0) {
                //return dd('il reste '.$montantACotiser);
                $cotisation= Cotisation::findorfail($derniercoti->id);
                $cotisation->montantPayer = $cotisation->montantPayer + $montantRestant;
                $cotisation->montantRestant = 0;
                $cotisation->dateCotisation =$todayDate ;
                $cotisation->save();
                #traitement
                if ($montantACotiser>0 && $montantACotiser< $montantcotisation) {
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

                #arret

            }elseif ($montantACotiser<0) {
                //return dd('il reste '.$montantACotiser);
                //valeur absolue abs($montantACotiser)
                $cotisation= Cotisation::findorfail($derniercoti->id);
                $cotisation->montantPayer = $cotisation->montantPayer + $montdonner;
                $cotisation->montantRestant =abs($montantACotiser);
                $cotisation->dateCotisation =$todayDate ;
                $cotisation->save();
                #arret

            }
        }elseif ($montantRestant==0) {
            # code... traitemement
            if ($montantACotiser>0 && $montantACotiser< $montantcotisation) {
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
    

            #arret
        }
        

        //return dd( $montantACotiser);
        return redirect()->route('cotisations.index')->with('success','Cotisation enregistrée avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cotisation  $cotisation
     * @return \Illuminate\Http\Response
     */
    public function show( $userId)
    {       
               //  $member = DB::table('users')->find($userId);
                 $members = DB::table('users')->where('users.id','=',$userId)
                 ->join('cotisations','users.id','=','cotisations.userID')
                 ->select('users.*', DB::raw('SUM(cotisations.montantPayer) as total_cotisations'))
                 ->groupBy('users.id')
                 ->get()
                ;
                 $cotisations = DB::table('cotisations') ->where('cotisations.userId','=',$userId)
                       ->orderBy('cotisations.annee', 'DESC')
                       ->paginate(5)
                      ; 
               return view('cotisations.show',compact('members','cotisations'))->with('i',(request()->input('page', 1) - 1) * 5);
              //return dd($member);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cotisation  $cotisation
     * @return \Illuminate\Http\Response
     */
    public function edit(Cotisation $cotisation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cotisation  $cotisation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cotisation $cotisation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cotisation  $cotisation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cotisation $cotisation)
    {
        //
    }
}
