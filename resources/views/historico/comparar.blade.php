@extends('layouts.app')
@section('content')
<div class="container">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black bg-black text-white">
                    <div class="row g-0">
                        <div class="card-body p-md-5 mx-md-4">

                            <form class="mx-auto" method="GET">
                                @csrf
                                <div class="justify-content-center align-items-center">
                                    <div class="text-center">
                                        <h4>Comparar Simulações</h4>
                                    </div>
                                    <div class="row text-center justify-content-center align-items-center w-auto">
                                        <h5 class="pt-5">Simulação 1</h5>
                                        <select name="simulacao1Id" id="simulacao1Id">
                                            @foreach ($simulacoes as $simulacao)
                                                <option value="{{$simulacao->id}}">{{$simulacao->titulo}}</option>
                                            @endforeach
                                        </select>
                                        <h5 class="pt-5">Simulação 2</h5>
                                        <select name="simulacao2Id" id="simulacao2Id">
                                            @foreach ($simulacoes as $simulacao)
                                                <option value="{{$simulacao->id}}">{{$simulacao->titulo}}</option>
                                            @endforeach
                                        </select>
                                        <input type="submit" class="mt-5 btn btn-group btn-primary" value="Comparar">
                                    </div>
                                </div>
                            </form>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection