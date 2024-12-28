@extends('../dashboard/base')
@section('content')
    <div class="grid grid-cols-1 gap-5">
        <div class="xl:col-span-5 lg:col-span-7 col-span-12">
            <div class="card h-full">
                <div class="card-header">
                    <h4 class="card-title">
                        {{ $intership->user->getName() }}</h4>
                </div>
                <div class="card-body p-6">
                    <div class="bg-slate-100 dark:bg-slate-700 rounded px-4 pt-4 pb-1 flex flex-wrap justify-between mb-6">
                        <div class="mr-3 mb-3 space-y-2">
                            <div class="text-xs font-medium text-slate-600 dark:text-slate-300">
                                Information
                            </div>
                            <div class="text-xs text-slate-600 dark:text-slate-300">
                                {{ $intership->user->getEmail() }}<br>
                                {{ $intership->user->phone_number }}<br>
                                {{ $intership->user->sexe ? 'Masculin' : 'Feminin' }}
                            </div>
                        </div>
                        <div class="mr-3 mb-3 space-y-2">
                            <div class="text-xs font-medium text-slate-600 dark:text-slate-300">
                                Secteur
                            </div>
                            <div class="text-xs text-slate-600 dark:text-slate-300">
                                {{ $intership->user->sector }}
                            </div>
                        </div>
                        <div class="mr-3 mb-3 space-y-2">
                            <div class="text-xs font-medium text-slate-600 dark:text-slate-300">
                                Dernier diplome
                            </div>
                            <div class="text-xs text-slate-600 dark:text-slate-300">
                                {{ $intership->last_graduate }}<br>
                                {{ $intership->last_graduate_date }}<br>
                                {{ $intership->last_graduate_school }}
                            </div>
                        </div>
                        <div class="mr-3 mb-3 space-y-2">
                            <div class="text-xs font-medium text-slate-600 dark:text-slate-300">
                                Deadline
                            </div>
                            <div class="text-xs text-warning-500">01/11/2021</div>
                        </div>
                    </div>
                    <div>
                        <div class="text-base font-medium text-slate-800 dark:text-slate-100 mb-3">
                            Motivation
                        </div>
                        <p class="text-sm text-slate-600 dark:text-slate-300">
                            {{ $intership->user->motivation }}
                        </p>
                        <br>
                        <div class="text-base font-medium text-slate-800 dark:text-slate-100 mb-3">
                            Objectif
                        </div>
                        <p class="text-sm text-slate-600 dark:text-slate-300">
                            {{ $intership->user->objectif }}
                        </p>
                        <div class="card-text h-full space-x-3 mt-8">
                            <div class="text-base font-medium text-slate-800 dark:text-slate-100 mb-3">
                                Competences
                            </div>


                            <div class="flex flex-wrap justify-between">
                                <div class="">
                                    @forelse (explode( ' ',$intership->skills) as $item)
                                        <span
                                            class="badge bg-secondary-500 text-white capitalize rounded-3xl">{{ $item }}</span>
                                    @empty
                                        <p>Aucune competence</p>
                                    @endforelse
                                </div>
                                <div class=" ">
                                    @forelse (explode( ' ',$intership->new_skills) as $item)
                                        <span
                                            class="badge bg-primary-500 text-white capitalize rounded-3xl">{{ $item }}</span>
                                    @empty
                                        <p>Aucune competence voulu</p>
                                    @endforelse
                                </div>
                            </div>

                        </div>
                        <div class="card-text h-full space-x-3 mt-8">
                            <div class="text-base font-medium text-slate-800 dark:text-slate-100 mb-3">
                                Autres informations
                            </div>

                        </div>
                        <div class="btn-group-example btn-group gap-2 mt-4">


                            <a href="{{ route('intership.accepted', $intership) }}" class="btn inline-flex justify-center mx-2 ml-auto mt-3 btn-primary">Accepter</a>
  
                            <a href="buttons.html" class="btn inline-flex justify-center mx-2 mt-3 btn-danger active">Refuser</a>
  
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
