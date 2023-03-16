@props(["messages", "utilisateurs"])

@forelse ($messages as $message)

    <div class="messages_surbrillance">

        @if ( ! ($message->id % 2))
            <div class="row">
                <div id="lara_gpt" class="col-11 d-flex flex-nowrap align-items-center justify-content-between mb-3 py-2 px-3">
                    <div class="d-flex">
                        <img src="{{ asset('medias/humanoid.png') }}" alt="Image profil de LaraGPT">

                        <div class="ms-4 text-start">
                            <h6>Lara</h6>

                            @if( ! str_contains($message->texte, "google"))
                                <p class="mb-0 pe-2">{{ $message->texte }}</p>
                            @else
                                <p class="mb-0 pe-2">
                                    <a href="{{ $message->texte }}" class="lien_google">Je ne sais pas quoi répondre...</a>
                                </p>
                            @endif
                        </div>
                    </div>

                    <small class="timestamp align-self-end">
                        <span class="date">{{ $message->created_at->format('d-m-y') }}</span>
                        <span>{{ $message->created_at->format('H:i') }}</span>
                    </small>
                </div>
            </div>
        @endif

        @foreach ($utilisateurs as $utilisateur)

            @if ($message->id % 2)
                <div class="row">
                    <div id="utilisateur" class="col-11 offset-1 d-flex flex-nowrap align-items-center justify-content-between mb-3 py-2 px-3">
                        <small class="timestamp align-self-end">
                            <span class="date">{{ $message->created_at->format('d-m-y') }}</span>
                            <span>{{ $message->created_at->format('H:i') }}</span>
                        </small>

                        <div class="d-flex">
                            <div class="me-4 text-end">
                                <h6>{{ ucwords($utilisateur->nom) }}</h6>
                                <p class="mb-0 ps-2">{{ $message->texte }}</p>
                            </div>

                            <img src="{{ $utilisateur->image }}" alt="Image profil de l'utilisateur">
                        </div>
                    </div>
                </div>
            @endif

        @endforeach

    </div>

@empty
    <p>Aucun message dans le chat</p>
@endforelse
