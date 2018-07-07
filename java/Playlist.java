import org.openqa.selenium.WebDriver;


public class Playlist 
{

	public static void playlist(WebDriver driver) 
	{
		ActiveUser au = new ActiveUser();
		String name = au.isActive(driver);
		
		if(!name.isEmpty())
		{
			driver.get("http://localhost/ngn/displayPlaylist.php/?name="+name);			
		}
	}
}
