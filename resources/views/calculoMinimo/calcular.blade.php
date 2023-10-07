@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="card-body p-md-5 mx-md-4">
                                <div class="pb-3"><h4>Valor definido: R${{$valor}}</h3>
                                    <h4>Parcela: R${{$parcela}}</h3>
                                </div>
                                <hr>

                                <div id="charts">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            var tipos_taxa = @json($tipos_taxa);
            var chartsDiv = document.getElementById('charts');
            var valor = {{ $valor }};
            var parcela = {{ $parcela }};

            var bgcolors = ['rgba(255, 99, 132, 0.5)', 'rgba(75, 192, 192, 0.5)', 'rgba(255, 205, 86, 0.5)',
                'rgba(201, 203, 207, 0.5)', 'rgba(54, 162, 235, 0.5)'
            ];
            var colors = ['rgba(255, 99, 132, 1)', 'rgba(75, 192, 192, 1)', 'rgba(255, 205, 86, 1)',
                'rgba(201, 203, 207, 1)', 'rgba(54, 162, 235, 1)']; // Adicione mais cores se necessário

            tipos_taxa.forEach((tipo, index) => {
                var title = document.createElement('h2');
                var dica = document.createElement('span');
                dica.innerText = "Dica: Clique nos índices do gráfico para remover as linhas desejadas."
                title.innerText = "Gráfico refente ao tipo de empréstimo: "+ tipo.nome;
                var taxas = document.createElement('span');
                chartsDiv.appendChild(title);
                chartsDiv.appendChild(dica);
                var br = document.createElement('br');
                var canvas = document.createElement('canvas');
                canvas.id = 'chart' + index;
                canvas.className = 'm-5';
                chartsDiv.appendChild(canvas);
                var hr = document.createElement('hr');
                chartsDiv.appendChild(hr);
                chartsDiv.appendChild(br);
                var ctx = canvas.getContext('2d');

                var datasets = tipo.taxas.map((taxa, index) => {
                    var parcelas = [];
                    var jurosTotais = [];
                    var bgcolor = bgcolors[index % bgcolors.length];
                    var color = colors[index % colors.length];
                    for (var tempo = 6; tempo <= 72; tempo += 6) {
                        var parcela = (valor * taxa.valor / 100) / (1 - Math.pow(1 + taxa.valor /
                            100, (-tempo)));
                        parcelas.push(parcela.toFixed(2));
                        jurosTotais.push((parcela * tempo).toFixed(2));
                    }

                    return [{
                            label: 'Parcela do banco: ' + taxa.nome,
                            data: parcelas,
                            borderColor: bgcolor,
                            backgroundColor: color,
                            fill: false,
                        },
                        {
                            label: 'Juros Totais de: ' + taxa.nome + '( '+taxa.valor+'% a.m)',
                            data: jurosTotais,
                            borderColor: bgcolor,
                            backgroundColor: color,
                            fill: false,
                        }
                    ];
                }).flat();

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: Array.from({
                            length: 12
                        }, (_, i) => (i + 1) * 6 + ' meses'),
                        datasets: datasets
                    },
                    options: {
                        tooltips: {
                            callbacks: {
                                title: function(tooltipItem, data) {
                                    return data.labels[tooltipItem[0].index] + ' meses';
                                }
                            },
                            mode: 'index',
                            intersect: false,
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Meses'
                                }
                            }],
                            yAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Valor'
                                }
                            }]
                        }
                    }
                });
            });
        });
    </script>

@endsection
