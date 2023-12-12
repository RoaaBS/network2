/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package javaapplication1;
import java.io.BufferedReader;
import java.io.DataOutputStream;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.nio.charset.StandardCharsets;

public class YourJavaClient {
    
   
    
    public String sendVerify1Request(String servletUrl, String userID, String password) throws IOException {
        URL url = new URL(servletUrl);
        HttpURLConnection connection = (HttpURLConnection) url.openConnection();
    
        connection.setRequestMethod("POST");
        connection.setRequestProperty("Content-Type", "application/x-www-form-urlencoded");
        connection.setDoOutput(true);
        
        String parameters = "&userID=" + userID + "&password=" + password;
        try (DataOutputStream wr = new DataOutputStream(connection.getOutputStream())) {
            byte[] postData = parameters.getBytes(StandardCharsets.UTF_8);
            wr.write(postData);
        }
        
        StringBuilder response = new StringBuilder();
        try (BufferedReader in = new BufferedReader(new InputStreamReader(connection.getInputStream()))) {
            String inputLine;
            while ((inputLine = in.readLine()) != null) {
                response.append(inputLine);
            }
        }
        connection.disconnect();
        return response.toString();
    }

    public String sendVerify2Request(String jspUrl, String name, String password) throws IOException {
         URL url = new URL(jspUrl);
        HttpURLConnection connection = (HttpURLConnection) url.openConnection();
        connection.setRequestMethod("POST");
        connection.setRequestProperty("Content-Type", "application/x-www-form-urlencoded");
        connection.setDoOutput(true);
        String parameters = "&username=" + name + "&password=" + password;
        try (DataOutputStream wr = new DataOutputStream(connection.getOutputStream())) {
            byte[] postData = parameters.getBytes(StandardCharsets.UTF_8);
            wr.write(postData);
        }

        StringBuilder response = new StringBuilder();
        try (BufferedReader in = new BufferedReader(new InputStreamReader(connection.getInputStream()))) {
            String inputLine;
            while ((inputLine = in.readLine()) != null) {
                response.append(inputLine);
            }
        }

        connection.disconnect();

        return response.toString();
    }
}
