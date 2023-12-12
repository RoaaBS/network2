<%@ page import="java.io.BufferedReader" %>
<%@ page import="java.io.FileReader" %>
<%@ page import="java.io.IOException" %>
<%@ page import="java.util.HashMap" %>

<%
    HashMap<String, String> userCredentials = new HashMap<>();
    
    // This function reads the file and populates the userCredentials HashMap
    // You can replace the file path with your actual file path
    String filePath = "C:\\Users\\hp\\Documents\\net2\\file.txt";
    try (BufferedReader br = new BufferedReader(new FileReader(filePath))) {
        String line;
        while ((line = br.readLine()) != null) {
            String[] parts = line.split(":");
            if (parts.length == 2) {
                String username = parts[0];
                String password = parts[1];
                userCredentials.put(username, password);
            }
        }
    } catch (IOException e) {
        e.printStackTrace(); // Handle or log the exception
    }
%>

<%
    String userID = request.getParameter("username");
    String password = request.getParameter("password");
    
    String storedPassword = userCredentials.get(userID);
    if (storedPassword != null && storedPassword.equals(password)) {
        out.print("Permit");
    } else {
        out.print("Deny");
    }
%>
