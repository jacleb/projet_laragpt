<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnexionController extends Controller
{
    /**
     * Affiche le formulaire de connexion
     */
    public function connexion() {
        return view('auth.connexion');
    }

    /**
     * Traite la connexion de l'utilisateur
     *
     * @param Request $request Contient les données de connexion
     */
    public function authentifier(Request $request) {
        // Valider
        $infos_valides = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => "Le courriel est requis",
            'email.email' => "Le courriel doit être valide",
            'password.required' => "Le mot de passe est requis"
        ]);

        // Tentative de connexion
        if(auth()->attempt($infos_valides)){
            // La connexion a réussi et l'utilisateur est redirigé avec confirmation
            return redirect()
                ->route('accueil')
                ->with('succes-connexion', 'Connexion réussie!');
        }

        // La connexion a échoué et l'utilisateur est ramené "en arrière" au formulaire de connexion, avec message d'erreur
        return back()
            ->with('echec-connexion', 'Erreur! Les informations soumises n\'ont pu être vérifiées');
    }

    /**
     * Déconnexion du compte utilisateur
     *
     * @return void
     */
    public function deconnecter() {
        auth()->logout();

        return redirect()
            ->route('accueil')
            ->with('succes-deconnexion', 'Vous êtes déconnecté!');
    }
}
