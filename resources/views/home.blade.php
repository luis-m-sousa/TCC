@extends('layouts.app')
@section('content')
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black bg-white">
                    <div class="row g-0">
                        <div class="card-body p-md-5 mx-md-4">
                            <div class="text-center">
                                <h3 class="mt-1 mb-3 pb-1">
                                    St<img style="width: 20px" class="loginGoogle"
                                        src="{{ asset('build/assets/estrela.png') }}" alt />rVault
                                </h3>
                            </div>
                            <div class="text-center">
                                <div>
                                    <button type="button" class="btn btn-primary mb-3 ">
                                        <a href="{{route('calculoMinimo.index')}}" style="text-decoration: none" class="text-white">Descobrir
                                            Taxas
                                    </button>
                                    </a>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal"
                                        data-target="#exampleModal">
                                        Realizar Simulação
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Escolha o tipo de
                                                        simulação desejada:</h5>
                                                    <button type="button" class="close btn btn-secondary"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body w-auto">
                                                    <a href="{{ route('pessoalINSS.index') }}"><button type="button"
                                                            class="btn btn-primary m-2">Pessoal Consig. INSS</button></a>
                                                    <a href="{{ route('pessoalPublico.index') }}"><button type="button"
                                                            class="btn btn-primary m-2">Pessoal Consig. Público</button></a>
                                                    <a href="{{ route('pessoalPrivado.index') }}"><button type="button"
                                                            class="btn btn-primary m-2">Pessoal Consig. Privado</button></a>
                                                    <a href="{{ route('pessoalNaoConsignado.store') }}"><button
                                                            type="button" class="btn btn-primary m-2">Pessoal Não
                                                            Consignado</button></a>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Fechar</button>
                                                    <a href="{{route('simulacao.create')}}"><button type="button" class="btn btn-primary">Não
                                                            Definido (Testes)</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-primary mb-3 ">
                                        <a href="{{route('historico.comparar')}}" style="text-decoration: none" class="text-white">Comparar
                                            Simulações</a>
                                    </button>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-primary mb-3">
                                        <a href="{{route('faq')}}" style="text-decoration: none" class="text-white">Perguntas
                                            Frequentes</a>
                                    </button>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-primary ">
                                        <a href="{{route('historico.index')}}" style="text-decoration: none" class="text-white">Ver Histórico
                                        de Simulações</a>
                                    </button>
                                </div>
                            </div>
                        @endsection
