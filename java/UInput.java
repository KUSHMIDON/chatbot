import java.util.concurrent.TimeUnit;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

import java.io.IOException;
import java.sql.*;

public class UInput {
   
   static final String JDBC_DRIVER = "com.mysql.jdbc.Driver";  
   static final String DB_URL = "jdbc:mysql://localhost:3306/AI";

  
   static final String USER = "root";
   static final String PASS = "";
   
   public static void main(String[] args) throws ClassNotFoundException 
   {
	   String input_2="something";
   Connection conn = null;
   Statement stmt = null;
   Statement stmt1 = null;
   

   Connection conn1 = null;
   Statement stmt11 = null;
  
   try {
	Runtime.getRuntime().exec("taskkill /F /IM chromedriver.exe");	
	
//	Runtime.getRuntime().exec("taskkill /F /IM chrome.exe");
} catch (IOException e1) {
	// TODO Auto-generated catch block
	e1.printStackTrace();
}
   
   try {
	   
	   Class.forName("com.mysql.jdbc.Driver");
      conn1 = DriverManager.getConnection(DB_URL,USER,PASS);

	      stmt11 = conn1.createStatement();
	   

	stmt11.executeUpdate("truncate table user_input");
    stmt11.executeUpdate("TRUNCATE TABLE active_user");
	
	stmt11.close();
	conn1.close();
} catch (SQLException e1) {
	// TODO Auto-generated catch block
	e1.printStackTrace();
}
 
  
  System.setProperty("webdriver.chrome.driver", "E:\\jars\\chromedriver.exe");

	WebDriver driver = new ChromeDriver();
	
	PlayResponse pr = new PlayResponse();
	pr.playResp("WelcometoChatbot.mp3");
	
   try{
	   
	   while(true)
	   {  
	  Thread.sleep(2000);
    
      Class.forName("com.mysql.jdbc.Driver");

  
 
      conn = DriverManager.getConnection(DB_URL,USER,PASS);

      stmt = conn.createStatement();
   
      String sql;
      
     
      sql = "SELECT str FROM user_input";
      ResultSet rs = stmt.executeQuery(sql);

      while(rs.next()){
         String input_1 = rs.getString("str");
         if(input_1.equalsIgnoreCase(input_2))
         {
        	 continue;
         }
          input_2 = input_1;
          String login_name=null,video_name=null;
          Login obj = new Login();
          CreateUser cu = new CreateUser();
          Upload u = new Upload();
          Logout allout = new Logout();
          Call caf = new Call();
          PlayVideo sh = new PlayVideo();
          Playlist playlst = new Playlist();
          Dropbox droplst = new Dropbox();
          
          String arr[]=input_2.split(" ");
          
          for(int i=0;i<arr.length;i++)
          {
        	  if (arr[i].equalsIgnoreCase("Login"))
        	  {
        		 login_name = arr[i+1];
        		 obj.logging(driver,login_name);
        	  }
          }
          
//          for(int i=0;i<arr.length;i++)
//          {
//        	  if (arr[i].equalsIgnoreCase("morning"))
//        	  {
//        		 pr.playResp("morning.mp3");
//        		 stmt.executeUpdate("truncate table user_input");
//        		
//        	  }
//          }
          
//          for(int i=0;i<arr.length;i++)
//          {
//        	  if (arr[i].equalsIgnoreCase("evening"))
//        	  {
//        		 pr.playResp("evening.mp3");
//        		 stmt.executeUpdate("truncate table user_input");
//        		 break;
//        	  }
//          }
          
          for(int i=0;i<arr.length;i++)
          {
        	  if (arr[i].equalsIgnoreCase("weather"))
        	  {
     //   		 pr.playResp("weather.mp3");
        		 driver.get("http://localhost/ngn/weather.php");
      //  		 stmt.executeUpdate("truncate table user_input");
      //  		 break;
        	  }
          }
          
//          for(int i=0;i<arr.length;i++)
//          {
//        	  if (arr[i].equalsIgnoreCase("night"))
//        	  {
//        		 pr.playResp("night.mp3");
//        		 stmt.executeUpdate("truncate table user_input");
//        		 break;
//        	  }
//          }
          
//          for(int i=0;i<arr.length;i++)
//          {
//        	  if (arr[i].equalsIgnoreCase("hello"))
//        	  {
//        		 pr.playResp("hello.mp3");
//        		 stmt.executeUpdate("truncate table user_input");
//        		 break;
//        	  }
//          }
          
          for(int i=0;i<arr.length;i++)
          {
        	  if (arr[i].equalsIgnoreCase("Create"))
        	  {
        		  String userName = arr[i+2];
        		  System.out.println(userName);
        		  cu.createTheUser(driver,userName);
        		  
        	  }
          }
          
          for(int i=0;i<arr.length;i++)
          {
        	  if (arr[i].equalsIgnoreCase("Upload"))
        	  {
        		  String videoName = arr[i+2];
        		  System.out.println(videoName);
        		  u.uploadVideo(driver,videoName);
        		  
        	  }
          }
          
          for(int i=0;i<arr.length;i++)
          {
        	  if (arr[i].equalsIgnoreCase("Playlist"))
        	  {
        		 
        		  System.out.println("Visiting Playlist");
        		  playlst.playlist(driver);
        		  
        	  }
          }
          
          for(int i=0;i<arr.length;i++)
          {
        	  if (arr[i].equalsIgnoreCase("Dropbox"))
        	  {
        		 
        		  System.out.println("Visiting Dropbox");
        		  droplst.droplist(driver);
        		  
        	  }
          }
          
          for(int i=0;i<arr.length;i++)
          {
        	  if (arr[i].equalsIgnoreCase("Log"))
        	  {
        		  String out_word = arr[i+1];
        		  if (out_word.equalsIgnoreCase("out"))
        		  allout.log_out(driver);
        		  
        	  }
          }
          
          for(int i=0;i<arr.length;i++)
          {
        	  if (arr[i].equalsIgnoreCase("Logout"))
        	  {
        		 
        		  allout.log_out(driver);
        		  
        	  }
          }
          
          for(int i=0;i<arr.length;i++)
          {
        	  if (arr[i].equalsIgnoreCase("Call"))
        	  {
        		  String friendName = arr[i+1];
        		  System.out.println(friendName);
        		  caf.callAFriend(driver,friendName);
        		  
        	  }
          }
          
          for(int i=0;i<arr.length;i++)
          {
        	  if (arr[i].equalsIgnoreCase("Play"))
        	  {
        		  String playVName = arr[i+2];
        		  System.out.println(playVName);
        		  sh.playVideo(driver,playVName);
        		  
        	  }
        	  
          }
          
         System.out.print("Input: " + input_2);
         System.out.println();
      
      }
      rs.close();
      stmt.close();
      conn.close();
   }
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