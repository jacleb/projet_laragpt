<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EnregistrementController extends Controller
{
    /**
     * Affiche le formulaire d'enregistrement (création de compte)
     */
    public function create() {
        return view('auth.enregistrement');
    }

    /**
     * Traite les données d'un nouvel enregistrement
     *
     * @param Request $request Données reçues
     */
    public function store(Request $request) {
        // Valider
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:utilisateurs,email',
            'password' => 'required',
            'password-confirm' => 'required|same:password',
            'image' => 'required|mimes:png,jpg,jpeg,webp'
        ], [
            'nom.required' => 'Le nom complet est requis',
            'email.required' => 'Le courriel est requis',
            'email.email' => 'Le courriel doit être valide',
            'email.unique' => 'Ce courriel existe déjà',
            'password.required' => 'Le mot de passe est requis',
            'password-confirm.required' => 'La confirmation du mot de passe est requise',
            'password-confirm.same' => 'La confirmation du mot de passe ne correspond pas au mot de passe entré',
            'image.required' => 'Le téléversement d\'une image de profil est requis',
            'image.mimes' => 'Le fichier doit avoir l\'extension .png, .jpg, .jpeg ou .webp'
        ]);

        // Création d'un nouvel utilisateur
        $utilisateur = new Utilisateur();
        $utilisateur->nom = $request->nom;
        $utilisateur->email = $request->email;
        // Encryption du mot de passe
        $utilisateur->password = Hash::make($request->password);

        // Traitement de l'image: l'image est déplacée et son chemin est insérée dans la colonne de l'entrée
        // 'public/img' fait référence au chemin à partir du dossier /storage/app
        // '/storage/app' fait référence au chemin à partir du dossier /public
        Storage::putFile('public/images', $request->image);
        $utilisateur->image = '/storage/images/' . $request->image->hashName();

        // Création d'un token unique
        $utilisateur->remember_token = Str::random(10);

        // Sauvegarde des données
        $utilisateur->save();

        // Connexion de l'utilisateur (plutôt que de le rediriger à la connexion)
        auth()->login($utilisateur);

        // Redirection avec confirmation
        return redirect()
            ->route('accueil')
            ->with('succes-creation', 'Enregistrement réussi!');
    }
}
