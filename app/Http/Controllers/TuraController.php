<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tura;

class TuraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $turak = Tura::all();
        return response()->json($turak,200,options:JSON_UNESCAPED_UNICODE);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nev' => 'required|string|max:67',
            'tav' => 'required|integer|min:1',
            'elerheto_hely' => 'required|integer|min:2'
        ],
        [
            'required' =>'A :attribute kitöltése kötelező!',
            'string' => 'A név mezőnek szövegnek kell lennie!',
            'max' => 'A név mező maximum :max hosszú lehet!',
            'integer' =>'A(z) :attribute mezőnek számnak kell lennie!',
            'min' =>'A(z) :attribute mezőnek minimum :min értéket kell felvennie!'
        ],[
            'nev' => 'név',
            'tav' =>'táv',
            'elerheto_hely' =>'elérhető hely'
        ]);

        Tura::create([
            'nev' => $request->nev,
            'tav' => $request->tav,
            'elerheto_hely' => $request->elerheto_hely
        ]);

        return response()->json(['uzenet' => '  Túra rögzítve!'],201, options:JSON_UNESCAPED_UNICODE);
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
