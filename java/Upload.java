import java.io.File;
import java.io.IOException;
import java.nio.file.Files;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Statement;

import org.apache.commons.io.FileUtils;
import org.openqa.selenium.WebDriver;

public class Upload 
{
	 static final String JDBC_DRIVER = "com.mysql.jdbc.Driver";  
	   static final String DB_URL = "jdbc:mysql://localhost:3306/AI";

	  
	   static final String USER = "root";
	   static final String PASS = "";
	   
	public static void uploadVideo(WebDriver driver,String videoname) 
	{
		
		String source_path=null,dest_path=null,dropBox_path=null;
		   Connection conn = null;
		   Statement stmt = null;
		   	
		   try{
		    
		      Class.forName("com.mysql.jdbc.Driver");
		 
		      conn = DriverManager.getConnection(DB_URL,USER,PASS);

		      stmt = conn.createStatement();
		      
		      String sql;
		      
		      sql = "SELECT user_name FROM active_user";
		      ResultSet rs = stmt.executeQuery(sql);
		      rs.next();

		      String uname = rs.getString("user_name");
		      
		      sql = "SELECT videopath FROM video_path";
		      ResultSet rs1 = stmt.executeQuery(sql);
		      rs1.next();
		      source_path = rs1.getString("videopath");
		      
		      try {
				sql = "INSERT into video(video_name,user_id) values (?,?)";
				  PreparedStatement pstmt = conn.prepareStatement(sql);
				  pstmt.setString(1, videoname);
				  pstmt.setString(2, uname);
   
				  pstmt.executeUpdate();
    
				  pstmt.close();
			} catch (Exception e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}
		      
		      stmt.close();
		
		source_path = source_path+"\\"+videoname+".mp4";
		dest_path = "C:\\xampp\\htdocs\\phpffmpeg\\input\\"+uname+"\\"+videoname+".mp4";
		dropBox_path = "C:\\Users\\KUMARYASH\\Dropbox\\syncinput\\"+uname+"\\"+videoname+".mp4";
		File source = new File(source_path);
		File dest = new File(dest_path);
		File dropBox = new File(dropBox_path);
		try {
		    Files.copy(source.toPath(), dest.toPath());
		    Files.copy(source.toPath(), dropBox.toPath());
		} catch (IOException e) {
		    e.printStackTrace();
		}
		
		
		
		String convert = "http://localhost/phpffmpeg/code/demoandconvert.php/?name="+uname+"&file="+videoname+".mp4";
		driver.get(convert);
		
		
		
		
		   }
		   catch(Exception e)
		   {
			 System.out.println("Exception = "+e);  
			 driver.get("http://localhost/ngn/Login_Error.php");
		   }

	}

}
