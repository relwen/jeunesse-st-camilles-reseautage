<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Submission;

class FormController extends Controller
{
    
    
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'besoin' => 'required|in:emploi,stage-soutenance,stage-insertion',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:10240', // 10MB max
        ]);
        
        // Gestion du fichier CV
        if ($request->hasFile('cv')) {
            $cvFile = $request->file('cv');
            $cvFileName = time() . '_' . $cvFile->getClientOriginalName();
            
            // Stockage du fichier dans le dossier 'cvs' dans 'storage/app/public'
            // Assurez-vous d'avoir exécuté 'php artisan storage:link'
            $cvPath = $cvFile->storeAs('cvs', $cvFileName, 'public');
            
            // Création de l'entrée dans la base de données
            $submission = Submission::create([
                'nom' => $validated['nom'],
                'prenom' => $validated['prenom'],
                'profession' => $validated['profession'],
                'besoin' => $validated['besoin'],
                'cv_path' => $cvPath,
            ]);
            
            return redirect()->route('submission.success')->with('success', 'Votre soumission a été enregistrée avec succès!');
        }
        
        return back()->withErrors(['cv' => 'Une erreur est survenue lors du téléchargement du CV.']);
    }
    
    public function success()
    {   
        return view('success');
    }


    public function showResponses()
    {
          // Récupérer toutes les soumissions
          $submissions = Submission::orderBy('created_at', 'desc')->get();
        
          // Formater les données pour GridJS
          $formattedSubmissions = $submissions->map(function ($submission) {
              return [
                  'id' => $submission->id,
                  'fields' => [
                      'nom' => $submission->nom." ".$submission->prenom,
                      'prenom' => $submission->prenom,
                      'profession' => $submission->profession,
                      
                        'besoin' => $this->formatBesoin($submission->besoin),
                      'cv_path' => $submission->cv_path,
                  ],
                  'created_at' => $submission->created_at->format('d/m/Y H:i')
              ];
          });
          
          return view('tableau.forms.index', [
              'formattedResponses' => $formattedSubmissions->toJson()
          ]);
    }


    private function formatBesoin($besoin)
    {
        $besoinLabels = [
            'emploi' => 'Emploi',
            'stage-soutenance' => 'Stage de Soutenance',
            'stage-insertion' => 'Stage Insertion Professionnelle'
        ];
        
        return $besoinLabels[$besoin] ?? $besoin;
    }


public function show($id)
{
    $response = DB::table('form_responses')->where('id', $id)->first();
    
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

    return view('tableau.forms.response-details', ['response' => $responseDetails]);
}



}
