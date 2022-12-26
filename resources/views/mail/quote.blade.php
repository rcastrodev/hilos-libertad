<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table, th, td{
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Solicitud de cotización desde el sitio web Hilos Libertad</h2>
    <div>
        <p><strong>Nombre:</strong> {{ $data['name'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Teléfono:</strong> {{ $data['phone'] }}</p>
        <p><strong>Empresa:</strong> {{ $data['company'] }}</p>
        @isset($data['message'])
            <p><strong>Mensaje:</strong> {{ $data['message'] }}</p>
        @endisset
    </div>
    @isset($data['variableproduct'])
        <table style="width: 100%; boder:none;">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Producto</th>
                    <th>Medida</th>
                    <th>Carretel</th>
                    <th>Color</th>
                    <th>Servicio</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['variableproduct'] as $vp)
                    <tr>
                        <td>{{ $vp['code'] }}</td>
                        <td>{{ $vp['product'] }}</td>
                        <td>{{ $vp['measure'] }}</td>
                        <td>{{ $vp['packaging'] }}</td>
                        <td>{{ $vp['color'] }}</td>
                        <td>{{ $vp['service'] }}</td>
                        <td>{{ $vp['quantity'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>    
    @endisset

</body>
</html>