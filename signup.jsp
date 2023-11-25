<%@ page import = "java.sql.*" %>
<%
String username = request.getParameter("username");
String email = request.getParameter("email");
String pass = request.getParameter("password");
try {
    Class.forName("com.mysql.cj.jdbc.Driver");
    Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:/register", "root", "charan@462");
    PreparedStatement ps = conn.prepareStatement("insert into signup(username,pass,email) values (?, ?, ?)");
    ps.setString(1, username);
    ps.setString(2, pass);
    ps.setString(3, email);
    int x = ps.executeUpdate();
    if (x > 0) {
        out.println("Registration successful!!"); 
        response.sendRedirect("login.html");
    }
    else {
        out.println("Registration failed");
        response.sendRedirect("signup.html");
    }

}
catch(Exception e) {
    out.println(e);
}
%>