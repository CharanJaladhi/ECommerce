<%@ page import="java.sql.*" %>
    <% 
        String enteredUsername=request.getParameter("username"); 
        String enteredPassword=request.getParameter("password");
        try { Class.forName("com.mysql.jdbc.Driver"); 
            Connection conn=DriverManager.getConnection("jdbc:mysql://localhost:3306/register", "root" , "charan@462" );
            PreparedStatement ps=conn.prepareStatement("select * from signup where username=? and pass=?");
            ps.setString(1, enteredUsername);
            ps.setString(2, enteredPassword); 
            ResultSet rs=ps.executeQuery(); 
            if (rs.next()) { 

                    out.println("Login Successful");
                    response.sendRedirect("home.html");   
        } 
            else { 
                // User not found or authentication failed
                out.println("Authentication failed. Username or password may be wrong!!"); 
                response.sendRedirect("login.html");  
            } 
        } catch (Exception e) { 
            out.println(e); 
        } 
    %>