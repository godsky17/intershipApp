@extends('../dashboard.base')
@section('content')
@if (session('success'))
<div class="py-[18px] px-6 font-normal text-sm rounded-md bg-success-500 text-white">
    <div class="flex items-center space-x-3 rtl:space-x-reverse">
      <iconify-icon class="text-2xl flex-0" icon="system-uicons:target"></iconify-icon>
      <p class="flex-1 font-Inter">
        {{ session("success") }}
      </p>
      <div class="flex-0 text-xl cursor-pointer">
        <iconify-icon icon="line-md:close"></iconify-icon>
      </div>
    </div>
  </div>
@endif
    <div class=" space-y-5">
        <div class="card">
            <header class=" card-header noborder">
                <h4 class="card-title">Advanced Table
                </h4>
            </header>
            <div class="card-body px-6 pb-6">
                <div class="overflow-x-auto -mx-6 dashcode-data-table">
                    <span class=" col-span-8  hidden"></span>
                    <span class="  col-span-4 hidden"></span>
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden ">
                            <div id="data-table_wrapper" class="dataTables_wrapper no-footer">
                                <div class="grid grid-cols-12 gap-5 px-6 mt-6">
                                    <div class="col-span-4">
                                        <div class="dataTables_length" id="data-table_length"><label>Show <select
                                                    name="data-table_length" aria-controls="data-table" class="">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> entries</label></div>
                                    </div>
                                    <div class="col-span-8 flex justify-end">
                                        <div id="data-table_filter" class="dataTables_filter"><label>Search:<input
                                                    type="search" class="" placeholder=""
                                                    aria-controls="data-table"></label></div>
                                    </div>
                                    <div id="pagination" class="flex items-center"></div>
                                </div>
                                <div class="min-w-full">
                                    <table
                                        class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 dataTable no-footer"
                                        id="data-table">
                                        <thead class=" border-t border-slate-100 dark:border-slate-800">
                                            <tr>
                                                <th scope="col" class="table-th sorting" tabindex="0"
                                                    aria-controls="data-table" rowspan="1" colspan="1"
                                                    aria-label="
                      Order
                    : activate to sort column ascending"
                                                    style="width: 60.031px;">
                                                    Nom prenom(s)
                                                </th>
                                                <th scope="col" class="table-th sorting" tabindex="0"
                                                    aria-controls="data-table" rowspan="1" colspan="1"
                                                    aria-label="
                      Amount
                    : activate to sort column ascending"
                                                    style="width: 77.844px;">
                                                    email
                                                </th>
                                                <th scope="col" class="table-th sorting" tabindex="0"
                                                    aria-controls="data-table" rowspan="1" colspan="1"
                                                    aria-label="
                      Customer
                    : activate to sort column ascending"
                                                    style="width: 154.547px;">
                                                    Diplome
                                                </th>
                                                <th scope="col" class="table-th sorting" tabindex="0"
                                                    aria-controls="data-table" rowspan="1" colspan="1"
                                                    aria-label="
                      Date
                    : activate to sort column ascending"
                                                    style="width: 91.641px;">
                                                    Binome
                                                </th>
                                                <th scope="col" class="table-th sorting" tabindex="0"
                                                    aria-controls="data-table" rowspan="1" colspan="1"
                                                    aria-label="
                      Quantity
                    : activate to sort column ascending"
                                                    style="width: 81.312px;">
                                                    Ordinateur
                                                </th>
                                                <th scope="col" class="table-th sorting" tabindex="0"
                                                    aria-controls="data-table" rowspan="1" colspan="1"
                                                    aria-label="
                      Status
                    : activate to sort column ascending"
                                                    style="width: 115.203px;">
                                                    Recu
                                                </th>
                                                <th scope="col" class="table-th sorting" tabindex="0"
                                                    aria-controls="data-table" rowspan="1" colspan="1"
                                                    aria-label="
                      Action
                    : activate to sort column ascending"
                                                    style="width: 63.234px;">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                            @forelse ($interships as $item)
                                            <tr class="odd">
                                                <td class="table-td ">{{ $item->user->getName() }}</td>
                                                <td class="table-td">{{ $item->user->getEmail() }}</td>
                                                <td class="table-td ">{{ $item->last_graduate }}</td>
                                                <td class="table-td ">
                                                    <div>
                                                        {{ $item->is_pair() }}
                                                    </div>
                                                </td>
                                                <td class="table-td ">
                                                    <div>
                                                        {{ $item->have_computer() }}
                                                    </div>
                                                </td>
                                                <td class="table-td ">

                                                    {{ ($item->created_at) }}

                                                </td>
                                                <td class="table-td ">
                                                    <div>
                                                        <div class="relative">
                                                            <div class="dropdown relative">
                                                                <button class="text-xl text-center block w-full "
                                                                    type="button" id="tableDropdownMenuButton1"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    hello
                                                                    <iconify-icon
                                                                        icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                                </button>
                                                                <ul
                                                                    class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                                                    shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                    <li>
                                                                        <a href="{{route('intership.show', $item)}}"
                                                                            class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                                            dark:hover:text-white">
                                                                            Voir</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="{{route('intership.accepted', $item)}}"
                                                                            class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                                            dark:hover:text-white">
                                                                            Accepter</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#"
                                                                            class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                                            dark:hover:text-white">
                                                                            Refuser</a>
                                                                    </li>
                                                                    
                                                                    <li>
                                                                        <a href="#"
                                                                            class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                                                            dark:hover:text-white">
                                                                            Refuser</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                                
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="flex justify-end items-center">
                                    <div class="dataTables_paginate paging_simple_numbers" id="data-table_paginate"><a
                                            class="paginate_button previous disabled" aria-controls="data-table"
                                            aria-disabled="true" aria-role="link" data-dt-idx="previous" tabindex="-1"
                                            id="data-table_previous"><iconify-icon
                                                icon="ic:round-keyboard-arrow-left"></iconify-icon></a><span><a
                                                class="paginate_button current" aria-controls="data-table"
                                                aria-role="link" aria-current="page" data-dt-idx="0"
                                                tabindex="0">1</a><a class="paginate_button "
                                                aria-controls="data-table" aria-role="link" data-dt-idx="1"
                                                tabindex="0">2</a><a class="paginate_button "
                                                aria-controls="data-table" aria-role="link" data-dt-idx="2"
                                                tabindex="0">3</a><a class="paginate_button "
                                                aria-controls="data-table" aria-role="link" data-dt-idx="3"
                                                tabindex="0">4</a><a class="paginate_button "
                                                aria-controls="data-table" aria-role="link" data-dt-idx="4"
                                                tabindex="0">5</a></span><a class="paginate_button next"
                                            aria-controls="data-table" aria-role="link" data-dt-idx="next"
                                            tabindex="0" id="data-table_next"><iconify-icon
                                                icon="ic:round-keyboard-arrow-right"></iconify-icon></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
