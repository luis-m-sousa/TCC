@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 bg-white">
                        <div class="row g-0">
                            <div class="card-body p-md-5 mx-md-4">

                                <form class="mx-auto" method="POST">
                                    @csrf
                                    <div class="justify-content-center align-items-center">
                                        <div class="text-center">
                                            <h4>Empréstimo Consignado Pessoal Público</h4>
                                        </div>
                                        <div class="row text-center justify-content-center align-items-center w-auto">
                                            <input
                                                class="input-group btn-outline-danger rounded  form-control mt-3 text-black"
                                                type="text" id="titulo" name="titulo" placeholder="Dê um nome"
                                                style="width: 40%">
                                        </div>
                                        <div class="row text-center justify-content-center align-items-center w-auto">
                                            @error('titulo')
                                                <div class="w-50">
                                                    <div class="alert alert-danger alert-dismissible fade show session-alert text-black sm-2 mt-4"
                                                        role="alert" style="border: none">
                                                        <div
                                                            class="alert-heading d-flex justify-content-between align-items-center">
                                                            <h4 class="alert-heading-text">Erro!</h4>
                                                            <button type="button" class="close btn btn-danger"
                                                                data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true"><b>&times;</b></span>
                                                            </button>
                                                        </div>
                                                        <hr>
                                                        <p class="mb-0">{{ $message }}</p>
                                                    </div>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="row text-center justify-content-center align-items-center w-auto">
                                            <input
                                                class="input-group btn-outline-danger rounded mb-3 form-control mt-3 text-black"
                                                type="number" id="valor" name="valor" placeholder="Valor"
                                                style="width: 40%">
                                        </div>
                                        <div class="row text-center justify-content-center align-items-center w-auto">
                                            @error('valor')
                                                <div class="w-50">
                                                    <div class="alert alert-danger alert-dismissible fade show session-alert text-black sm-2"
                                                        role="alert" style="border: none">
                                                        <div
                                                            class="alert-heading d-flex justify-content-between align-items-center">
                                                            <h4 class="alert-heading-text">Erro!</h4>
                                                            <button type="button" class="close btn btn-danger"
                                                                data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true"><b>&times;</b></span>
                                                            </button>
                                                        </div>
                                                        <hr>
                                                        <p class="mb-0">{{ $message }}</p>
                                                    </div>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="row text-center justify-content-center align-items-center w-auto">
                                            <input
                                                class="input-group btn-outline-danger rounded mb-3 form-control text-black"
                                                type="number" step="0.01" id="taxa" name="taxa"
                                                placeholder="taxa (% a.m)" style="width: 20%">
                                            <input
                                                class="input-group btn-outline-danger rounded mb-3 form-control text-black"
                                                type="text" id="banco" name="banco" placeholder="Banco"
                                                style="width: 20%">
                                        </div>
                                        <div class="row text-center justify-content-center align-items-center w-auto">
                                            <ul id="suggestions" class="w-auto mb-3 text-black list-group">
                                                O banco aparecerá aqui
                                            </ul>
                                        </div>
                                        <div class="row text-center justify-content-center align-items-center w-auto">
                                            @error('taxa')
                                                <div class="w-50">
                                                    <div class="alert alert-danger alert-dismissible fade show session-alert text-black"
                                                        role="alert" style="border: none">
                                                        <div
                                                            class="alert-heading d-flex justify-content-between align-items-center">
                                                            <h4 class="alert-heading-text">Erro!</h4>
                                                            <button type="button" class="close btn btn-danger"
                                                                data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true"><b>&times;</b></span>
                                                            </button>
                                                        </div>
                                                        <hr>
                                                        <p class="mb-0">{{ $message }}</p>
                                                    </div>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="row text-center justify-content-center align-items-center w-auto">
                                            <input
                                                class="input-group btn-outline-danger rounded mb-3 form-control  text-black"
                                                type="number" id="tempo" name="tempo" placeholder="Tempo (em meses)"
                                                style="width: 40%">
                                        </div>
                                        <div class="row text-center justify-content-center align-items-center w-auto">
                                            @error('tempo')
                                                <div class="w-50">
                                                    <div class="alert alert-danger alert-dismissible fade show session-alert text-black"
                                                        role="alert" style="border: none">
                                                        <div
                                                            class="alert-heading d-flex justify-content-between align-items-center">
                                                            <h4 class="alert-heading-text">Erro!</h4>
                                                            <button type="button" class="close btn btn-danger"
                                                                data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true"><b>&times;</b></span>
                                                            </button>
                                                        </div>
                                                        <hr>
                                                        <p class="mb-0">{{ $message }}</p>
                                                    </div>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="row text-center justify-content-center align-items-center w-auto">
                                            <input
                                                class="input-group btn-outline-danger rounded mb-3 form-control text-black"
                                                type="number" step="0.01" id="parcela" name="parcela"
                                                placeholder="Parcela" style="width: 40%">
                                        </div>
                                        <div class="row text-center justify-content-center align-items-center w-auto">
                                            @error('parcela')
                                                <div class="w-50">
                                                    <div class="alert alert-danger alert-dismissible fade show session-alert text-black"
                                                        role="alert" style="border: none">
                                                        <div
                                                            class="alert-heading d-flex justify-content-between align-items-center">
                                                            <h4 class="alert-heading-text">Erro!</h4>
                                                            <button type="button" class="close btn btn-danger"
                                                                data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true"><b>&times;</b></span>
                                                            </button>
                                                        </div>
                                                        <hr>
                                                        <p class="mb-0">{{ $message }}</p>
                                                    </div>
                                                </div>
                                            @enderror
                                        </div>
                                        <div
                                            class="row text-center justify-content-center align-items-center w-auto text-white">
                                            <input class="btn btn-primary text-white mb-3 w-auto" type="button"
                                                value="Calcular" onclick="calcular()">
                                        </div>
                                        <canvas id="chartDonut" class="p-5"></canvas>
                                        <canvas id="chartBarra"></canvas>
                                        <div id="salvar"
                                            class="row text-center justify-content-center align-items-center w-auto text-white pt-2">
                                            <input type="submit" value="Salvar"
                                                class="btn btn-primary text-white mb-3 w-auto">
                                        </div>
                                        @if (session('success'))
                                            <div class="alert alert-success alert-dismissible fade show session-alert text-white"
                                                role="alert" style="border: none">
                                                <div
                                                    class="alert-heading d-flex justify-content-between align-items-center">
                                                    <h4 class="alert-heading-text">Sucesso!</h4>
                                                    <button type="button" class="close btn btn-primary"
                                                        data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true"><b>&times;</b></span>
                                                    </button>
                                                </div>
                                                <hr>
                                                <p class="mb-0">{{ session('success') }}</p>
                                            </div>
                                        @endif
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('#banco').on('input', function() {
                    var nome = $(this).val();
                    if (nome.length > 1) {
                        // Buscar sugestões de bancos
                        $.get('/pessoal-publico/bancos?q=' + nome, function(data) {
                            $('#suggestions').empty();
                            data.forEach(function(item) {
                                $('#suggestions').append('<li class="list-group-item">' + item
                                    .nome + '</li>');
                            });
                        });
                    }
                });

                $('#suggestions').on('click', 'li', function() {
                    var nome = $(this).text();
                    $('#banco').val(nome);
                    $('#suggestions').empty();

                    // Buscar taxa
                    $.get('/pessoal-publico/banco/' + nome, function(data) {
                        if (data) {
                            $('#taxa').val(data);
                        }
                    });
                });
            });
        </script>
    
@endsection
