 <!-- Task name Field -->
 <div class="row">
     <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {!! Form::label('name', 'Task Name', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    <span class="help-block text-danger">
                        {{ $errors -> first('name') }}
                    </span>
                </div>
            </div>
</div>
<div class="row">
         <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            {!! Form::label('description', 'Description', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                <span class="help-block text-danger">
                    {{ $errors -> first('description') }}
                </span>
            </div>
        </div>
</div>
<div class="row">
        <!-- Submit Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
                {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
</div>