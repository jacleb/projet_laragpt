@props(['champ'])

@error($champ)
    <p class="message_erreur alert">{{ $message }}</p>
@enderror
