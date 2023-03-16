<x-layout>

    <header class="text-end mt-5 mb-2 mx-5">
        <a href="{{ route('accueil') }}" class="bouton btn btn-secondary">retour à l'accueil</a>
    </header>

    <main class="w-50 mx-auto">

        <div class="container pb-5">
            <h1 class="text-center m-0">créez un compte</h1>

            <form action="{{ url('/enregistrement') }}" method="post" enctype="multipart/form-data" class="mt-4">
                @csrf

                <div class="w-75 m-auto">
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" id="nom" placeholder="Votre nom" name="nom"
                        value="{{ old('nom') }}" autofocus>
                        <label class="form" for="nom">nom</label>

                        <x-form-message champ="nom" />
                    </div>

                    <div class="form-floating mb-2">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Courriel">
                        <label class="form" for="email">courriel</label>

                        <x-form-message champ="email" />
                    </div>

                    <div class="form-floating mb-2">
                        <input type="password" class="form-control" id="password" name="password"
                        placeholder="Mot de passe" autocomplete="off">
                        <label class="form" for="password">mot de passe</label>

                        <x-form-message champ="password" />
                    </div>

                    <div class="form-floating mb-2">
                        <input type="password" class="form-control" id="password-confirm" name="password-confirm"
                        placeholder="Confirmez le mot de passe" autocomplete="off">
                        <label class="form" for="password-confirm">confirmez le mot de passe</label>

                        <x-form-message champ="password-confirm" />
                    </div>

                    <div class="form_img mb-2">
                        <label class="form me-3" for="image">Téléversez une image de profil:</label>
                        <input type="file" id="image" name="image" class="mb-3">

                        <x-form-message champ="image" />
                    </div>

                    <p class="text-center my-5">
                        <input type="submit" class="bouton btn btn-primary me-2" value="soumettre">
                    </p>
                </div>
            </form>

            <div class="d-flex align-items-center justify-content-center">
                <h4 class="me-3">vous avez un compte?</h4>
                <h4><a href="{{ route('connexion') }}" class="lien">connectez-vous</a></h4>
            </div>
        </div>

    </main>

</x-layout>
