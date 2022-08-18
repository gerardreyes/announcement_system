@extends('Layout')

@section('Content')

<script>
    $(document).ready(function () {
        $('#div_loading').remove();
        $('#div_main').css("display", "");
        $('#header_li_login').css('background', 'green');
    });
</script>

@include('Loading')

<div id="div_main" class="border" style="display: none;">
    <h6>Psst. If you forgot, the authorized user is Username: puser | Password: puser.</h6>
    {{ Form::open(['route'=>'sessions.store']) }}
    <div>
        {{ Form::label('username','Username: ',array('class' => 'form-control')) }}
        {{ Form::text('username') }}
    </div>
    <div>
        {{ Form::label('password','Password: ',array('class' => 'form-control')) }}
        {{ Form::password('password') }}
    </div>
    <div>
        {{ Form::Submit('Login',array('class' => 'btn btn-primary')) }}
    </div>
    {{ Form::close() }}
    @if($errors->any())
    <h6 style='color:red;'>{{$errors->first()}}</h6>
    @endif
</div>

@stop