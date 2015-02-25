<%-- 
    Document   : welcome
    Created on : 8/02/2015, 10:05:19 PM
    Author     : DELL
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>BIENVENIDO <%=session.getAttribute("name")%></title>  
</head>  
<body>  
    <h3>Login Exitoso!!!</h3>  
    <h4>  
        HOLA,  
        <%=session.getAttribute("name")%></h4>  
</body>  
</html> 
