import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.Statement;

import org.openqa.selenium.WebDriver;


public class ActiveUser 
{
	 static final String JDBC_DRIVER = "com.mysql.jdbc.Driver";  
	   static final String DB_URL = "jdbc:mysql://localhost:3306/AI";

	  
	   static final String USER = "root";
	   static final String PASS = "";


	public static String isActive(WebDriver driver) 
	{
		Connection conn = null;
		   Statement stmt = null;
	   
	try
	{
		Class.forName("com.mysql.jdbc.Driver");
		
		conn = DriverManager.getConnection(DB_URL,USER,PASS);

	      stmt = conn.createStatement();
	   
	      String sql;
	 
	      sql = "SELECT user_name FROM active_user";
	      ResultSet rs = stmt.executeQuery(sql);

	      while(rs.next())
	      {
	         String input_1 = rs.getString("user_name");
	         if(input_1.isEmpty())
	         {
	        	 driver.get("http://localhost/ngn/Login_Error.php");
	         }
	         else
	         {
	        	 return input_1;
	         }
	        

	      }
	}
	      catch(Exception e)
	{
	    	  System.out.println("Exception e1 = "+e);
	}
	 return "";
	}

}

