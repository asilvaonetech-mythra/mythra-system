@extends('layouts.mythra')

@section('title', 'Editar Roles - Mythra Core')


@section('content')


<div class="mythra-core">


<div class="core-header">


<div class="core-symbol">
✦
</div>


<div>

<h1>
Editar Acessos
</h1>


<p>
{{ $user->name }}
</p>


</div>


</div>






<section class="core-card">


<form method="POST"
action="{{ route('core.user-roles.update',$user) }}">


@csrf

@method('PUT')





<h2>
Roles disponíveis
</h2>




@foreach($roles as $role)


<div>


<label>


<input
type="checkbox"
name="roles[]"
value="{{ $role->id }}"

@if($user->roles->contains($role->id))
checked
@endif

>


{{ $role->display_name ?? $role->name }}


</label>



</div>



@endforeach





<br>



<h2>
Role principal
</h2>



<select name="primary_role">


<option value="">
Nenhuma
</option>



@foreach($user->roles as $role)


<option
value="{{ $role->id }}"

@if($role->pivot->is_primary)
selected
@endif

>


{{ $role->display_name ?? $role->name }}


</option>


@endforeach



</select>






<br><br>



<button
type="submit"
class="core-action"
>

Salvar Alterações

</button>



</form>



</section>


</div>


@endsection