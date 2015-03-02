package isabel2;

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import isabel.BuscarDao;
import isabel.Usuario;
import org.json.simple.*;

public class BuscarServlet extends HttpServlet {

    private static final long serialVersionUID = 1L;

    public void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        String e = request.getParameter("email");

        
        Usuario u = BuscarDao.validate(e);
        if (u!=null) {
            String format = request.getParameter("format");
            
            if (format.equals("json")) {
                JSONObject json = new JSONObject();
                json.put("success", true);
                JSONObject user = new JSONObject();
                user.put("usuario", u.getUsuario());
                json.put("user", user);
                
                out.print(json);
            }
        } else {
            String format = request.getParameter("format");
            if (format.equals("json")) {
                JSONObject json = new JSONObject();
                json.put("success", false);
                out.print(json);
               
                
            }

        }

        out.close();
    }
}
