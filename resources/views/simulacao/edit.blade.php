@extends('layouts.app')
@section('content')
<div class="container">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black bg-black text-white">
                    <div class="row g-0">
                        <div class="card-body p-md-5 mx-md-4">

                            <form class="mx-auto" method="POST" action="{{ route('simulacao.update', [$simulacao->id]) }}">
                                @csrf
                                <div class="justify-content-center align-items-center">
                                <div class="text-center">
                                    <h4>Editando Empréstimo de ID {{$simulacao->id}}</h4>
                                </div>
                                <div class="row text-center justify-content-center align-items-center">
                                    <div class="btn-group dropup w-auto">
                                        <button type="button" name="tipo"
                                            class="btn btn-primary rounded mt-3 text-black dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Tipo Empréstimo
                                        </button>
                                        <div class="dropdown-menu">
                                            <div class="dropdown-item" onclick="changeDropdownText('Consignado INSS')">
                                                Consignado INSS</div>
                                            <div class="dropdown-item" onclick="changeDropdownText('Pessoal')">Pessoal
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row text-center justify-content-center align-items-center w-auto">
                                    <input
                                        class="input-group btn-outline-danger rounded mb-3 form-control mt-3 text-black"
                                        type="number" id="valor" name="valor" placeholder="Valor" style="width: 40%" value="{{ $simulacao->valor }}">
                                </div>
                                <div class="row text-center justify-content-center align-items-center w-auto">
                                    <input
                                        class="input-group btn-outline-danger rounded mb-3 form-control text-black"
                                        type="number" step="0.01" id="taxa" name="taxa"
                                        placeholder="taxa (% a.m)" style="width: 20%" value="{{ $simulacao->taxa }}">
                                        <input
                                        class="input-group btn-outline-danger rounded mb-3 form-control text-black"
                                        type="text" id="banco" name="banco"
                                        placeholder="Banco" style="width: 20%">
                                </div>
                                <div class="row text-center justify-content-center align-items-center w-auto">
                                    <input
                                        class="input-group btn-outline-danger rounded mb-3 form-control  text-black"
                                        type="number" id="tempo" name="tempo" placeholder="Tempo (em meses)" style="width: 40%" value="{{ $simulacao->tempo }}">
                                </div>
                                <div class="row text-center justify-content-center align-items-center w-auto">
                                    <input
                                        class="input-group btn-outline-danger rounded mb-3 form-control text-black"
                                        type="number" step="0.01" id="parcela" name="parcela"
                                        placeholder="Parcela" style="width: 40%" value="{{ $simulacao->parcela }}">
                                </div>
                                <div
                                    class="row text-center justify-content-center align-items-center w-auto text-black">
                                    <input class="btn btn-primary text-black mb-3 w-auto" type="button"
                                        value="Calcular" onclick="calcular()" >
                                </div>
                                <div id="resultado"
                                    class="text-center row justify-content-center align-items-center w-auto">O Resultado aparecerá aqui</div>
                                <div id="salvar"
                                    class="row text-center justify-content-center align-items-center w-auto text-black pt-2">
                                    <input type="submit" value="Salvar" class="btn btn-primary text-black mb-3 w-auto">
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show session-alert bg-black text-white"
                                        role="alert" style="border: none">
                                        <div class="alert-heading d-flex justify-content-between align-items-center">
                                            <h4 class="alert-heading-text">Sucesso!</h4>
                                            <button type="button" class="close btn btn-primary" data-dismiss="alert"
                                                aria-label="Close">
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
    </div>
</div>
@endsection

