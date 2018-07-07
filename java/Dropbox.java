import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;


public class Dropbox 
{

	public static void droplist(WebDriver driver) 
	{
		ActiveUser au = new ActiveUser();
		String name = au.isActive(driver);
		
		if(!name.isEmpty())
		{
			driver.get("https://www.dropbox.com/sh/l380w5wx88rqfbt/AABp4cBahO5k4wfFSD0nsjHfa?dl=0");
			
			try {
				Thread.sleep(2000);
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			String locate = "//span[contains(text(),'"+name+"')]";
			driver.findElement(By.xpath(locate)).click();
			
		}
	}
}
