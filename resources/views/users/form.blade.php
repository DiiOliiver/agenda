@extends('layout.master')

@section('content')
    @component('components.card')
        @slot('header', 'Cadastrar Usuário')
        {!! Form::open(['route' => 'dashboard.users.store']) !!}
        {!! Form::token() !!}
        <div class="row col-12">
            <div class="form-group col-md-6">
                {!! Form::label('nome', 'Nome') !!}
                {!! Form::text('nome', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-3">
                {!! Form::label('cpf', 'CPF') !!}
                {!! Form::text('cpf', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-3">
                {!! Form::label('data_nascimento', 'Data de nascimento') !!}
                {!! Form::text('data_nascimento', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('email', 'Email') !!}
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-3">
                {!! Form::label('senha', 'Senha') !!}
                {!! Form::text('senha', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-3">
                {!! Form::label('confirmar_senha', 'Confirmar senha') !!}
                {!! Form::text('confirmar_senha', null, ['class' => 'form-control']) !!}
            </div>
            <div>
                <button class="btn btn-sm btn-primary">
                    <i class="fas fa-check"></i> Cadastrar
                </button>
                <a href="{{ route('dashboard.users.index') }}" class="btn btn-sm btn-default">
                    <i class="fas fa-undo-alt"></i> Voltar página
                </a>
            </div>
        </div>
        {!! Form::close() !!}
    @endcomponent
@endsection

