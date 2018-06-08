@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    {{ Form::open(['url' => route('register'), 'method' => 'post']) }}
                        @csrf

                        <div class="form-group row">
                            {{ Form::label('first_name', __('First Name'), ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            
                            <div class="col-md-6">
                                {{ Form::text('first_name', old('first_name'), ['id' => 'first_name', 'required' => 'required', 'autofocus' => true, 'class' => 'form-control' . ($errors->has('first_name') ? ' is-invalid' : '')]) }}
                                
                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            {{ Form::label('middle_name', __('Middle Name'), ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            
                            <div class="col-md-6">
                                {{ Form::text('middle_name', old('middle_name'), ['id' => 'middle_name', 'class' => 'form-control' . ($errors->has('middle_name') ? ' is-invalid' : '')]) }}
                                
                                @if ($errors->has('middle_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('middle_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            {{ Form::label('last_name', __('Last Name'), ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            
                            <div class="col-md-6">
                                {{ Form::text('last_name', old('last_name'), ['id' => 'last_name', 'required' => 'required', 'class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : '')]) }}
                                
                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            {{ Form::label('gender', __('Gender'), ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            
                            <div class="col-md-6">
                                {{ Form::select('gender', ['' => 'Select Gender', 'male' => 'Male', 'female' => 'Female', 'other' => 'Other'], '', ['class' => 'form-control']) }}
                                
                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            {{ Form::label('dob', __('Date of Birth'), ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            
                            <div class="col-md-6">
                                {{ Form::date('dob', old('dob'), ['id' => 'dof', 'required' => 'required', 'class' => 'form-control' . ($errors->has('dob') ? ' is-invalid' : '')]) }}
                                
                                @if ($errors->has('dob'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            {{ Form::label('email', __('E-Mail Address'), ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            
                            <div class="col-md-6">
                                {{ Form::email('email', old('email'), ['id' => 'email', 'required' => 'required', 'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '')]) }}
                                
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('password', __('Password'), ['class' => 'col-md-4 col-form-label text-md-right']) }}

                            <div class="col-md-6">
                                {{ Form::password('password', ['id' => 'password', 'required' => 'required', 'class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : '')]) }}
                                
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('password-confirm', __('Confirm Password'), ['class' => 'col-md-4 col-form-label text-md-right']) }}

                            <div class="col-md-6">
                                {{ Form::password('password_confirmation', ['id' => 'password-confirm', 'required' => 'required', 'class' => 'form-control' . ($errors->has('password-confirm') ? ' is-invalid' : '')]) }}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit(__('Register'), ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
