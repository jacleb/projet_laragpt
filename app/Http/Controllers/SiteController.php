<?php

namespace App\Http\Controllers;


use App\Models\Message;
use App\Models\Utilisateur;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    /**
     * Affiche le "chatbot" de LaraGPT
     *
     */
    public function index() {
        // Encapsule l'id de l'utilisateur connecté
        $id = Auth::id();

        return view('index',[
            "messages" => Message::with('utilisateur')->where('utilisateur_id', $id)->orderBy('created_at', 'DESC')->orderBy('id', 'DESC')->get(),
            "utilisateurs" => Utilisateur::with('message')->where('id', $id)->get()
        ]);
    }

    /**
     * Traite les données d'un nouveau message
     *
     * @param Request $request Données reçues
     */
    public function store(Request $request) {
        // Valider
        $request->validate([
            'utilisateur_message' => 'required',
        ], [
            'utilisateur_message.required' => 'Un message est requis',
        ]);

        // Création d'un nouveau message
        $message = new Message();
        $message->texte = $request->utilisateur_message;
        $message->utilisateur_id = Auth::id();

        // Sauvegarde le $message dans la BDD
        $message->save();

        // Lit et décode le fichier json. Le contenu est encapsulé dans la variable $phrases
        $json = File::get(public_path("json/phrases.json"));
        $phrases = json_decode($json);

        $reponse = null;

        // Boucle pour vérifier si un mot-clé du tableau associatif se trouve dans le message envoyé
        foreach ($phrases as $keyword => $phrase) {

            if (stripos($message->texte, $keyword) !== false) {

                // Remplace les informations entre [crochet] dans $reponse, s'il y a lieu
                if(stripos($phrase, '[nom]')) {
                    $phrase = str_replace('[nom]', Auth::user()->nom, $phrase);
                    $reponse = $phrase;
                    break;
                } else if(stripos($phrase,'[heure]')) {
                    $phrase = str_replace('[heure]', Carbon::now()->format('H:i'), $phrase);
                    $reponse = $phrase;
                    break;
                } else {
                    $reponse = $phrase;
                }
            }
        }

        // Si le message ne contient pas de mot-clé du tableau associatif, concaténation de l'URL Google avec le résultat de la fonction urlencode()
        if ($reponse === null) {
            $reponse = 'https://www.google.com/search?q=' . urlencode($message->texte);
        }

        // Création d'un nouveau message avec la réponse à LaraGPT, associé à l'utilisateur connecté
        $reponse_lara = new Message();
        $reponse_lara->texte = $reponse;
        $reponse_lara->utilisateur_id = Auth::id();

        // Sauvegarde la $reponse_lara dans la BDD
        $reponse_lara->save();

        // Redirection vers la page d'accueil (mis-à-jour)
        return redirect()
            ->route('accueil');
    }


}

