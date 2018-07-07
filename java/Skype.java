import java.awt.AWTException;
import java.awt.Robot;
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


public class Skype {

	public static void main(String[] args) 
	{
		
		
		
		System.setProperty("webdriver.chrome.driver", "E:\\jars\\chromedriver.exe");
		WebDriver driver=null;
		Robot bot = null;
		
		// TODO Auto-generated method stub

		try {
			Runtime.getRuntime().exec("taskkill /F /IM chromedriver.exe");	
			
//			Runtime.getRuntime().exec("taskkill /F /IM chrome.exe");
		} catch (IOException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		}
		   
		
		driver = new ChromeDriver();
		driver.get("https://login.skype.com/");
		driver.manage().window().maximize();
		
		ChromeOptions options = new ChromeOptions();
		options.addArguments("--disable-notifications");
		
		try {
			bot = new Robot();
		} catch (AWTException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		}
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
		 bot.mouseMove(360, 195);    
		    bot.mousePress(InputEvent.BUTTON1_MASK);
		    bot.mouseRelease(InputEvent.BUTTON1_MASK);
		    
		    Thread.sleep(20000);
		    
		    driver.findElement(By.xpath("//button[@title='Call']")).click();
		    
		    bot.mouseMove(1785, 250);    
		    bot.mousePress(InputEvent.BUTTON1_MASK);
		    bot.mouseRelease(InputEvent.BUTTON1_MASK);
		}
		catch(Exception e)
		{
		System.out.println("Exception = "+e);
		}
	}

}
