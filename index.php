<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Separación de Autos</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        /* Header */
        h1 {
            text-align: center;
            font-size: 2.5rem;
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            margin: 0;
        }

        /* Sections */
        #contenidoP > div {
            background-color: #02475e; /* Azul oscuro */
            color: #fff;
            margin: 20px auto;
            padding: 20px;
            max-width: 900px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        h2 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 1.8rem;
            text-align: center;
            text-transform: uppercase;
            border-bottom: 2px solid #fff;
            padding-bottom: 10px;
        }

        /* Forms */
        form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }

        form input, form select, form button {
            padding: 10px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            box-sizing: border-box;
        }

        form input, form select {
            width: calc(50% - 10px);
        }

        form button {
            background-color: #ff5722;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            width: calc(100% - 20px);
        }

        form button:hover {
            background-color: #e64a19;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            color: #333;
            border-radius: 8px;
            overflow: hidden;
        }

        table thead {
            background-color: #333;
            color: #fff;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            text-align: center;
            font-size: 1.2rem;
        }

        table tr:nth-child(even) {
            background-color: #f4f4f4;
        }

        table tr:hover {
            background-color: #ddd;
        }

        table td a {
            color: #ff5722;
            text-decoration: none;
            font-weight: bold;
        }

        table td a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            form input, form select, form button {
                width: 100%;
            }
        }

        /* Imagen */
        #imagen {
            display: block;
            margin: 10px 50px;
            max-width: 100%;
            height: auto;
        }
    </style>
<body>
    <header>
        <div class="container">
            <h1>Gestión de Autos</h1>
        </div>
    </header>

<div id="contenidoP">
    <!-- Formulario para agregar cliente -->
    <div id="marca-cliente-i">
        <h2>Agregar Cliente</h2>
        <form id="form-cliente">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="apellido" placeholder="Apellido" required>
            <input type="text" name="cedula" placeholder="Cédula" required>
            <input type="text" name="direccion" placeholder="Dirección" required>
            <button type="submit">Agregar Cliente</button>
        </form>
    </div>

    <!-- Formulario para agregar auto -->
    <div id="marca-carro-img">
        <div>
            <h2>Agregar Auto</h2>
        <form id="form-auto">
            <input type="text" name="marca" placeholder="Marca" required>
            <input type="text" name="modelo" placeholder="Modelo" required>
            <input type="number" name="precio" placeholder="Precio" step="0.01" required>
            <input type="number" name="anio" placeholder="Año" required>
            <button type="submit">Agregar Auto</button>
        </form>
        </div>
        <div>
        <img src="marcas.png" alt="" id="imagen">  
        </div>
    </div>

    <!-- Formulario para registrar separación -->
    <div id="marca-registro">
        <h2>Registrar Separación</h2>
        <form id="form-separacion">
            <select name="id_cliente" id="id_cliente" required>
                <option value="">Selecciona un cliente</option>
                <!-- Opciones generadas dinámicamente -->
            </select>
            <select name="id_auto" id="id_auto" required>
                <option value="">Selecciona un auto</option>
                <!-- Opciones generadas dinámicamente -->
            </select>
            <input type="date" name="fecha" required>
            <button type="submit">Registrar Separación</button>
        </form>
    </div>

    <!-- Tabla para mostrar separaciones -->
    <div id="marca-registro-separacion">
        <h2>Separaciones Registradas</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Auto</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tabla-separaciones">
                <!-- Filas generadas dinámicamente -->
            </tbody>
        </table>
    </div>
</div>
    <script>
        $(document).ready(function () {
            // Función para cargar datos iniciales
            function cargarDatos() {
                // Cargar clientes
                $.get('cargar_clientes.php', function (data) {
                    $('#id_cliente').html(data);
                });

                // Cargar autos
                $.get('cargar_autos.php', function (data) {
                    $('#id_auto').html(data);
                });

                // Cargar separaciones
                $.get('./separacion/listar_separaciones.php', function (data) {
                    $('#tabla-separaciones').html(data);
                });
            }

            // Llamar a la función al cargar la página
            cargarDatos();

            // Agregar cliente
            $('#form-cliente').submit(function (e) {
                e.preventDefault();
                $.post('cliente.php', $(this).serialize(), function (response) {
                    alert(response);
                    cargarDatos();
                });
            });

            // Agregar auto
            $('#form-auto').submit(function (e) {
                e.preventDefault();
                $.post('auto.php', $(this).serialize(), function (response) {
                    alert(response);
                    cargarDatos();
                });
            });

            // Registrar separación
            $('#form-separacion').submit(function (e) {
                e.preventDefault();
                $.post('./separacion/separacion.php', $(this).serialize(), function (response) {
                    alert(response);
                    cargarDatos();
                });
            });
        });
        $(document).ready(function () {
    // Función para cargar datos iniciales
    function cargarDatos() {
        $.get('./separacion/listar_separaciones.php', function (data) {
            $('#tabla-separaciones').html(data);

            // Agregar eventos a los botones dinámicos
            $('.editar').click(function (e) {
                e.preventDefault();
                let id = $(this).data('id');
                editarSeparacion(id);
            });

            $('.eliminar').click(function (e) {
                e.preventDefault();
                let id = $(this).data('id');
                eliminarSeparacion(id);
            });
        });
    }

    // Función para editar una separación
    function editarSeparacion(id) {
        // Obtener datos de la separación actual
        $.get('./separacion/obtener_separacion.php', { id: id }, function (data) {
            let separacion = JSON.parse(data);
            $('select[name="id_cliente"]').val(separacion.id_cliente);
            $('select[name="id_auto"]').val(separacion.id_auto);
            $('input[name="fecha"]').val(separacion.fecha);

            // Cambiar el formulario para actualizar
            $('#form-separacion button').text('Actualizar').off('click').click(function (e) {
                e.preventDefault();
                let datos = $('#form-separacion').serialize() + `&id_separacion=${id}`;
                $.post('./separacion/editar_separacion.php', datos, function (response) {
                    alert(response);
                    cargarDatos();
                    $('#form-separacion button').text('Registrar Separación');
                });
            });
        });
    }

    // Función para eliminar una separación
    function eliminarSeparacion(id) {
        if (confirm('¿Estás seguro de eliminar esta separación?')) {
            $.post('./separacion/eliminar_separacion.php', { id: id }, function (response) {
                alert(response);
                cargarDatos();
            });
        }
    }

    // Cargar datos al inicio
    cargarDatos();
});

    </script>
</body>
</html>
