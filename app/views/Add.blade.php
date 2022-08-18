@extends('Layout')

@section('Content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function () {
        $('#div_loading').remove();
        $('#div_main').css("display", "");
        $('#header_li_add').css('background', 'green');

        $("#startDate").datepicker();
        $("#startDate").datepicker("option", "dateFormat", "yy-mm-dd");
        $("#endDate").datepicker();
        $("#endDate").datepicker("option", "dateFormat", "yy-mm-dd");
    });
</script>

@include('Loading')

<div id="div_main" class="border" style="display: none;">
    {{ Form::open(['route'=>'transactions.store']) }}
    <div>
        {{ Form::label('title','Title: ',array('class' => 'form-control')) }}
        {{ Form::text('title','',array('required' => 'required')) }}
    </div>
    <div>
        {{ Form::label('content','Content: ',array('class' => 'form-control')) }}
        {{ Form::textarea('content','',array('required' => 'required')) }}
    </div>
    <div>
        {{ Form::label('startDate','Start Date: ',array('class' => 'form-control')) }}
        {{ Form::text('startDate','',array('required' => 'required')) }}
    </div>
    <div>
        {{ Form::label('endDate','End Date: ',array('class' => 'form-control')) }}
        {{ Form::text('endDate','',array('required' => 'required')) }}
    </div>
    <div>
        {{ Form::Submit('Add',array('class' => 'btn btn-primary')) }}
    </div>
    {{ Form::close() }}
</div>

@stop