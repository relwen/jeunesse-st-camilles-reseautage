<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;


class ArticleController extends Controller
{
    //


    public function dashboard()
    {
        $submissionCount = DB::table('form_responses')->count();
        $badges = DB::table('badges_form_responses')->count();
        $messageCount = DB::table('messages')->count();
        $artCount = DB::table('articles')->count();
        $articles = Article::paginate(50);

        
        return view('tableau.dashboard', compact('articles','submissionCount','messageCount','artCount','badges'));
    }


    public function index()
    {
        $articles = Article::paginate(50);

        return view('tableau.articles.index', compact('articles'));
    }

    public function welcome()
    {
        $articles = Article::latest()->take(3)->get();
        return view('welcome', compact('articles'));
    }
   
    public function concours()
    {
        $lastestarticles = Article::latest()->take(4)->get();
        return view('concours', compact('lastestarticles'));
    }

    public function accredidate()
    {
        $lastestarticles = Article::latest()->take(4)->get();
        return view('acreditation', compact('lastestarticles'));
    }

    
    public function activityDetails($id)
{
    $lastestarticles = Article::latest()->take(4)->get();

    $article = Article::where("id",$id)->first();
    return view('activity-detail', compact('article', 'lastestarticles'));
}

    public function create()
    {

        return view('tableau.articles.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'content' => 'nullable|string',
        ]);
    
        try {
            if ($request->hasFile('img')) {
                $imageName = time() . '_' . $request->img->getClientOriginalName();
                
                $imagePath = $request->file('img')->storeAs('uploads/actualite', $imageName, 'public');
                
                $validated['img'] = $imagePath;
            }
    
            $content = Article::create([
                'title' => $request['title'],
                'img' => $imagePath ?? null, 
                'content' => $request['content'] ?? null,
                'link' => $request['link'] ?? null,
            ]);
    
            return redirect()->route('articles.index')
                            ->with('success', 'Contenu créé avec succès!');
    
        } catch (\Exception $e) {
            if (isset($imagePath) && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
    
            return redirect()->back()
                            ->withInput()
                            ->with('error', 'Une erreur est survenue lors de la création du contenu: ' . $e->getMessage());
        }
    }

    
    


    public function show($id)
{
    $article = Article::where("id",$id)->first();
    return view('tableau.articles.show', compact('article'));
}

public function destroy($id)
{
    $artiste = Article::findOrFail($id);
    $artiste->delete();

    return redirect()->back()->with('success', 'Article supprimé avec succès!');
}


}
