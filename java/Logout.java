import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.Statement;

import org.openqa.selenium.WebDriver;

public class Logout 
{
	 static final String JDBC_DRIVER = "com.mysql.jdbc.Driver";  
	   static final String DB_URL = "jdbc:mysql://localhost:3306/AI";

	  
	   static final String USER = "root";
	   static final String PASS = "";
	   
	public static void log_out(WebDriver driver) 
	{
		
		   Connection conn = null;
		   Statement stmt = null;
		   PlayResponse pr = new PlayResponse();
		   
		   	
		   try{
		    
		      Class.forName("com.mysql.jdbc.Driver");
		 
		      conn = DriverManager.getConnection(DB_URL,USER,PASS);

		      Statement statement = conn.createStatement();
		      statement.executeUpdate("TRUNCATE TABLE active_user");

		      statement.close();
		      conn.close();
		      driver.get("http://localhost/ngn/ngnlogout.php");
		      pr.playResp("Logout.mp3");
		   }
		   catch(Exception e)
		   {
			   
		   }
		

	}

}
