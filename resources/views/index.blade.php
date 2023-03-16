<x-layout>

    <x-modal-messages />

    <header class="d-flex justify-content-end mt-5 mb-2 mx-5">
        <div class="d-flex flex-nowrap align-items-center">

            <span class="nom">{{ ucwords(auth()->user()->nom) }}</span>

            @auth
                <a href="{{ url('/deconnexion') }}" class=" ms-3 me-5">
                    <div id="icone"></div>
                </a>
            @endauth

        </div>
    </header>

    <main class="text-center">
        <h1 class="mb-4">- LaraGPT -</h1>

        <div class="chat container flex-column align-items-center w-50 p-0">

            <x-form-message champ="utilisateur_message" />

            <form action="{{ url('/soumission') }}" method="post" class="champs_texte d-flex flex-nowrap mb-0">
                @csrf

                <textarea name="utilisateur_message" id="utilisateur_message" class="px-2 py-1 w-100" placeholder="Écrivez un message à Lara..." autofocus></textarea>
                <input type="submit" value="soumettre" class="h-100">

            </form>

            <div class="bloc_messages p-4">
                <x-chat :messages="$messages" :utilisateurs="$utilisateurs" />
            </div>

        </div>
    </main>

</x-layout>
