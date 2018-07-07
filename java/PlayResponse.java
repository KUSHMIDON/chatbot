import java.io.FileInputStream;
import java.io.FileNotFoundException;

import javazoom.jl.decoder.JavaLayerException;
import javazoom.jl.player.Player;

public class PlayResponse 
{
	public static void playResp(String bip) 
	{
		String fullname = "C:\\xampp\\htdocs\\ngn\\audio\\"+bip;
		try {
			FileInputStream fileInputStream = new FileInputStream(fullname);
			Player player = new Player(fileInputStream);
			player.play();
		} catch (Exception e) 
		{
			System.out.println("Exception e = "+e);
		}
	}

}
