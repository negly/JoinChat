package Servlet;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import org.json.simple.JSONObject;

public class UsuariosExistentesServlet extends HttpServlet {

public void doPost(HttpServletRequest request, HttpServletResponse response)
                                 throws ServletException, IOException{
    response.setContentType("text/html");
    PrintWriter pw = response.getWriter();
    String connectionURL = "jdbc:mysql://localhost/JoinChat";
    Connection connection;
    try{       
      Class.forName("com.mysql.jdbc.Driver");
      connection = DriverManager.getConnection(connectionURL, "root", "2403");
      
      
      PreparedStatement pst = connection.prepareStatement("Select count(*) FROM Usuarios");
 ResultSet i = null;
      i = pst.executeQuery();           
            if (i.next()) {  
                String resu = i.getString("count(*)");
          String format = request.getParameter("format");
       if (format.equals("json")) {
                JSONObject json = new JSONObject();
                json.put("resultado", resu);
                pw.print(json);
            }
                 
      }
      else{
        String format = request.getParameter("format");
            if (format.equals("json")) {
                JSONObject json = new JSONObject();
                json.put("message","Error");
                pw.print(json);
       }
       }
    
      
    }
    catch (Exception e){
      pw.println(e);
    }
    pw.close();
  }
}