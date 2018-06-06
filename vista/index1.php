<table width="100%">
                          <tr>
                            <td align="center" background="imagenes/linkstrip.jpg" height="23"></td>
                          </tr>
                          <tr>
                            <td align="center"><font color="#336699" size="3" face="verdana">Bienvenidos al Sistema de gestión de libros del repositorio digital. <p>
							Por favor inice sesión o cree su cuenta</font>
                            </td>
                          </tr>
						  <tr>
						  <td>
<form action="controlador/control.php" method="POST"> 
<table align="center" cellspacing="2" cellpadding="2" border="0"> 
<tr> 
<td colspan="3" align="center" <?php if($_GET["errorusuario"]=="si"){ ?> bgcolor="red" >
<span style="color:ffffff"><b>Datos incorrectos</b></span><br />
Por favor escriba nuevamente su Nombre de usuario y su contraseña 
<?php }else{ ?> 
bgcolor="#cccccc" >Por favor escriba su Nombre de usuario y su contraseña para iniciar sesión:<?php } ?> <br /><br /></td> 
</tr> 
<tr>
<td align="right">Nombre de usuario:</td> <br />
<td colspan="2" align="left" ><input type="Text" name="usuario" size="8" maxlength="50" required autofocus></td> 
</tr> 
<tr> 
<td align="right">Contrase&ntilde;a:</td>
<td align="left"><input type="password" name="contrasena" size="8" maxlength="50" required></td>
<td align="center"><input type="Submit" value="Iniciar sesión"></td>  
</tr> 
</table> </form>
						  </td>
						  </tr>						  
						  <tr>
                            <td align="right">
                            <form action="?pagina=form_registro" method="POST">
                            <input type="Submit" value="Crear mi cuenta">
                            </form>
                            </td>
                          </tr>
						  <tr>
                            <td align="center" background="imagenes/link-stripabajo.jpg" height="25"></td>
                          </tr>
						  </table>