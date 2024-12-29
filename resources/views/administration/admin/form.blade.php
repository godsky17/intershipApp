@extends('../administration.dashboard/base')
@section('content')
    <div class="card xl:col-span-2">
        <div class="card-body flex flex-col p-6">
            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">
                        {{ $admin->exists ? 'Modifier un administrateur' : 'Ajouter un administrateur' }}</div>
                </div>
            </header>
            <div class="card-text h-full">
                <x-auth.form method="POST"
                    action="{{ $admin->exists ? route('admin.updateRoleStore', $admin) : route('admin.store') }}"
                    id="multipleValidation" novalidate="novalidate">
                    <div class="grid md:grid-cols-2 gap-6">

                        <x-auth.input class="input-area" type="text" label="Nom" name="last_name"
                            value="{{ old('last_name', $admin->last_name) }}" placeholder="Entrer un nom"></x-auth.input>
                        <x-auth.input class="input-area" type="text" label="Prenom(s)" name="first_name"
                            value="{{ old('first_name', $admin->first_name) }}"
                            placeholder="Entrer un prenom"></x-auth.input>
                        <x-auth.input class="input-area" type="text" label="Poste" name="post"
                            value="{{ old('post', $admin->post) }}" placeholder="Entrer un poste"></x-auth.input>
                        <x-auth.input class="input-area" type="email" label="Email" name="email"
                            value="{{ old('email', $admin->email) }}" placeholder="Entrer un email"></x-auth.input>
                        <x-auth.input class="input-area" type="text" label="Numero" name="phone_number"
                            value="{{ old('phone_number', $admin->phone_number) }}"
                            placeholder="+2290000000000"></x-auth.input>
                        <x-auth.input class="input-area" type="text" label="Type de contrat" name="contrat_type"
                            value="{{ old('contrat_type', $admin->contrat_type) }}" placeholder="CDI"></x-auth.input>
                    </div>
                    <div>
                        <label for="basicSelect" class="form-label">Role</label>
                        <select name="role_id" id="basicSelect" class="form-control w-full mt-2">
                            @foreach ($roles as $k => $v)
                                <option @selected($admin->role_id === $k) value="{{ $k }}"
                                    class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">
                                    {{ $v }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('role_id')
                        <div class="">
                            <p class="" style="color: red; font-size:13px; font-weigth:300">
                                {{ $message }}
                            </p>
                        </div>
                    @enderror
                    <button
                        class="btn flex justify-center btn-dark ml-auto">{{ $admin->exists ? 'Modifier' : 'Ajouter' }}</button>
                </x-auth.form>
            </div>
        </div>
    </div>
@endsection
