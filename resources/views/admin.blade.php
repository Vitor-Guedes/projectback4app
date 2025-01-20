<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
    @php
        $action = route('web.profile.store');
        if (isset($profile)) {
            $action = route('web.profile.update');
        }
    @endphp

    <form action="{{ $action }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ isset($profile) ? $profile?->id : '' }}">
        <input type="text" name="name" placeholder="Nome" value="{{ isset($profile) ? $profile?->name : '' }}">
        <input type="text" name="image" placeholder="Url da Imagem" value="{{ isset($profile) ? $profile?->image : '' }}">
        <textarea name="description" id="description" cols="30" rows="10">
            {{ isset($profile) ? $profile?->description : '' }}
        </textarea>
        <input type="text" name="links[github]" placeholder="Link do Git" value="{{ isset($profile) ? $profile?->links['github'] : '' }}">
        <input type="text" name="links[portfolio]" placeholder="Link dos projetos" value="{{ isset($profile) ? $profile?->links['portfolio'] : '' }}">
        <input type="text" name="links[skils]" placeholder="Habilidades" value="{{ isset($profile) ? $profile?->links['skils'] : '' }}">
        <input type="text" name="links[contacts]" placeholder="Contatos" value="{{ isset($profile) ? $profile?->links['contacts'] : '' }}">
        <button type="submit">salvar</button>
    </form>
</body>
</html>