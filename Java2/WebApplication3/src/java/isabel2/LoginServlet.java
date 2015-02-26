/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package isabel2;

import java.io.IOException;  
import java.io.PrintWriter;  
  
import javax.servlet.RequestDispatcher;  
import javax.servlet.ServletException;  
import javax.servlet.http.HttpServlet;  
import javax.servlet.http.HttpServletRequest;  
import javax.servlet.http.HttpServletResponse;  
import javax.servlet.http.HttpSession;  
  
import isabel.LoginDao;  
  
public class LoginServlet extends HttpServlet{  
  
    private static final long serialVersionUID = 1L;  
  
    public void doPost(HttpServletRequest request, HttpServletResponse response)    
            throws ServletException, IOException {    
  
        response.setContentType("text/html");    
        PrintWriter out = response.getWriter();    
          
        String n=request.getParameter("username");    
        String p=request.getParameter("userpass");   
          
        HttpSession session = request.getSession(false);  
        if(session!=null)  
        session.setAttribute("name", n);  
  
        if(LoginDao.validate(n, p)){   
            // Leer parametro format
            String format=request.getParameter("format");
            if (format.equals("json")) {
                out.print("{success:true,"
                        + "user:{"
                        + "name:"+ n +",}"
                        + "}");
            } 
        }    
  else {
            String format=request.getParameter("format");
            if (format.equals("json")) {
                 out.print("{success:false,"
                        + "error: Usuario o contraseña INVALIDOS"); 
            } 
            
            }
  
        out.close();    
    }    
}   