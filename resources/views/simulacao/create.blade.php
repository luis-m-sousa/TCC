@extends('layouts.app')
@section('content')
@section('scripts')
    <script src="{{ asset('js/simulacao.js') }}" defer></script>
@endsection
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
                                    <div class="row text-center justify-content-center align-items-center">
                                        <div class="btn-group dropup w-auto">
                                            <button type="button" name="tipo"
                                                class="btn btn-primary rounded mt-3 text-black dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Tipo Empréstimo
                                            </button>
                                            <div class="dropdown-menu">
                                                <div class="dropdown-item"
                                                    onclick="changeDropdownText('Consignado INSS')">
                                                    Consignado INSS</div>
                                                <div class="dropdown-item" onclick="changeDropdownText('Pessoal')">
                                                    Pessoal
                                                </div>
                                            </div>
                                        </div>
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
                                        class="text-center row justify-content-center align-items-center w-auto">O
                                        Resultado aparecerá aqui</div>
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
</div>
</div>
<script>
    function calcular() {
        var valor = document.getElementById("valor").value;
        var taxa = document.getElementById("taxa").value;
        var tempo = document.getElementById("tempo").value;
        var parcela = document.getElementById("parcela").value;

        //Validações lado front-end

        if(valor < parcela){
            alert('O valor inicial deve ser maior que o da parcela!')
            return;
        }

        if(valor < 0 || taxa < 0 || tempo < 0 || parcela < 0){
            alert('O valor dos campos deve ser maior que zero!')
            return;
        }
        
        const camposPreenchidos = [valor, taxa, tempo, parcela].filter(campo => campo !== '').length;
        
        if (camposPreenchidos < 3) {
            alert('Preencha pelo menos 3 dos 4 campos: valor, taxa, tempo e parcela.');
        return;
  }

        if (valor && taxa && tempo && !parcela) {
            // Se valor, taxa e tempo forem preenchidos e parcela estiver vazio, Calcula o valor da parcela
            parcela = (valor * taxa / 100) / (1 - Math.pow(1 + taxa / 100, (-tempo)));
            document.getElementById("parcela").value = parcela.toFixed(2);
            document.getElementById("resultado").innerHTML = "Para um empréstimo de: " + valor +
                " reais, a parcela será de: " + parcela.toFixed(2);

        } else if (taxa && tempo && parcela && !valor) {

            // Se taxa, tempo e parcela forem preenchidos e valor estiver vazio, Calcula o valor máximo possível para o empréstimo

            var valor_total = parcela * ((1 - Math.pow(1 + taxa / 100, -tempo)) / (taxa / 100));
            valor = valor_total.toFixed(2);
            document.getElementById("valor").value = valor;
            document.getElementById("resultado").innerHTML = "Para uma parcelas de: " + parcela +
                " reais, o valor máximo possível do empréstimo será de: " + valor + " reais";

        } else if (tempo && parcela && valor && !taxa) {

            // Se tempo, parcela e valor forem preenchidos e taxa estiver vazia, Calcula a taxa de juros necessária

            var taxa = encontrarTaxaJuros(parseFloat(valor), parseFloat(tempo), parseFloat(parcela));
            taxa = parseFloat(taxa); // Converter para número
            document.getElementById("taxa").value = taxa.toFixed(2);
            document.getElementById("resultado").innerHTML = "Para um empréstimo de: " + valor +
                " reais, com parcelas de: " + parcela + " reais, a taxa de juros necessária será de: " + taxa.toFixed(
                    2) + "%";

        } else if (parcela && valor && taxa && !tempo) {
            function encontrarTempo(valor, parcela, taxa) {
                
                const tolerancia = 0.00001; // Tolerância para determinar a precisão da solução
                let tempo = 12; // Valor inicial para o tempo em meses
                let iteracoes = 0; // Valor inicial de iterações
                taxa = taxa / 100;

                //loop while usado para iterar e refinar a aproximação do tempo.
                //O loop continua enquanto o valor absoluto da função f for maior que a tolerância e o número de iterações for menor que 500.

                while (Math.abs(fTempo(tempo, valor, parcela, taxa)) > tolerancia && iteracoes < 500) {
                    tempo = tempo - fTempo(tempo, valor, parcela, taxa) / fTempoDerivative(tempo, valor, parcela, taxa);
                    iteracoes++;
                }

                return tempo;
            }

            // Função para calcular o valor da função f(tempo)
            function fTempo(tempo, valor, parcela, taxa) {
                return valor * Math.pow(1 + taxa, tempo) - parcela * (Math.pow(1 + taxa, tempo) - 1) / taxa;
            }
            // Função para calcular o valor da derivada de f(tempo)
            function fTempoDerivative(tempo, valor, parcela, taxa) {
                return valor * taxa * Math.pow(1 + taxa, tempo - 1) - parcela * (Math.pow(1 + taxa, tempo) * (taxa *
                    tempo - 1) + 1) / Math.pow(taxa, 2);
            }


            const tempoCalculado = encontrarTempo(valor, parcela, taxa);
            document.getElementById("tempo").value = tempoCalculado.toFixed(2);
            document.getElementById("resultado").innerHTML = 'O tempo necessário é de aproximadamente '+ tempoCalculado.toFixed(2) +' meses.';
        }


        function encontrarTaxaJuros(capital, tempo, parcela) {
    // Função para calcular o valor da função f(x)
    function f(x, capital, tempo, parcela) {
        return capital * Math.pow(1 + x, tempo) - parcela * (Math.pow(1 + x, tempo) - 1) / x;
    }
    // Função para calcular o valor da derivada de f(x)
    function fderivada(x, capital, tempo, parcela) {
        return capital * tempo * Math.pow(1 + x, tempo - 1) - parcela * (Math.pow(1 + x, tempo) * (x * tempo -
            1) + 1) / Math.pow(x, 2);
    }

    const tolerancia = 0.00001; // Tolerância para determinar a precisão da solução
    let taxa = 0.1; // Valor inicial para a taxa de juros
    let iteracoes = 0; // Valor inicial para a quantidade de iterações 

    //loop while usado para iterar e refinar a aproximação da taxa de juros.
    //O loop continua enquanto o valor absoluto da função f for maior que a tolerância e o número de iterações for menor que 500.

    while (Math.abs(f(taxa, capital, tempo, parcela)) > tolerancia && iteracoes < 500) {
        taxa = taxa - f(taxa, capital, tempo, parcela) / fderivada(taxa, capital, tempo, parcela);
        iteracoes++;
    }
    return taxa * 100; // Retorna a taxa de juros em porcentagem
}


        // Apaga e mostra placeholders:

        valor.addEventListener("focus", function() {
            this.placeholder = '';
        });
        valor.addEventListener("blur", function() {
            this.placeholder = 'Valor';
        });

        taxa.addEventListener("focus", function() {
            this.placeholder = '';
        });
        taxa.addEventListener("blur", function() {
            this.placeholder = 'taxa (% a.m)';
        });
        tempo.addEventListener("focus", function() {
            this.placeholder = '';
        });
        tempo.addEventListener("blur", function() {
            this.placeholder = 'Tempo (em meses)';
        });
        parcela.addEventListener("focus", function() {
            this.placeholder = '';
        });
        parcela.addEventListener("blur", function() {
            this.placeholder = 'Parcela';
        });

    }

    function changeDropdownText(itemName) {
        const dropdownButton = document.querySelector('.btn.dropdown-toggle');
        dropdownButton.textContent = itemName;
    }

    $(document).ready(function() {

        setTimeout(function() {
            $(".session-alert").alert('close');
        }, 5000);
    });
</script>
@endsection
