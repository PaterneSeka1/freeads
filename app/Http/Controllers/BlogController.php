<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function __construct()
    {
        // Tous les accès requièrent un utilisateur connecté
        $this->middleware('auth');
    }

    // Liste des articles de l'utilisateur connecté
    public function index()
    {
        $blogs = Blog::where('author_id', Auth::id())
            ->with('category')
            ->orderByDesc('created_at')
            ->get();

        return view('blogs.index', compact('blogs'));
    }

    public function allArticles()
    {
        $blogs = Blog::with('category', 'author')
            ->orderByDesc('created_at')
            ->paginate(2); // Pagination pour limiter par page
    
        return view('blogs.all', compact('blogs'));
    }
    

    // Formulaire création
    public function create()
    {
        $categories = Category::all();
        return view('blogs.create', compact('categories'));
    }

    // Enregistrer nouvel article
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blogs', 'public');
        }

        Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'author_id' => Auth::id(),
            'image' => $imagePath,
        ]);

        return redirect()->route('blogs.index')->with('success', 'Article créé avec succès.');
    }

    // Formulaire édition (vérifie que c'est l'auteur)
    public function edit(Blog $blog)
    {
        if ($blog->author_id !== Auth::id()) {
            abort(403, 'Accès refusé.');
        }

        $categories = Category::all();
        return view('blogs.edit', compact('blog', 'categories'));
    }

    // Mise à jour (vérifie que c'est l'auteur)
    public function update(Request $request, Blog $blog)
    {
        if ($blog->author_id !== Auth::id()) {
            abort(403, 'Accès refusé.');
        }

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $imagePath = $request->file('image')->store('blogs', 'public');
            $blog->image = $imagePath;
        }

        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->category_id = $request->category_id;
        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Article mis à jour avec succès.');
    }

    // Suppression (vérifie que c'est l'auteur)
    public function destroy(Blog $blog)
    {
        if ($blog->author_id !== Auth::id()) {
            abort(403, 'Accès refusé.');
        }

        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Article supprimé avec succès.');
    }
}
