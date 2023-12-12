

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.util.HashMap;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

@WebServlet("/NewServlet1")
public class NewServlet1 extends HttpServlet {
    private static final long serialVersionUID = 1L;
    private final HashMap<String, String> userCredentials = new HashMap<>();

    public NewServlet1() {
        readCredentialsFromFile("C:\\Users\\hp\\Documents\\net2\\file.txt");
    }

    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        String userID = request.getParameter("username");
        String password = request.getParameter("password");

        if (isValidUser(userID, password)) {
            response.getWriter().write("Permit");
        } else {
            response.getWriter().write("Deny");
        }
    }

    private boolean isValidUser(String userID, String password) {
        String storedPassword = userCredentials.get(userID);
        return storedPassword != null && storedPassword.equals(password);
    }

   private void readCredentialsFromFile(String filePath) {
    try (BufferedReader br = new BufferedReader(new FileReader(filePath))) {
        String line;
        while ((line = br.readLine()) != null) {
            System.out.println("Read line: " + line);
            String[] parts = line.split(":");
            if (parts.length == 2) {
                String username = parts[0];
                String password = parts[1];
                userCredentials.put(username, password);
            }
        }
        System.out.println("Users loaded from file: " + userCredentials);
    } catch (IOException e) {
        e.printStackTrace(); // Handle or log the exception
    }
}
}

