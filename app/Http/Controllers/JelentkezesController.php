<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tura;
use App\Models\Jelentkezes;

class JelentkezesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jelentkezesek = Jelentkezes::with('tura')->get();
        return response()->json($jelentkezesek,200,options:JSON_UNESCAPED_UNICODE);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'tura_id' => 'required|exists:turak,id',
        'email' => 'required|email',
        'letszam' => 'required|integer|min:1'
       ]);

       $tura = Tura::find($request->tura_id);

       if ($tura) {
        if ($request->letszam > $tura->elerheto_hely) {
           return response()->json(['uzenet' => 'Nincs elég elérhető hely!'],400,options:JSON_UNESCAPED_UNICODE);
        }
        else {
            // $tura->elerheto_hely -= $request->letszam;
            // $tura->save();
            $tura->decrement('elerheto_hely',$request->letszam);
        }
       }

       Jelentkezes::create([
        'tura_id' => $request->tura_id,
        'email' =>$request->email,
        'letszam' => $request->letszam
       ]);

       return response()->json(["uzenet" => "Sikeres jelentkezés!"],201,options:JSON_UNESCAPED_UNICODE);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
