@extends('stagiaire.base')
@section('content')
    <div class="card xl:col-span-2">
        <div class="card-body flex flex-col p-6">
            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">
                        {{ $document->exists ? 'Modifier un document' : 'Ajouter un document' }}</div>
                </div>
            </header>
            <div class="card-text h-full">
                <x-auth.form  enctype="multipart/form-data" method="POST" action="{{ $document->exists ? route('stagiaire.document.update', $document) : route('stagiaire.document.store')  }}" id="multipleValidation"
                    novalidate="novalidate" >
                    <div class="grid md:grid-cols-1 gap-6">

                        <div class="formGroup text-slate-500">
                            <label for="basicSelect" class="form-label">Theme</label>
                            <select name="theme_id" id="basicSelect" class="form-control w-full mt-2">
                              @forelse  ($themes as $item)
                              <option @selected(old('theme_id') == $item->id) value="{{$item->id}}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-500">{{$item->title}}</option>      
                              @empty
                              <option selected value="" class="py-1 inline-block font-Inter font-normal text-sm text-slate-500">Aucun theme disponible</option>      
                              @endforelse
                            </select>
                            @error("theme_id")
                            <div class="">
                                <p class="" style="color: red; font-size:13px; font-weigth:300">
                                    {{ $message }}
                                </p>
                            </div>
                        @enderror
                        </div>

                        <x-auth.input class="input-area" type="file" label="Document" name="path"
                            value="{{ old('path', $document->path) }}" placeholder=""></x-auth.input>

                    </div>
                    <button
                        class="btn btn-sm flex justify-center btn-dark ml-auto">{{ $document->exists ? 'Modifier' : 'Ajouter' }}</button>
                </x-auth.form>
            </div>
        </div>
    </div>
@endsection
