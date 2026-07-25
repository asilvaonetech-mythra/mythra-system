@extends('layouts.mythra')

@section('title', 'Usuários x Roles - Mythra Core')


@section('content')


<div class="mythra-core">


<div class="core-header">


<div class="core-symbol">
✦
</div>


<div>

<h1>
Usuários x Roles
</h1>


<p>
Gerenciamento de níveis de acesso Mythra
</p>


</div>


</div>





<section class="core-card">


@foreach($users as $user)


<div>


<h3>
{{ $user->name }}
</h3>


<p>
{{ $user->email }}
</p>



<strong>
Roles:
</strong>



@forelse($user->roles as $role)


<span>

{{ $role->display_name ?? $role->name }}

</span>


@empty


Nenhuma role


@endforelse



<br><br>



<a
href="{{ route('core.user-roles.edit',$user) }}"
class="core-action"
>


Editar Acessos


</a>



</div>


<hr>


@endforeach


</section>


</div>


@endsection