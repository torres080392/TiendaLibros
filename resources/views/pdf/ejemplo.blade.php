<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
    font-family: Arial, sans-serif;
    font-size: 14px;
    margin: 0;
    padding: 0;
}

.container {
    width: 100%;
    max-width: 800px; /* Ancho máximo del contenido */
    margin: 0 auto; /* Centrar el contenido */
    padding: 20px;
}

h1, h2, h3 {
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table th, table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

table th {
    background-color: #f2f2f2;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

p {
    margin-bottom: 15px;
}

a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

    </style>
    <title>PDF ejemplo</title>
</head>
<body>
    <h1>Listado de Libros</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Precio</th>
                <!-- Agrega más columnas según los campos de tu tabla Libro -->
            </tr>
        </thead>
        <tbody>
            @foreach ($libros as $libro)
                <tr>
                    <td>{{ $libro->id }}</td>
                    <td>{{ $libro->titulo }}</td>
                    <td>{{ $libro->descripcion }}</td>
                    <td>{{ $libro->precio }}</td>
                    <!-- Agrega más celdas según los campos de tu tabla Libro -->
                </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>