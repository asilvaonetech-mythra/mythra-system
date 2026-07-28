<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

use App\Models\User;
use App\Models\Role;

use App\Services\UserService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class UserController extends Controller
{

    public function __construct(
        private readonly UserService $service
    ) {

        $this->middleware('auth');

    }



    /**
     * Lista usuários.
     */
    public function index(Request $request)
    {

        Gate::authorize('users.view');


        $users = $this->service->paginate(

            $request->get('search')

        );


        return view(

            'core.users.index',

            compact('users')

        );

    }



    /**
     * Formulário criação.
     */
    public function create()
    {

        Gate::authorize('users.create');


        $roles = Role::active()

            ->orderBy('display_name')

            ->get();



        return view(

            'core.users.create',

            compact('roles')

        );

    }



    /**
     * Salvar usuário.
     */
    public function store(
        StoreUserRequest $request
    ) {


        Gate::authorize('users.create');



        $this->service->create(

            $request->validated()

        );



        return redirect()

            ->route('core.users.index')

            ->with(

                'success',

                'Usuário criado com sucesso.'

            );

    }




    /**
     * Formulário edição.
     */
    public function edit(User $user)
    {

        Gate::authorize(

            'users.edit'

        );



        $roles = Role::active()

            ->orderBy('display_name')

            ->get();



        $user->load('roles');



        return view(

            'core.users.edit',

            compact(

                'user',

                'roles'

            )

        );

    }





    /**
     * Atualizar usuário.
     */
    public function update(
        UpdateUserRequest $request,
        User $user
    ) {


        Gate::authorize(

            'users.edit'

        );



        $this->service->update(

            $user,

            $request->validated()

        );



        return redirect()

            ->route('core.users.index')

            ->with(

                'success',

                'Usuário atualizado com sucesso.'

            );

    }





    /**
     * Excluir usuário.
     */
    public function destroy(User $user)
    {


        Gate::authorize(

            'users.delete'

        );



        $this->service->delete(

            $user

        );



        return redirect()

            ->route('core.users.index')

            ->with(

                'success',

                'Usuário removido com sucesso.'

            );

    }

}