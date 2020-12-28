@extends('layout.master')

@section('content')
    @component('components.card')
        @slot('header', 'Usuários cadastrados')
        <div class="row">
            <div class="col-md-12 mb-3">
                <a href="{{ route('dashboard.users.create') }}" class="btn btn-sm btn-primary" type="button">
                    <i class="fas fa-user"></i> Cadastrar usuário
                </a>
                <div class="btn-group me-2" role="group" aria-label="Second group">
                    <a href="javascript:void(0)" type="button" class="btn btn-sm btn-default">
                        <i class="fas fa-file-pdf"></i> Exportar PDF
                    </a>
                    <a href="javascript:void(0)" type="button" class="btn btn-sm btn-default">
                        <i class="fas  fa-file-excel"></i> Exportar Excel
                    </a>
                </div>
            </div>
            <div class="col-md-12">
                <table id="teste">
                    <thead>
                    <tr>
                        <th>Nome</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endcomponent
@endsection

@push('js')
    <script>
        $('#teste').DataTable();
    </script>
@endpush

