@csrf

<div class="row">

    <div class="col-md-6 mb-3">

        <label class="form-label">

            Nome

        </label>

        <input
            type="text"
            name="name"
            class="form-control"
            value="{{ old('name',$user->name ?? '') }}"
            required
        >

    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label">

            E-mail

        </label>

        <input
            type="email"
            name="email"
            class="form-control"
            value="{{ old('email',$user->email ?? '') }}"
            required
        >

    </div>

</div>

<div class="row">

    <div class="col-md-6 mb-3">

        <label class="form-label">

            Senha

        </label>

        <input
            type="password"
            name="password"
            class="form-control"
        >

        @isset($user)

            <small class="text-muted">

                Deixe em branco para manter a senha atual.

            </small>

        @endisset

    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label">

            Confirmar Senha

        </label>

        <input
            type="password"
            name="password_confirmation"
            class="form-control"
        >

    </div>

</div>

<div class="mb-4">

    <label class="form-label">

        Roles

    </label>

    <select
        name="roles[]"
        class="form-select"
        multiple
    >

        @foreach($roles as $role)

            <option
                value="{{ $role->slug }}"

                @selected(

                    isset($user)

                    ? $user->roles->contains('slug',$role->slug)

                    : false

                )

            >

                {{ $role->display_name }}

            </option>

        @endforeach

    </select>

</div>

<div>

    <button
        class="btn btn-primary"
    >

        Salvar

    </button>

    <a
        href="{{ route('core.users.index') }}"
        class="btn btn-secondary"
    >

        Cancelar

    </a>

</div>