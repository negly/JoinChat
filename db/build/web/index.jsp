<%-- 
    Document   : index
    Created on : 8/02/2015, 10:03:49 PM
    Author     : DELL
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Login Application</title>  
</head>  
<body>  
    <form action="LoginServlet" method="post">  
        <fieldset style="width: 300px">  
            <legend> INICIO DE SESION </legend>  
            <table>  
                <tr>  
                    <td>Usuario:</td>  
                    <td><input type="text" name="username" required="required" /></td>  
                </tr>  
                <tr>  
                    <td>Contraseña:</td>  
                    <td><input type="text" name="userpass" required="required" /></td>  
                </tr>  
                <tr>  
                    <td><input type="submit" value="ENTRAR" /></td>  
                </tr>  
            </table>  
        </fieldset>  
    </form>  
</body>  
</html>
