@extends('stagiaire.base')
@section('content')
    <div class="card xl:col-span-2">
        <div class="card-body flex flex-col p-6">
            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">
                        {{ $theme->exists ? 'Modifier un theme' : 'Ajouter un theme' }}</div>
                </div>
            </header>
            <div class="card-text h-full">
                <x-auth.form method="POST" action="{{ $theme->exists ? route('stagiaire.theme.update', $theme) : route('stagiaire.theme.store')  }}" id="multipleValidation"
                    novalidate="novalidate">
                    <div class="grid md:grid-cols-1 gap-6">

                        <x-auth.input class="input-area" type="text" label="Theme" name="title"
                            value="{{ old('title', $theme->title) }}" placeholder="Entrer un theme"></x-auth.input>

                        <x-auth.input class="input-area" type="date" label="Date de presentation" name="date"
                            value="{{ old('date', $theme->date) }}" placeholder=""></x-auth.input>
                    </div>
                    <button
                        class="btn flex justify-center btn-dark ml-auto">{{ $theme->exists ? 'Modifier' : 'Ajouter' }}</button>
                </x-auth.form>
            </div>
        </div>
    </div>
@endsection
