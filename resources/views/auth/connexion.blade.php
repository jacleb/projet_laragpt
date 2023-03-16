<x-layout>

    <x-modal-messages />

    <main class="testm w-50 m-auto mt-5">

        <div class="container py-5">
            <h1 class="text-center text-color m-0">connectez-vous</h1>

            <form action="{{ url('/connexion') }}" method="post" class="mt-4">
                @csrf

                <div class="w-75 m-auto">
                    <div class="form-floating mb-2">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Courriel" autofocus>
                        <label class="form" for="email">courriel</label>

                        <x-form-message champ="email" />
                    </div>

                    <div class="form-floating mb-2">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Mot de passe" autocomplete="off">
                        <label class="form" for="password">mot de passe</label>

                        <x-form-message champ="password" />
                    </div>

                    <p class="text-center my-5">
                        <input type="submit" class="bouton btn btn-primary me-2" value="soumettre">
                    </p>
                </div>
            </form>

            <div class="d-flex align-items-center justify-content-center">
                <h4 class="me-3">pas de compte?</h4>
                <h4><a href="{{ route('enregistrement') }}" class="lien">enregistrez-vous</a></h4>
            </div>
        </div>

    </main>

</x-layout>
