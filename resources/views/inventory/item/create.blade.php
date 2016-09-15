@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
       <li><a href="{{{URL::route('item.index')}}}">{{ trans_choice('messages.item', 2) }}</a></li>
	 	  <li class="active">{{ trans('messages.new').' '.trans_choice('messages.item', 1) }}</li>
	</ol>
</div>
@if (Session::has('message'))
	<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif
@if($errors->all())
                <div class="alert alert-danger">
                    {{ HTML::ul($errors->all()) }}
                </div>
@endif
<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-user"></span>
		{{ trans_choice('messages.item', 2) }}
	</div>
	<div class="panel-body">
		   {{ Form::open(array('route' => 'item.store', 'id' => 'form-store_items')) }}

            <div class="form-group">
                {{ Form::label('name', trans_choice('messages.name', 1)) }}
                {{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'rows' => '2')) }}
            </div>
            <div class="form-group">
                {{ Form::label('unit', trans('messages.unit')) }}
                {{ Form::text('unit', Input::old('unit'),array('class' => 'form-control', 'rows' => '2')) }}
            </div>
            <div class="form-group">
                {{ Form::label('min_level', trans('messages.min-level')) }}
                {{ Form::text('min_level', Input::old('min_level'),array('class' => 'form-control', 'rows' => '2')) }}
            </div>
            <div class="form-group">
                {{ Form::label('max_level', trans('messages.max-level')) }}
                {{ Form::text('max_level', Input::old('max_level'),array('class' => 'form-control', 'rows' => '2')) }}
            </div>            
             <div class="form-group">
                {{ Form::label('storage_req', trans('messages.storage')) }}
                {{ Form::textarea('storage_req', Input::old('storage_req'), array('class' => 'form-control', 'rows' => '2')) }}
            </div>
             <div class="form-group">
                {{ Form::label('remarks', trans('messages.remarks')) }}
                {{ Form::textarea('remarks', Input::old('remarks'), array('class' => 'form-control', 'rows' => '2')) }}
            </div>

            <div class="form-group actions-row">
                    {{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save'), 
                        array('class' => 'btn btn-primary', 'onclick' => 'submit()')) }}
            </div>
        {{ Form::close() }}
	</div>
	
</div>
@stop