@extends('layouts.app')
@section('content')
    <section class="h-100 gradient-form" style="background-color: #1e1e1e">
        <div class="container py-5 h-100">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-10">
                        <div class="card rounded-3 text-black bg-black text-white">
                            <div class="row g-0">
                                    <div class="card-body p-md-5 mx-md-4 text-center">
                                            <h4>Histórico de simulações</h4>
                                        </div>
                                        <div class="row text-center justify-content-center align-items-center">
                                            <div class="table-responsive">
                                                <table class="table text-white">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Tipo</th>
                                                        <th scope="col">Valor</th>
                                                        <th scope="col">Taxa</th>
                                                        <th scope="col">Tempo</th>
                                                        <th scope="col">Parecela</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($historico as $simulacao)
                                                        <tr>
                                                            <td>{{ $simulacao->tipo }}</td>
                                                            <td>{{ $simulacao->valor }}</td>
                                                            <td>{{ $simulacao->taxa }}</td>
                                                            <td>{{ $simulacao->tempo }}</td>
                                                            <td>{{ $simulacao->parcela}}</td>
                                                            <td>
                                                                <a href="{{ route('historico.delete', [$simulacao->id]) }}"><button class="btn btn-danger btn-sm">Excluir</button></a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="d-flex">
                                                {!! $historico->links() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
