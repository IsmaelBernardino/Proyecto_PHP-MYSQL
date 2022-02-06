<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="icon/investigacion.png">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/alert.css">
</head>
<body>
    <div class="logo-name">Proyecto de investigación tesjo</div>
    <div class="container">
        <?php include 'php/loginValidar.php'; ?>
        <form class="form form--login" action="login.php" method="post">
            <img class="img-logo" src="img/tesjo.png" alt="fondo">
            <p class="form__title">Investigador</p>
            <div class="form__input">
                <input type="text" class="input__content" name="claveProyecto">
                <div class="input__txt">Clave Proyecto</div>
            </div>
            <div class="form__input">
                <input type="password" class="input__content pass" name="password">
                <div class="input__txt">Contraseña</div>
                <div class="showpass">
                    <input type="checkbox" id="ver" class="ver" onChange="hideOrShowPassword()"/>
                    <label class="pass--text">Ver contraseña</label>
                </div>
            </div>
            <button type="submit" class="submit form__btn" name="btninvestigador">Ingresar</button>
            <p class="btn" onclick="formRegister()">Administrador</p>
            <a href="index.php" class="btn">Crear proyecto nuevo</a>
        </form>
        <form class="form form--register" action="login.php" method="post">
            <img class="img-logo" src="img/tesjo.png" alt="fondo">
            <p class="form__title">Administrador</p>
            <div class="form__input">
                <input type="text" class="input__content" name="usuario">
                <div class="input__txt">Usuario</div>
            </div>
            <div class="form__input">
                <input type="password" class="input__content pass2" name="usuarioPass">
                <div class="input__txt">Contraseña</div>
                <div class="showpass">
                    <input type="checkbox" id="ver2" class="ver" onChange="hideOrShowPassword2()" />
                    <label class="pass--text">Ver contraseña</label>
                </div>
            </div>
            <button class="form__btn" type="submit" name="btnadmin">Ingresar</button>
            <p class="link btn" onclick="formLogin()">No soy Administrador</p>
        </form>
    </div>
    <script src="js/code.js"></script>
    <script src="js/form.js"></script>
</body>
</html>