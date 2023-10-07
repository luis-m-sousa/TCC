<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simulação de emprésitmo StarVault</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="{{asset('js/simulacaov2.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <h1 class="display-5">StarVault</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Título</th>
                <th scope="col">Tipo</th>
                <th scope="col">Valor</th>
                <th scope="col">Taxa (% a. m.)</th>
                <th scope="col">Tempo</th>
                <th scope="col">Parcela</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{ $data->titulo }}</th>
                <td>{{ $data->tipo }}</td>
                <td>{{ number_format($data->valor, 2,',','.') }}</td>
                <td>{{ number_format($data->taxa, 2, ',', '.') }}</td>
                <td>{{ $data->tempo }}</td>
                <td>{{ number_format($data->parcela, 2, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
