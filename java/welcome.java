import java.util.concurrent.TimeUnit;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;
public class welcome 
{
	public static void welcomeHome(WebDriver driver)
	{
		driver.get("http://localhost/ngn/welcome.php");
	}

}
