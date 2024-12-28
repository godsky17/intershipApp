@extends('../dashboard/base')
@section('content')




          


            <div class="grid xl:grid-cols-2 grid-cols-1 gap-5">
               

                <!-- BEGIN: Hover Tables -->
                <div class="card">
                    <header class=" card-header noborder">
                        <h4 class="card-title">Hover Table
                        </h4>
                    </header>
                    <div class="card-body px-6 pb-6">
                        <div class="overflow-x-auto -mx-6">
                            <div class="inline-block min-w-full align-middle">
                                <div class="overflow-hidden ">
                                    <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                        <thead class="bg-slate-200 dark:bg-slate-700">
                                            <tr>

                                                <th scope="col" class=" table-th ">
                                                    Nom
                                                </th>

                                                <th scope="col" class=" table-th ">
                                                    Prenom
                                                </th>

                                                <th scope="col" class="table-th">
                                                    Post
                                                </th>

                                                <th scope="col" class=" table-th ">
                                                    Information
                                                </th>
                                                
                                                <th scope="col" class=" table-th ">
                                                    
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody
                                            class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                                            @forelse ($interships as $item)
                                            <tr class="hover:bg-slate-200 dark:hover:bg-slate-700">
                                                <td class="table-td">{{ $item->last_name }}</td>
                                                <td class="table-td">{{ $item->first_name }}</td>
                                                <td class="table-td ">{{ $item->sector }}</td>
                                                <td class="table-td ">
                                                    {{ $item->email }} <br>
                                                    {{ $item->phone_number }} <br>
                                                </td>
                                                <td class="table-td ">
                                                    <span class="badge bg-{{ $item->online ? 'success' : 'danger'}}-500 text-white capitalize rounded-3xl">{{ $item->online ? 'En ligne' : 'Deconnecte'}}</span>
                                                </td>
                                            </tr>
                                            @empty
                                                
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- END: Hover Tables -->
            </div>
            {{ $interships->links() }}
@endsection
