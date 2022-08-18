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
        
        $("#startDate").datepicker('setDate', '<?php echo $array_data->startDate; ?>');
        $("#endDate").datepicker('setDate', '<?php echo $array_data->endDate; ?>');
    });
</script>

@include('Loading')

<div id="div_main" class="border" style="display: none;">
    {{ Form::open(['route'=>'transactions.store']) }}
    <div>
        {{ Form::label('title','Title: ',array('class' => 'form-control')) }}
        {{ Form::text('title',$array_data->title,array('required' => 'required')) }}
    </div>
    <div>
        {{ Form::label('content','Content: ',array('class' => 'form-control')) }}
        {{ Form::textarea('content',$array_data->content,array('required' => 'required')) }}
    </div>
    <div>
        {{ Form::label('startDate','Start Date: ',array('class' => 'form-control')) }}
        {{ Form::text('startDate',$array_data->startDate,array('required' => 'required')) }}
    </div>
    <div>
        {{ Form::label('endDate','End Date: ',array('class' => 'form-control')) }}
        {{ Form::text('endDate',$array_data->endDate,array('required' => 'required')) }}
    </div>
    <div>
        {{ Form::label('active','Active (1 = Yes | 0 = No): ',array('class' => 'form-control')) }}
        {{ Form::text('active',$array_data->active,array('required' => 'required')) }}
        {{ Form::hidden('id',$array_data->id) }}
    </div>
    <div>
        {{ Form::Submit('Edit',array('class' => 'btn btn-primary')) }}
    </div>
    {{ Form::close() }}
</div>

@stop