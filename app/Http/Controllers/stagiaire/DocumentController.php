<?php

namespace App\Http\Controllers\stagiaire;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDocumentRequest;
use App\Models\Document;
use App\Models\Theme;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    /**
     * Affiche la page qui contient la liste des documents uploader pas l'utilisateur
     * 
     * @return View
     */
    public function index()
    {
        return view('stagiaire.document.index', [
            'documents' => Document::with(['user', 'theme'])->orderBy('created_at', 'desc')->get()
        ]);
    }

    public function create()
    {
        return view('stagiaire.document.form', [
            'document' => new Document(),
            'themes' => Document::where('user_id', Auth::user()->id)->where('path', null)
        ]);
    }

    public function store(StoreDocumentRequest $request)
    {
        try {

            

        /**
         * @var UploadedFile $document
         */
        $document = $request->file('path');

        //  trouver le theme
        $theme = Theme::find($request->theme_id);
        
        // Verifier si le theme n'a pas deja un document associer
        if ($theme->document) {
            return back()->with('error', 'Ce theme est deja associer a un document');
        }

        if (!$theme) {
            return back()->withErrors(['theme_id' => 'Thème introuvable']);
        }

        // enregistrement du document dans le dossier document public storage
        $path_doc = $document->storeAs(
            'documents', // Dossier de stockage
            $theme->title . '.' . $document->getClientOriginalExtension(), // Nom du fichier basé sur le titre du thème
            'public'
        );

        $doc_save = Document::create([
            'path' => $path_doc,
            'user_id' => Auth::user()->id,
            'theme_id' => $theme->id
        ]);

        if ($doc_save) {
            return to_route('stagiaire.document.index')->with('success', "Document enregistrer avec succes !");
        }else{
            return back()->with('error', "Impossible d'enregistrer se document.");
        }
        } catch (Exception $e) {
            return back()->with('error', "Un probleme est survenu au cours de l'enregistrement du document.");
        }
        
    }

    /**
     * Affiche un document en particulier.
     * 
     */
    public function show(Document $document)
    {
        Document::where('id', $document->id)->with(['user', 'theme'])->first();
        return view('stagiaire.document.show');
    }

    /**
     * Archiver un document.
     */
    public function achieved(Document $document)
    {
        $get_document = Document::where('id',$document->id)->first();
        if ($get_document) {
            $get_document->achieved = 1;
            $get_document->save();
            return to_route('stagiaire.document.index')->with('success', $get_document->path . " archiver.");
        }

        return back()->with('error', "Un probleme est survenu.");
    }

    /**
     * Mettre a la corbeille
     */
    public function corbeille(Document $document)
    {
        $get_document = Document::where('id',$document->id)->first();
        if ($get_document) {
            $get_document->corbeille = 1;
            $get_document->save();
            return to_route('stagiaire.document.index')->with('success', $get_document->path . " mis a la corbeille.");
        }

        return back()->with('error', "Un probleme est survenu.");
    }
}
