@extends('layout.master')

@section('content')
    @component('components.card')
        @slot('header', 'Cadastrar Usuário')
        {!! Form::open(['url' => 'javascript:void(0)']) !!}
        <div class="row col-12">
            <div class="form-group col-md-6">
                {!! Form::label('name', 'Nome', ['class' => 'valid-name']) !!} <span class="text-red">*</span>
                {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
                <div class="valid-name"></div>
            </div>
            <div class="form-group col-md-3">
                {!! Form::label('cpf', 'CPF', ['class' => 'valid-cpf']) !!} <span class="text-red">*</span>
                {!! Form::text('cpf', null, ['class' => 'form-control mask-cpf', 'required' => true]) !!}
                <div class="valid-cpf"></div>
            </div>
            <div class="form-group col-md-3">
                {!! Form::label('data_nascimento', 'Data de nascimento', ['class' => 'valid-data_nascimento']) !!} <span class="text-red">*</span>
                {!! Form::text('data_nascimento', null, ['class' => 'form-control mask-data_nascimento', 'required' => true]) !!}
                <div class="valid-data_nascimento"></div>
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('email', 'Email', ['class' => 'valid-email']) !!} <span class="text-red">*</span>
                {!! Form::text('email', null, ['class' => 'form-control', 'required' => true]) !!}
                <div class="valid-email"></div>
            </div>
            <div class="form-group col-md-3">
                {!! Form::label('senha', 'Senha', ['class' => 'valid-senha']) !!} <span class="text-red">*</span>
                <div>
                    <input type="password" name="senha" id="senha" class="form-control senha" required>
                    <span class="fa fa-eye toggle-password"></span>
                </div>
                <div class="valid-senha"></div>
            </div>
            <div class="form-group col-md-3">
                {!! Form::label('confirmar_senha', 'Confirmar senha', ['class' => 'valid-confirmar_senha']) !!} <span class="text-red">*</span>
                <input type="password" name="confirmar_senha" id="confirmar_senha" class="form-control" required>
                <div class="valid-confirmar_senha"></div>
            </div>
            <div class="col-12">
                <button type="button" class="btn btn-sm btn-primary btn-submit">
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

@push('js')
    <script>
        function formSubmit() {
            cleanErrors();
            axios({
                method: 'POST',
                url: '{{ route('dashboard.users.store') }}',
                responseType: 'JSON',
                data: new FormData(document.querySelector('form'))
            })
            .then(({data}) => {
                if (data.status == true) {
                    iziToast.success({
                        title: 'Sucesso',
                        position: 'topRight',
                        message: data.mensagem,
                    });
                }

                if (data.status == false) {
                    iziToast.error({
                        title: 'Erro',
                        position: 'topRight',
                        message: data.mensagem,
                    });
                }
            })
            .catch(({response}) => {
                if (response.status == 422) {
                    let errors = response.data.errors;
                    for (let index in errors) {
                        invalid(errors[index], index);
                    }
                }
            });
        }
        document.querySelector('.btn-submit').addEventListener('click', formSubmit)
    </script>
@endpush

