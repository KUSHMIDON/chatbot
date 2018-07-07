import java.util.Random;


public class passcode 
{
	public static String generatePasscode() 
	{
		Random rand = new Random();
		String id = String.format("%04d", rand.nextInt(10000));
        return id;
	}
}
