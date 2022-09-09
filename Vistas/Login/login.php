<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
    <link href="../../assets/style/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="session">
      <div class="left">
        <img class="st01" src="https://cursosdeexcel.sirv.com/Images/Excel_Navidad_Logo.png" alt="Logo">
      </div>
      <form action="../../Controladores/Login/Login.controller.php" method="POST" class="login"> 
        <input type="hidden" name="task" value="Ingresar" id="task">
        <h4>Prueba desarrollo Clases <span>EXCEL</span></h4>
        <p>BIENVENIDO! Inicia sesión con tu cuenta para continuar:</p>
        <div class="floating-label">
          <input placeholder="Usuario" type="text" id="usuario" autocomplete="off" name="usuario">
          <label for="usuarui">Usuario:</label>
          <div class="icon">
              <img  class="st0" src="../../assets/imagenes/usuario.png" alt="Usuario">
  
          </div>
        </div>
        <div class="floating-label">
          <input placeholder="Contraseña" type="password"  id="password" autocomplete="off" name="contrasena">
          <label for="password">Contraseña:</label>
          <div class="icon">
            <img  class="st0" src="../../assets/imagenes/password.png" alt="Usuario">          
          </div>
        </div>
        <button type="submit">Log in</button>
        <a href="https://www.linkedin.com/in/cristian-camilo-londo%C3%B1o-meneses-45ba36182" class="discrete" target="_blank">CCLM</a>
      </form>
    </div>
  </body>
</html>

 -->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- CSS only -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="../../assets/css/style_login.css" rel="stylesheet" type="text/css">
</head>

<body>
    <section id="wrapper">
      <div class="login-register">
        <br>
        <div class="login-box card">
          <div class="card-body">
            <form class="form-horizontal form-material" id="loginform" action="../../Controladores/Login/Login.controller.php" method="POST" class="login">
            <input type="hidden" id="task" name="task" value="Ingresar">
              <div class="contenedor">
                <img src="../../assets/images/clasedeexcel2.png" alt="">
              </div>
              <h3 class="contenedor">Ingreso</h3>
              <div class="form-group ">
                <div class="col-xs-12">
                  <input class="form-control" type="text" required="" placeholder="usuario" id="usuario" name="usuario" autocomplete="off">
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-12">
                  <input class="form-control" type="password" required="" placeholder="Password" id="password" autocomplete="off" name="contrasena">
                </div>
              </div>
              <br>
              <div class="form-group text-center">
                <div class="col-xs-12 p-b-20">
                  <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Ingreso</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>