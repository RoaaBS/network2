<%-- 
    Document   : response
    Created on : Feb 23, 2018, 1:53:53 PM
    Author     : raed
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <jsp:useBean id="mybean" scope="session" class="org.mypackage.hello.NameHandler" />
        <jsp:setProperty name="mybean" property="name"  />
        <h1>Hello ! <jsp:getProperty name="mybean" property="name" /> </h1>
    </body>
</html>
