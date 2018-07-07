import org.openqa.selenium.WebDriver;

public class PlayVideo 
{
	public static void playVideo(WebDriver driver,String playVName) 
	{
		ActiveUser au = new ActiveUser();
		String name = au.isActive(driver);
		
		if(!name.isEmpty())
		{		
		String url = "http://localhost/ngn/playVideo.php/?uname="+name+"&vname="+playVName;
		driver.get(url);
		}
	}

}
