<?php 
     session_start();
     if ($_SESSION['rol']!=1){
       header('Location:../login.php');
     }
     include ("../inc/menu_administrador.php");
     require_once ("../inc/session.php");
     require_once ('../bd/conexion.php');
     
    $sql="SELECT * FROM usuario AS u INNER JOIN roles AS r ON u.id_Rol=r.idRol";
    $query=mysqli_query($conexion,$sql);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Usuario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../styles.css">
        <script src="../js/jquery-3.4.1.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css"/>
        

    </head>
    <body>
        

            <div class="container mt-5">
                
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1>Usuarios</h1>
                                <!-- <form action="anadir_usuario.php" method="POST">

                                    <input type="text" class="form-control mb-3" name="Usuario" placeholder="Usuario">
                                    <input type="text" class="form-control mb-3" name="clave" placeholder="clave">
                                  
                                       <div>
                                      
                                       <select class="form-control mb-3" name='Rol'>
                                       <option value="0" class="input_form">Seleccione:</option>
                                       <?php
                                       $ROL = $_SESSION['id_Rol'];
                                       $sql = "SELECT * FROM roles";
                                       $resultado = mysqli_query($conexion, $sql);
                                       While($valores = mysqli_fetch_array($resultado)) {
                                       $idRol=$valores['idRol'];
                                       $nombreRol=$valores['nomRol'];
                                       ?>
                                       <option value="<?php echo $idRol ?>"><?php echo $nombreRol ?></option>
                                       <?php
                                       }
                                       ?>
                                       
                                       </div>
                                    
                                    <input type="submit" class="btn btn-primary">
                                </form> -->
                        </div>

                        <div class="col-md-8">
                            <table class="table table-striped mt-3" id="mitabla">
                                <thead class="table-success table-striped" >
                                    <tr>
                                    <th>Usuario</th>
                                    <th>clave</th>
                                    <th>rol</th>
                                        <th></th>
                                        <!-- <th></th> -->
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?> 
                                            <tr>
                                                <th ><?php echo $row['usuario'] ?></th> 
<th>
                <input type="password" id="password" value="<?php echo $row['clave'] ?>">
                <button id="show-hide-btn" class="btn btn-outline-primary"><svg width=28 height=25 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M569.354 231.631C512.97 135.949 407.81 72 288 72 168.14 72 63.004 135.994 6.646 231.631a47.999 47.999 0 0 0 0 48.739C63.031 376.051 168.19 440 288 440c119.86 0 224.996-63.994 281.354-159.631a47.997 47.997 0 0 0 0-48.738zM288 392c-102.556 0-192.091-54.701-240-136 44.157-74.933 123.677-127.27 216.162-135.007C273.958 131.078 280 144.83 280 160c0 30.928-25.072 56-56 56s-56-25.072-56-56l.001-.042C157.794 179.043 152 200.844 152 224c0 75.111 60.889 136 136 136s136-60.889 136-136c0-31.031-10.4-59.629-27.895-82.515C451.704 164.638 498.009 205.106 528 256c-47.908 81.299-137.444 136-240 136z"/></svg></button>
            </th>
                                                <th><?php echo $row['nomRol'] ?></th>
                                                <th><a href="modificar_usuario.php?id=<?php echo $row['idUser'] ?>" class="btn btn-info">Editar</a></th>
                                                <!-- <th><a href="Eliminar_datos_usuario.php.php?id=<?php echo $row['idUser'] ?>" class="btn btn-danger" >Eliminar</a></th> -->
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
            <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script> 
            <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#mitabla').DataTable( {
                        language: {
                            url: 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json'
                        }
                    } );
                } );
            </script>
                   <script>
  // Obtiene el botón y el campo de contraseña
  const btn = document.getElementById('show-hide-btn');
  const password = document.getElementById('password');

  // Establece un manejador de eventos para el botón
  btn.addEventListener('click', function() {
    // Si el tipo del campo es "password", cámbialo a "text"
    if (password.type === 'password') {
      password.type = 'text';
        // btn.textContent = 'Ocultar';
    } else {
      // Si el tipo del campo es "text", cámbialo a "password"
      password.type = 'password';
    //   btn.textContent = 'Mostrar';
    }
  });
</script>

    </body>
</html>

