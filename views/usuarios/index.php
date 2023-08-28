<!DOCTYPE html>
<html>

<head>
    <title>REGISTRO DE USUARIOS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h2 class="text-primary">Registro de Usuario</h2>
        </div>
        <div class="row justify-content-center">
            <form class="col-lg-4 border rounded p-3" id="formularioUsuarios">
                <div class="mb-3">
                    <label for="usuario_nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="usuario_nombre" name="usuario_nombre" autocomplete="username">
                </div>
                <div class="mb-3">
                    <label for="usuario_catalogo" class="form-label">Catálogo</label>
                    <input type="number" class="form-control" id="usuario_catalogo" name="usuario_catalogo">
                </div>
                <div class="mb-3">
                    <label for="usuario_password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="usuario_password" name="usuario_password" autocomplete="new-password">
                </div>
                <div class="col">
                    <button type="submit" form="formularioUsuarios" id="btnGuardar" class="btn btn-primary w-100">Guardar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="<?= asset('./build/js/usuario/index.js') ?>"></script>
</body>
</html>