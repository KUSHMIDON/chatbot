import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.Statement;
import java.util.concurrent.TimeUnit;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;
public class Login
{
	static final String JDBC_DRIVER = "com.mysql.jdbc.Driver";  
	   static final String DB_URL = "jdbc:mysql://localhost:3306/AI";

	  
	   static final String USER = "root";
	   static final String PASS = "";
	
	public static void logging(WebDriver driver,String name) 
	{
		Connection conn = null;
		   Statement stmt = null;
	   
	try
	{
		Class.forName("com.mysql.jdbc.Driver");
		
		conn = DriverManager.getConnection(DB_URL,USER,PASS);

	      stmt = conn.createStatement();
	   
	      String sql;
	 
	      sql = "SELECT count(*) FROM user where UPPER(user_name) LIKE UPPER('"+name+"')";
	      ResultSet rs = stmt.executeQuery(sql);
	      
	      rs.next();
	      
	      if ( rs.getInt(1) == 0 )
	      {
	    	  PlayResponse pr = new PlayResponse();
	    		
	    	  System.out.println("Please create the user");
	    	  driver.get("http://localhost/ngn/user_not_exists.php");
	    	  pr.playResp("user_does_not_exists.mp3");
	      }
	      else
	      {
		
	    driver.get("http://localhost/ngn/passcode.php");  
	    PlayResponse pr = new PlayResponse();
	      pr.playResp("enter_the_passcode.mp3");
	      }
	}
	catch(Exception ex)
	{
		System.out.println("Exception e = "+ex);
	}

	}

}
