@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black bg-black text-white">
                        <div class="row g-0">
                            <div class="card-body p-md-5 mx-md-4">

                                <form class="mx-auto" method="POST">
                                    @csrf
                                    <div class="justify-content-center align-items-center">
                                        <div class="text-center">
                                            <h4>Empréstimo</h4>
                                        </div>
                                        <div class="row text-center justify-content-center align-items-center w-auto">
                                            <input
                                                class="input-group btn-outline-danger rounded  form-control mt-3 text-black"
                                                type="text" id="titulo" name="titulo" placeholder="Dê um nome"
                                                style="width: 40%">
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
                                                    <div class="alert alert-danger alert-dismissible fade show session-alert bg-white text-black sm-2"
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
                                            <ul id="suggestions" class="w-auto mb-3 text-white list-group">
                                                O banco aparecerá aqui
                                            </ul>
                                        </div>
                                        <div class="row text-center justify-content-center align-items-center w-auto">
                                            @error('taxa')
                                                <div class="w-50">
                                                    <div class="alert alert-danger alert-dismissible fade show session-alert bg-white text-black"
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
                                                    <div class="alert alert-danger alert-dismissible fade show session-alert bg-white text-black"
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
                                                    <div class="alert alert-danger alert-dismissible fade show session-alert bg-white text-black"
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
                                            class="row text-center justify-content-center align-items-center w-auto text-black">
                                            <input class="btn btn-primary text-black mb-3 w-auto" type="button"
                                                value="Calcular" onclick="calcular()">
                                        </div>
                                        <div id="resultado"
                                            class="text-center row justify-content-center align-items-center w-auto">
                                        </div>
                                        <canvas id="chartBarra" class="p-5"></canvas>
                                        <canvas id="chartDonut"></canvas>
                                        <div id="salvar"
                                            class="row text-center justify-content-center align-items-center w-auto text-black pt-2">
                                            <input type="submit" value="Salvar"
                                                class="btn btn-primary text-black mb-3 w-auto">
                                        </div>
                                        @if (session('success'))
                                            <div class="alert alert-success alert-dismissible fade show session-alert bg-black text-white"
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

        document.getElementById('banco').addEventListener('input', function() {
            const banco = this.value;
            if (banco === '') {
                document.getElementById('taxa').value = '';
                return;
            }

            fetch('{{ route('obterTaxa') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        banco: banco
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.taxa) {
                        document.getElementById('taxa').value = data.taxa;
                    } else {
                        document.getElementById('taxa').value = 'Taxa não encontrada';
                    }
                })
                .catch(error => {
                    console.error('Erro ao obter a taxa:', error);
                });
        });

        const bancoInput = document.getElementById('banco');
        const suggestionsContainer = document.getElementById('suggestions');

        bancoInput.addEventListener('input', function() {
            const inputText = this.value;

            if (inputText.length === 0) {
                suggestionsContainer.innerHTML = '';
                return;
            }

            fetch('{{ route('obterSugestoesBanco') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        inputText: inputText
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.suggestions.length > 0) {
                        suggestionsContainer.innerHTML = data.suggestions.map(
                            suggestion =>
                            `<a class="list-group-item-action list-group-item text-black">${suggestion}</a>`
                        ).join('');
                    } else {
                        suggestionsContainer.innerHTML = 'Nenhum banco encontrado';
                    }
                })
                .catch(error => {
                    console.error('Erro ao obter sugestões de banco:', error);
                });
        });

        suggestionsContainer.addEventListener('click', function(event) {
            const selectedBanco = event.target.textContent;
            bancoInput.value = selectedBanco;
            suggestionsContainer.innerHTML = ''; // Limpa as sugestões

            // Obtém a taxa correspondente usando uma nova solicitação AJAX
            fetch('{{ route('obterTaxa') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        banco: selectedBanco
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.taxa !== null) {
                        document.getElementById('taxa').value = data.taxa;
                    } else {
                        document.getElementById('taxa').value = ''; // Limpa o valor da taxa
                    }
                })
                .catch(error => {
                    console.error('Erro ao obter a taxa:', error);
                });
        });
    </script>
    
@endsection
