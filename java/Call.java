import java.awt.event.InputEvent;
import java.io.File;
import java.io.IOException;
import java.sql.DriverManager;
import java.sql.SQLException;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.chrome.ChromeOptions;
import org.openqa.selenium.remote.DesiredCapabilities;


public class Call {

	public static void callAFriend(WebDriver driver, String Name) 
	{
		driver.get("https://login.skype.com/");
		driver.findElement(By.id("i0116")).sendKeys("postulatesofshubham@gmail.com");
		
		try {
			Thread.sleep(2000);
		} catch (InterruptedException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		driver.findElement(By.id("idSIButton9")).click();
		
		try {
			Thread.sleep(2000);
		} catch (InterruptedException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		driver.findElement(By.id("i0118")).sendKeys("Kryash@@12");
		try {
			Thread.sleep(2000);
		} catch (InterruptedException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		driver.findElement(By.id("idSIButton9")).click();
		
		try {
			Thread.sleep(5000);
		} catch (InterruptedException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		
		
		driver.get("https://web.skype.com/en/");
		
		
		try
		{
			Thread.sleep(5000);
		    
		    Thread.sleep(20000);
		    
		    driver.findElement(By.xpath("//input[@role='search']")).sendKeys(Name);
		    Thread.sleep(5000);
		    
		    driver.findElement(By.xpath("//button[@title='Call']")).click();
		    
		 
		}
		catch(Exception e)
		{
		System.out.println("Exception = "+e);
		}
		
	}

}
