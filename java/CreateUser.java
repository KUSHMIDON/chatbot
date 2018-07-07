import java.util.concurrent.TimeUnit;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

import java.io.File;
import java.sql.*;

public class CreateUser {
   
   static final String JDBC_DRIVER = "com.mysql.jdbc.Driver";  
   static final String DB_URL = "jdbc:mysql://localhost:3306/AI";

  
   static final String USER = "root";
   static final String PASS = "";
   
   public static void createTheUser(WebDriver driver,String name) 
   {
	   String input_2=null;
   Connection conn = null;
   Statement stmt = null;
   Statement stmt1 = null;
   
   UserExists ue = new UserExists();
   String o = ue.isPresent(driver, name);
   
   if(!o.equalsIgnoreCase("okay"))
   {
	   return;
   }
   	
   try{
    
      Class.forName("com.mysql.jdbc.Driver");
 
      conn = DriverManager.getConnection(DB_URL,USER,PASS);

    
   
      String sourcePath = "E:\\NGN\\video_storage";
      
      String sql;
      
      passcode pc = new passcode();
      String fourdigits = pc.generatePasscode();
      
      sql = "INSERT into USER(user_name,passcode) values (?,?)";
      
      PreparedStatement pstmt = conn.prepareStatement(sql);
          pstmt.setString(1, name);
          pstmt.setString(2, fourdigits);
   
          pstmt.executeUpdate();
     
          pstmt.close();
      
sql = "INSERT into video_path values (?,?)";
      
      PreparedStatement pstmt1 = conn.prepareStatement(sql);
          pstmt1.setString(1, name);
          pstmt1.setString(2, sourcePath);
   
          pstmt1.executeUpdate();
     
      pstmt1.close();
   
      
      conn.close();
      
      String inputpath = "C:\\xampp\\htdocs\\phpffmpeg\\input\\"+name;
      new File(inputpath).mkdirs();
      
      String qualitypath = "C:\\xampp\\htdocs\\phpffmpeg\\quality\\"+name;
      new File(qualitypath).mkdirs();
      
      String dropBoxPath = "C:\\Users\\KUMARYASH\\Dropbox\\syncoutput\\"+name;
      new File(dropBoxPath).mkdirs();
      
      String dropBoxPathi = "C:\\Users\\KUMARYASH\\Dropbox\\syncinput\\"+name;
      new File(dropBoxPathi).mkdirs();
      
      String link = "http://localhost/ngn/registersuccess.php/?name="+name; 
      driver.get(link); 
      PlayResponse pr = new PlayResponse();
      pr.playResp("UserAccountcreatedsuccessfully.mp3");
   
   }catch(SQLException se){
      se.printStackTrace();
   }catch(Exception e){
      e.printStackTrace();
   }finally{
      try{
         if(stmt!=null)
            stmt.close();
      }catch(SQLException se2){
      }// nothing we can do
      try{
         if(conn!=null)
            conn.close();
      }catch(SQLException se){
         se.printStackTrace();
      }
   }
   }
}
   

