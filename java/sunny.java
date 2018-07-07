import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

public class sunny {

	public static void main(String[] args)throws Exception {
		// TODO Auto-generated method stub
		 System.setProperty("webdriver.chrome.driver", "E:/jars/chromedriver.exe");

			WebDriver driver = new ChromeDriver();
			 driver.get("http://www.google.com");  
	}

}
