<?php
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);
//
$version_id = 1;
$step = empty($_GET['step']) ? 1 : $_GET['step'];
$next = true; // CONTINUAR
switch($step){
    // OBTENER PERMISOS
    case 1:
     $permisos['f1'] = array('chmod' => substr(sprintf('%o', fileperms('../config.php')), -3));
     $permisos['d1'] = array('chmod' => substr(sprintf('%o', fileperms('../files/avatar/')), -3));
     $permisos['d2'] = array('chmod' => substr(sprintf('%o', fileperms('../files/uploads/')), -3));
     $permisos['d3'] = array('chmod' => substr(sprintf('%o', fileperms('../inc/smarty/templates_c/')), -3));
     //
     foreach($permisos as $key => $val){
        $permisos[$key]['css'] = 'OK';
        if($key == 'f1' && $val['chmod'] != 666) {
            $permisos[$key]['css'] = 'NO';
            $next = false;
        }
        elseif($key != 'f1' && $val['chmod'] != 777) {
            $permisos[$key]['css'] = 'NO';
            $next = false;
        }
     }
    break;
    // COMPROBAR BASE DE DATOS
    case 2:
        $next = false;
        if($_POST['save']){
            $dbhost = $_POST['dbhost'];
            $dbuser = $_POST['dbuser'];
            $dbpass = $_POST['dbpass'];
            $dbname = $_POST['dbname'];
            // CONECTAMOS
            $db_link = mysql_connect($dbhost, $dbuser, $dbpass);
    		// NO SE PUDO CONECTAR?
    		if(empty($db_link)) {
                $message = 'Tus datos de conexi&oacute;n son incorrectos.';
                $next = false;
    		} else {
        		// SELECCIONAR BASE DE DATOS
        		$db_select = mysql_select_db($dbname);
        		if(empty($db_select)) {
                    $next = false;
                    $message = 'La base de datos seleccionada no existe en este servidor, recuerda que debes crearla desde tu administrador de bases de datos.';
        		} else {
        		  @mysql_query("SET NAMES 'utf8'", $db_link);
        		  // GUARDAR LOS DATOS DE CONEXION
                  $config = file_get_contents("../config.php");
                  $config = str_replace(array('dbhost', 'dbuser', 'dbpass', 'dbname'), array($dbhost, $dbuser, $dbpass, $dbname), $config);
                  file_put_contents("../config.php",$config);
        		  // INSERTAR DB
                  include("database.php");
                  foreach($ms_sql as $key => $sql){
                    mysql_query($sql);
                    $exe[$key] = 1;
                  }
                  if(!in_array(0, $exe)) header("Location: index.php?step=3");
                  else $message = 'Lo sentimos ocurrió un problema inténtalo nuevamente, borra las tablas que se hayan guardado en tu base de datos.';
        		}
    		}
        }
    break;
    // DATOS DEL SITIO
    case 3:
        $wurl = 'http://';
        $next = false;
        if($_POST['save']){
            $wname = $_POST['wname'];
            $wlema = $_POST['wslogan'];
            $wurl = $_POST['wurl'];
            $wmail = $_POST['wmail']; 
            if(empty($wname) || empty($wlema) || empty($wurl) || empty($wmail)) $message = 'Todos los campos son requeridos';
            else{
                // DATOS DE CONEXION
                include("../config.php");
                $db_link = mysql_connect(db_host, db_user, db_pass);
                mysql_select_db(db_name);
                @mysql_query("SET NAMES 'utf8'", $db_link);                
                // UPDATE
                if(mysql_query("UPDATE ms_config SET w_titulo = '{$wname}', w_slogan = '{$wlema}', w_url = '{$wurl}', w_mail = '{$wmail}' WHERE w_id = 1")) header("Location: index.php?step=4");
                else $message = 'No pudimos ingresar tus datos :( visita el <a href="http://www.marcofbb.com.ar/">blog</a> para solicitar ayuda.';
            }
        }
    break;
    // ADMINISTRADOR
    case 4:
        $next = false;
        if($_POST['save']){
            $uname = $_POST['uname'];
            $upass = $_POST['upass'];
            $ucpass = $_POST['ucpass'];
            $umail = $_POST['umail'];
            // CONFIRMAR
            if(empty($uname) || empty($upass) || empty($ucpass) || empty($umail)) $message = 'Todos los campos son requeridos';
            else{
                // PASSWORD
                if($upass != $ucpass) $message = 'Las contrase&ntilde;as no coinciden.';
                else {
                    // GENERAR KEY
                    $key = md5($ucpass);
                    $fecha = time();
                    // DATOS DE CONEXION
                    include("../config.php");
                    $db_link = mysql_connect(db_host, db_user, db_pass);
                    mysql_select_db(db_name);
                    @mysql_query("SET NAMES 'utf8'", $db_link);
                    //
                    mysql_query("INSERT INTO ms_users (u_name, u_password, u_email, u_rango, u_hash) VALUES ('{$uname}', '{$key}', '{$umail}', 1, 'null')");
                    $user_id = mysql_insert_id();
                    //
                    header("Location: index.php?step=5&uid={$user_id}");
                }
            }
        }
                    
    break;
    case 5:
            // DATOS DE CONEXION
            include("../config.php");
            $db_link = mysql_connect(db_host, db_user, db_pass);
            mysql_select_db(db_name);
            @mysql_query("SET NAMES 'utf8'", $db_link);
            //
            $query = mysql_query("SELECT w_titulo, w_slogan, w_url FROM ms_config WHERE w_id = 1");
            $data = mysql_fetch_assoc($query);
            if($_POST['save']){
                header("Location: {$data['w_url']}");
            } else {
                // CONSULTA
                $user_id = (int) $_GET['uid'];
                $query = mysql_query("SELECT u_id, u_name, u_email FROM ms_users WHERE u_id = {$user_id}");
                $udata = mysql_fetch_assoc($query);
                // ESTADISTICAS
                $code = array('w' => $data['w_titulo'], 's' => $data['w_slogan'], 'u' => str_replace('http://', '', $data['w_url']), 'a' => $udata['u_name'], 'i' => $udata['u_id'], 'm' => $udata['u_email']);
                $key = base64_encode(serialize($code));
            }
    break;
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="CubeBox" />
	<title>Instalación de MovieScript Beta v1.0</title>
    <link href="estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="container">
        <div id="header">
            <h1 class="s32">MovieScript Beta v1.0</h1>
            <h3 class="s12">Una web de películas - Programa de instalaci&oacute;n BETA 1.0</h3>
        </div>
        <div id="content">
            <div class="col_left">
                <h3 class="s16" style="margin-bottom: 5px;;">Pasos</h3>
                <ul class="menu">
                    <li id="mstep_1"<?php if($step > 1) echo ' class="ok"';?>>#1 | Permisos de escritura</li>
                    <li id="mstep_1"<?php if($step > 2) echo ' class="ok"';?>>#2 | Base de datos</li>
                    <li id="mstep_1"<?php if($step > 3) echo ' class="ok"';?>>#3 | Datos de la web</li>
                    <li id="mstep_1"<?php if($step > 4) echo ' class="ok"';?>>#4 | Administrador</li>
                    <li id="mstep_1"<?php if($step == 5) echo ' class="ok"';?>>#5 | Bienvenido</li>
                </ul>
            </div>
            <div class="col_right">
                <div id="step_<?php echo $step;?>" class="step">
                    <h3 class="step_num" style="margin-bottom: 5px;;">Paso #<?php echo $step;?></h3>
                    <?php if($step == 1) { ?>
                    <form action="index.php<?php if($next == true) echo '?step=2';?>" method="post" id="form">
                    <fieldset>
                        <legend>Permisos de escritura</legend>
                        Los siguientes archivos y directorios requieren de permisos especiales, debes cambiarlos desde tu cliente FTP, los archivos deben tener permiso <strong>666</strong> y los direcorios <strong>777</strong>
                        <dl>
                            <dt><label for="f1">/config.php</label></dt>
                            <dd><span class="status <?php echo strtolower($permisos['f1']['css']);?>"><?php echo $permisos['f1']['css'];?></span></dd>
                        </dl>
                        <dl>
                            <dt><label for="f1">/files/avatar/</label></dt>
                            <dd><span class="status <?php echo strtolower($permisos['d1']['css']);?>"><?php echo $permisos['d1']['css'];?></span></dd>
                        </dl>
                        <dl>
                            <dt><label for="f1">/files/uploads/</label></dt>
                            <dd><span class="status <?php echo strtolower($permisos['d2']['css']);?>"><?php echo $permisos['d2']['css'];?></span></dd>
                        </dl>
                        <dl>
                            <dt><label for="f1">/inc/smarty/templates_c/</label></dt>
                            <dd><span class="status <?php echo strtolower($permisos['d3']['css']);?>"><?php echo $permisos['d3']['css'];?></span></dd>
                        </dl>
                        <p><input type="submit" value="<?php if($next == true) echo 'Continuar &raquo;'; else echo 'Volver a verificar';?>"/></p>
                    </fieldset>
                    </form>
                    <?php } elseif($step == 2) {?>
                    <form action="index.php?step=<?php if($next == true) echo '3'; else echo '2';?>" method="post" id="form">
                    <fieldset>
                        <legend>Base de datos</legend>
                        Ingresa tus datos de conexcion a la base de datos.
                        <?php if($message) echo '<div class="error">'.$message.'</div>';?>
                        <dl>
                            <dt><label for="f1">Servidor:</label><br /><span>Donde est&aacute; la base de datos, ej: <strong>localhost</strong></span></dt>
                            <dd><input type="text" id="f1" name="dbhost" value="<?php echo $dbhost;?>" /></span></dd>
                        </dl>
                        <dl>
                            <dt><label for="f2">Usuario:</label><br /><span>El usuario de tu base de datos.</span></dt>
                            <dd><input type="text" id="f2" name="dbuser" value="<?php echo $dbuser;?>" /></span></dd>
                        </dl>
                        <dl>
                            <dt><label for="f3">Contrase&ntilde;a:</label><br /><span>Para acceder a la base de datos.</span></dt>
                            <dd><input type="password" id="f3" name="dbpass" value="<?php echo $dbpass;?>" /></span></dd>
                        </dl>
                        <dl>
                            <dt><label for="f4">Base de datos</label><br /><span>Nombre de la base de datos para tu web.</span></dt>
                            <dd><input type="text" id="f4" name="dbname" value="<?php echo $dbname;?>" /></span></dd>
                        </dl>
                        <p><input type="submit" name="save" value="Continuar &raquo;"/></p>
                    </fieldset>
                    </form>
                    <?php } elseif($step == 3) {?>
                    <form action="index.php?step=<?php if($next == true) echo '4'; else echo '3';?>" method="post" id="form">
                    <fieldset>
                        <legend>Datos del sitio</legend>
                        <?php if($message) echo '<div class="error">'.$message.'</div>';?>
                        <dl>
                            <dt><label for="f1">Nombre:</label><br /><span>El t&iacute;tulo de tu web.</span></dt>
                            <dd><input type="text" id="f1" name="wname" value="<?php echo $wname;?>" /></span></dd>
                        </dl>
                        <dl>
                            <dt><label for="f2">Lema:</label><br /><span>Ej: Inteligencia recargada.</span></dt>
                            <dd><input type="text" id="f2" name="wslogan" value="<?php echo $wslogan;?>" /></span></dd>
                        </dl>
                        <dl>
                            <dt><label for="f3">Direcci&oacute;n:</label><br /><span>Ingresa la url donde  est&aacute; alojada tu web, sin la &uacute;ltima diagonal <strong>/</strong> </span></dt>
                            <dd><input type="text" id="f3" name="wurl" value="<?php echo $wurl;?>" /></span></dd>
                        </dl>
                        <dl>
                            <dt><label for="f4">Email:</label><br /><span>Email de la web o del administrador.</span></dt>
                            <dd><input type="text" id="f4" name="wmail" value="<?php echo $wmail;?>" /></span></dd>
                        </dl>
                        <p><input type="submit" name="save" value="Continuar &raquo;"/></p>
                    </fieldset>
                    </form>
                    <?php } elseif($step == 4) {?>
                    <form action="index.php?step=<?php if($next == true) echo '5'; else echo '4';?>" method="post" id="form">
                    <fieldset>
                        <legend>Administrador</legend>
                        Ingresa tus datos de usuario, m&aacute;s adelante debes editar tu cuenta para ingresar datos como, fecha de nacimiento, lugar de recidencia, etc.
                        <?php if($message) echo '<div class="error">'.$message.'</div>';?>
                        <dl>
                            <dt><label for="f1">Nombre de usuario:</label></dt>
                            <dd><input type="text" id="f1" name="uname" value="<?php echo $uname;?>" /></span></dd>
                        </dl>
                        <dl>
                            <dt><label for="f2">Contrase&ntilde;a:</label></dt>
                            <dd><input type="password" id="f2" name="upass" value="<?php echo $upass;?>" /></span></dd>
                        </dl>
                        <dl>
                            <dt><label for="f3">Confirmar contrase&ntilde;a:</label><br /><span>Ingresa tu contrase&ntilde;a nuevamente.</span></dt>
                            <dd><input type="password" id="f3" name="ucpass" value="<?php echo $ucpass;?>" /></span></dd>
                        </dl>
                        <dl>
                            <dt><label for="f4">Email:</label><br /><span>Ingresa tu direcci&oacute;n de email.</span></dt>
                            <dd><input type="text" id="f4" name="umail" value="<?php echo $umail;?>" /></span></dd>
                        </dl>
                        <p><input type="submit" name="save" value="Continuar &raquo;"/></p>
                    </fieldset>
                    </form>
                    <?php } elseif($step == 5) {?>
                    <h2 class="s16">Bienvenido a MovieScript Beta v1.0</h2>
                    <!-- ESTADISTICAS -->
                    <form action="http://www.marcofbb.com.ar/mscript/install.php" method="post" id="form">
                    <div class="error">Ingresa a tu FTP y borra la carpeta <strong>install</strong> antes de usar el script.</div>
                    <fieldset style="color: #555;">
                      Gracias por instalar <strong>MovieScript</strong>, ya est&aacute; lista tu nueva comunidad <strong>de películas</strong> s&oacute;lo inicia sesi&oacute;n con tus datos y comienza a disfrutar. Ahora no dejes de <a href="http://www.marcofbb.com.ar/" target="_blank"><u>visitarnos</u></a> para estar pendiente de futuras actualizaciones. Recuerda reportar cualquier bug que encuentres de esta manera todos ganamos.<br /><br />
                        Atte: <a href="http://www.marcofbb.com.ar/" target="_blank"><strong>Marcofbb</strong></a>
                    </fieldset>
                    <center>
						<input type="hidden" name="key" value="<?php echo $key;?>" />
                        <input type="submit" value="Finalizar" style="font-size: 12pt; font-weight: bold;" />
                    </center>
                    </form>
                    <?php } ?>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div id="footer">
            <p><a href="http://www.marcofbb.com.ar/" target="_blank">MovieScript</a> es un producto m&aacute;s de <a href="http://www.cubebox.mx" target="_blank">Marcofbb</a></p>
        </div>
    </div>
</body>
</html>