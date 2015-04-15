<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Login</title>  
</head>  
<body>  
    <form action="UsuariosExistentesServlet" method="post">  
        <fieldset style="width: 300px">  
            <legend> Usuarios Existentes </legend>  
            <table>  
                <input type="hidden" value="json" name="format" />
                <tr>  
                    <td><input type="submit" value="Resultado" /></td>  
                </tr>  
            </table>  
        </fieldset>  
    </form>  
</body>  
</html>