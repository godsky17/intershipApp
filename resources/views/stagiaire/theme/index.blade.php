@extends('stagiaire.base')
@section('content')
    <div class="card">
        <header class=" card-header noborder">
            <h4 class="card-title">Hover Table
            </h4>
            <a href="{{ route('stagiaire.theme.create') }}"
                class="btn inline-flex justify-center mx-2 mt-3 btn-dark active">Ajouter</a>
        </header>
        <div class="card-body px-6 pb-6">
            <div class="overflow-x-auto -mx-6">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                        <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                            <thead class="bg-slate-200 dark:bg-slate-700">
                                <tr>

                                    <th scope="col" class=" table-th ">
                                        Theme
                                    </th>

                                    <th scope="col" class=" table-th ">
                                        Valider
                                    </th>

                                    <th scope="col" class=" table-th ">
                                        statut
                                    </th>

                                    <th scope="col" class=" table-th ">
                                        Date de soumission
                                    </th>

                                    <th scope="col" class=" table-th ">
                                        Action
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                                @foreach ($themes as $item)
                                    <tr
                                        class="hover:bg-slate-200 dark:hover:bg-slate-700 {{ $item->achieved ? 'hidden' : '' }}">
                                        <td class="table-td">{{ $item->title }}</td>
                                        <td class="table-td">{{ $item->is_validate() }}</td>
                                        <td class="table-td">{{ $item->statut() }}</td>
                                        <td class="table-td ">{{ $item->created_at }}</td>
                                        <td class="table-td ">
                                            <div>
                                                <div class="relative">
                                                    <div class="dropdown relative">
                                                        <button class="text-xl text-center block w-full " type="button"
                                                            id="tableDropdownMenuButton1" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <iconify-icon
                                                                icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                        </button>
                                                        <ul
                                                            class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                      shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                            <li>
                                                                <a href="{{ route('stagiaire.theme.update', $item) }}"
                                                                    class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                                                    Modifier</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('stagiaire.theme.achieved', $item) }}"
                                                                    class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                                                    Archiver</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('stagiaire.theme.delete', $item) }}"
                                                                    class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                                                    Supprimer</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
