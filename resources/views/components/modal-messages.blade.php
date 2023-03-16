@if (session('succes-creation'))
    <div class="modal fade" id="message_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="message_succes modal-body d-flex flex-no-wrap align-items-center justify-content-between">

                    <div>
                        <p class="p-0 text-start">{{ session('succes-creation') }}</p>
                        <p class="p-0 m-0text-start">Bienvenue, {{ auth()->user()->nom }}</p>
                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
            </div>
        </div>
    </div>
@endif


@if (session('succes-connexion'))
    <div class="modal fade" id="message_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="message_succes modal-body d-flex flex-no-wrap align-items-center justify-content-between">

                    <p class="p-0 m-0">Bienvenue, {{ auth()->user()->nom }}</p>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
            </div>
        </div>
    </div>
@endif


@if(session('echec-connexion'))
    <div class="modal fade" id="message_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="message_echec modal-body d-flex flex-no-wrap align-items-center justify-content-between">

                    <p class="p-0 m-0">{{ session('echec-connexion') }}</p>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
            </div>
        </div>
    </div>
@endif


@if (session('succes-deconnexion'))
    <div class="modal fade" id="message_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="message_succes modal-body d-flex flex-no-wrap align-items-center justify-content-between">

                    <p class="p-0 m-0">{{ session('succes-deconnexion') }}</p>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
            </div>
        </div>
    </div>
@endif
