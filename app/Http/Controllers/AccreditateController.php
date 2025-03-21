<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccreditateController extends Controller
{
    
    public function store(Request $request)
    {
        $fields = $request->input('fields');
        
        $category = $request->input('category');
        $fields['category'] = $category;
    
        if ($request->hasFile('fields.photo')) {
            $photoPath = $request->file('fields.photo')->store('photos', 'public');
            $fields['photo'] = $photoPath;  
        }
    
        DB::table('badges_form_responses')->insert([
            'form_name' => 'badge_request_form',
            'fields' => json_encode($fields),  
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        return redirect()->back()->with('success', 'Formulaire soumis avec succès !');
    }
    
    


public function showResponses() 
{
    $responses = DB::table('badges_form_responses')->latest('created_at')->get();
    
    $formattedResponses = $responses->map(function ($response) {
        $fields = json_decode($response->fields, true);
        return [
            'id' => $response->id,
            'fields' => $fields,
            'created_at' => \Carbon\Carbon::parse($response->created_at)->format('d M Y'),
        ];
    })->toArray();
    return view('tableau.accredidate.index', [
        'formattedResponses' => json_encode($formattedResponses)
    ]);
}
public function show($id)
{
    $response = DB::table('badges_form_responses')->where('id', $id)->first();
    
    if ($response) {
        $fields = json_decode($response->fields, true);
        $responseDetails = [
            'id' => $response->id,
            'fields' => $fields,
            'created_at' => \Carbon\Carbon::parse($response->created_at)->format('d M Y'),
        ];
    } else {
        abort(404, 'Réponse non trouvée');
    }
    return view('tableau.accredidate.details', ['response' => $responseDetails]);
}


}
