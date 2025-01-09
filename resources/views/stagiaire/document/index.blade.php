@extends('stagiaire.base')
@section('content')
    <div class="card">
        <header class=" card-header noborder">
            <h4 class="card-title">Hover Table
            </h4>
            <a href="{{route('stagiaire.document.create')}}"
                class="btn inline-flex justify-center mx-2 mt-3 btn-dark btn-sm active">Ajouter</a>
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
                                        Action
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                                @foreach ($documents as $item)
                                    <tr
                                        class="hover:bg-slate-200 dark:hover:bg-slate-700 {{ $item->achieved ? 'hidden' : '' }} {{ $item->corbeille ? 'hidden' : '' }}">
                                        <td class="table-td">{{ $item->theme->title }}</td>
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
                                                                <a href="#" data-bs-toggle="modal"
                                                                    data-bs-target="#basic_modal"
                                                                    data-title = "{{ $item->theme->title }}" data-info="{{ $item->recommandation }}" data-url="{{ asset('storage/' . $item->path) }}"
                                                                    class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                                                    Voir</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{route('stagiaire.document.achieved', $item)}}" id="link"
                                                                    class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                                                    Archiver</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{route('stagiaire.document.corbeille', $item)}}"
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

    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        id="basic_modal" tabindex="-1" aria-labelledby="basic_modal" aria-hidden="true" style="display: none;">




        <!-- BEGIN: Modal -->
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                        <h3 class="text-xl font-medium text-black dark:text-white capitalize" id="modal-title">
                        </h3>
                        <button type="button"
                            class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white"
                            data-bs-dismiss="modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="#000000" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-4">
                        <h6 class="text-base text-slate-900 dark:text-white leading-6">
                            Commentaire
                        </h6>
                        <p class="text-base text-slate-600 dark:text-slate-400 leading-6" id="modal-body">
                        </p>
                        <a href="" target="_blank" class="btn btn-sm inline-flex justify-center btn-primary block-btn" id="path">
                            <span class="flex items-center">
                                <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2" icon="heroicons-outline:newspaper"></iconify-icon>
                                <span>Lire document</span>
                            </span>
                        </a>
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                        <button data-bs-dismiss="modal"
                            class="btn btn-danger btn-sm inline-flex justify-center text-black bg-black-500">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Modals -->
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Attache un écouteur à chaque lien "Voir"
            document.querySelectorAll('[data-bs-toggle="modal"]').forEach(function(button) {
                button.addEventListener('click', function() {
                    // Récupère les informations dynamiques
                    const info = this.getAttribute('data-info');
                    const url = this.getAttribute('data-url');

                    // Injecte les informations dans le modal
                    document.getElementById('modal-title').textContent = 'Détails sur le thème';
                    document.getElementById('modal-body').textContent = info;
                    document.getElementById('path').href = url;
                });
            });
        });
    </script>
@endsection
