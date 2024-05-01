import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.Random;

public class Tester {

	public static void main(String[] args) {

		DatabaseHelper dbHelper = new DatabaseHelper();

		// * * * * * INSERT INTO KUNDE * * * * *

		int emailHelper = 2;
		List<String> kundeNames = new ArrayList<>(Arrays.asList("Nikola", "Nemanja", "Sophia", "Jackson", "Emma",
				"Aiden", "Olivia", "Lucas", "Ava", "Liam", "Mia", "Noah", "Isabella", "Ethan", "Riley", "Mason", "Aria",
				"Caden", "Charlotte", "Oliver", "Scarlett", "Elijah", "Chloe", "Grayson", "Lily", "Jacob", "Amelia",
				"Michael", "Harper", "Benjamin", "Evelyn", "Carter", "Abigail", "James", "Emily", "Jayden", "Elizabeth",
				"Logan", "Mila", "Alexander", "Ella", "Levi", "Avery", "Sebastian", "Sofia", "Daniel", "Camila",
				"Matthew", "Aubrey", "David", "Zoey", "Joseph", "Penelope", "Samuel", "Luna", "Henry", "Grace", "Owen",
				"Victoria", "Jack", "Nova", "Wyatt", "Hannah", "John", "Layla", "Gabriel", "Zoe", "Julian", "Stella",
				"Leah", "Nathan", "Hazel", "Emily", "Violet", "Isaac", "Aurora", "Ryan", "Savannah", "Luke", "Audrey",
				"Henry", "Brooklyn", "Isaiah", "Bella", "Christian", "Claire", "Hunter", "Skylar", "Eli", "Lucy",
				"Aaron", "Paisley", "Landon", "Everly", "Connor", "Anna", "Caleb", "Caroline", "Elias", "Eleanor",
				"Colton", "Sarah", "Marko", "Milutin", "Dusan"));
		List<String> kundeLastnames = new ArrayList<>(Arrays.asList("Smith", "Johnson", "Williams", "Jones", "Brown",
				"Davis", "Miller", "Wilson", "Moore", "Taylor", "Anderson", "Thomas", "Jackson", "White", "Harris",
				"Martin", "Thompson", "Garcia", "Martinez", "Robinson", "Clark", "Rodriguez", "Lewis", "Lee", "Walker",
				"Hall", "Allen", "Young", "Hernandez", "King", "Wright", "Lopez", "Hill", "Scott", "Green", "Adams",
				"Baker", "Gonzalez", "Nelson", "Carter", "Mitchell", "Perez", "Roberts", "Turner", "Phillips",
				"Campbell", "Parker", "Evans", "Edwards", "Collins", "Stewart", "Sanchez", "Morris", "Rogers", "Reed",
				"Cook", "Morgan", "Bell", "Murphy", "Bailey", "Rivera", "Cooper", "Richardson", "Cox", "Howard", "Ward",
				"Torres", "Peterson", "Gray", "Ramirez", "James", "Watson", "Brooks", "Kelly", "Sanders", "Price",
				"Bennett", "Wood", "Barnes", "Ross", "Henderson", "Coleman", "Jenkins", "Perry", "Powell", "Long",
				"Patterson", "Hughes", "Flores", "Washington", "Butler", "Simmons", "Foster", "Nemanjic", "Obilic",
				"Ilic", "Kraljevic"));

		System.out.println("Insert into Kunde dauert ~30 sekunden.");

		for (int i = 0; i < 2000; i++) {
			int vornameRandom = new Random().nextInt(kundeNames.size());
			int nachnameRandom = new Random().nextInt(kundeLastnames.size());
			String vorname = kundeNames.get(vornameRandom);
			String nachanme = kundeLastnames.get(nachnameRandom);
			String emailHelp = Integer.toString(emailHelper) + "@hotmail.com";
			String email = vorname + emailHelp;

			emailHelper += 2; 
								

			dbHelper.insertIntoKunde(email, vorname, nachanme);

		}
		int result = dbHelper.countFromKunde();

		System.out.println("Insert into kunde fertig!  " + result + " von 2000");

		// * * * * * * INSERT INTO BESTELLUNG * * * *

		List<String> kundeBestellungEmail = new ArrayList<>();
		kundeBestellungEmail = dbHelper.getKundeEmail();

		for (int j = 0; j < 500; j++) {

			int randomEmail = new Random().nextInt(kundeBestellungEmail.size());
			String kEmail = kundeBestellungEmail.get(randomEmail);
			dbHelper.insertIntoBestellung(kEmail);

		}
		int bestres = dbHelper.countFromBestellung();
		System.out.println("Insert into Bestellung fertig!  " + bestres + " von 500");

		// * * * * * INSERT INTO RECHNUNG * * * * * **

		List<Integer> bestellungenNummern = dbHelper.getBestellungsNummer();

		List<String> zahlungsArten = new ArrayList<>(Arrays.asList("Kreditkarte", "Debitkarte", "PayPal", "E-Wallet"));

		for (int p = 0; p < bestellungenNummern.size(); p++) {
			Integer bNr = bestellungenNummern.get(p);
			String ausD = "01-01-2023";
			String zahlung = zahlungsArten.get(p % 4);

			dbHelper.insertIntoRechnung(bNr, ausD, zahlung);

		}
		int rechres = dbHelper.countFromRechnung();
		System.out.println("Insert into Rechnung fertig!  " + rechres + " von " + bestellungenNummern.size());

		// * * * * * INSERT INTO OHRRING * * * * *

		List<String> produktFarbe = new ArrayList<>(
				Arrays.asList("Pastel Pink", "Lavender", "Pastel Blue", "Mint Green", "Peach", "Baby Blue", "Blush",
						"Lilac", "Salmon", "Periwinkle", "Pale Yellow", "Mauve", "Sky Blue", "Pale Green", "Coral",
						"Aqua", "Muted Purple", "Powder Pink", "Mint Blue", "Soft Orange", "Light Grey", "Soft Pink",
						"Seafoam Green", "Butter Yellow", "Dusty Rose", "Ivory", "Champagne", "Light Lavender",
						"Pale Turquoise", "Pale Peach", "Light Mint", "Soft Lilac", "Pistachio", "Pale Salmon",
						"Baby Pink", "Pale Blue", "Cream", "Pale Green", "Pearl White", "Pale Violet", "Powder Blue"));
		List<String> produktForm = new ArrayList<>(Arrays.asList("Star", "Heart", "Moon", "Flower", "Butterfly",
				"Cactus", "Cupcake", "Rainbow", "Unicorn", "Pineapple", "Ice Cream Cone", "Cat", "Diamond", "Feather",
				"Anchor", "Lipstick", "Sunglasses", "Dolphin", "Camera", "Watermelon", "Taco", "Pizza Slice", "Cloud",
				"Music Note", "Paw Print", "Raindrop", "Lollipop", "Sun", "Smiley Face", "Eiffel Tower", "Flip Flop",
				"Horseshoe", "Bow", "Ladybug", "Seashell", "Crown", "Guitar", "Hot Air Balloon", "Mermaid Tail",
				"Sailboat", "Elephant"));

		System.out.println("Insert into Ohrring dauert ca ~30 sekunden.");

		for (int o = 0; o < 2250; o++) {
			int rColor = new Random().nextInt(produktFarbe.size());
			int rShape = new Random().nextInt(produktForm.size()); 

			int rBestll = new Random().nextInt(bestellungenNummern.size() / 10);
			Integer bestellungnummerO = bestellungenNummern.get(rBestll);

			String oName = produktFarbe.get(rColor) + " " + produktForm.get(rShape);

			dbHelper.insertIntoOhrring(oName, bestellungnummerO);

		}
		int ohrres = dbHelper.countFromOhrring();
		System.out.println("Insert into Ohrring ferig!  " + ohrres + " von 2250");

		// * * * * * INSERT INTO HALSKETTE * * * * * *
		System.out.println("Insert into Halskette dauert ca ~30 sekunden.");
		List<String> groessen = new ArrayList<>(Arrays.asList("XS", "S", "M", "L", "XL"));

		for (int h = 0; h < 2300; h++) {
			int hColor = new Random().nextInt(produktFarbe.size());
			int hShape = new Random().nextInt(produktForm.size());
			int hSize = new Random().nextInt(groessen.size());
			int hBest = new Random().nextInt(bestellungenNummern.size());

			Integer hBestellung = bestellungenNummern.get(hBest);
			String hName = produktFarbe.get(hColor) + " " + produktForm.get(hShape);
			String hGroesse = groessen.get(hSize);

			dbHelper.insertIntoHalskette(hName, hGroesse, hBestellung);
		}
		int halsres = dbHelper.countFromHalskette();
		System.out.println("Insert into Halskette feritg!  " + halsres + " von 2300");
		// * * * * * * INSERT INTO OHRRING_PAAR * * * * * *

		List<Integer> ohrringIDs = dbHelper.getOhrringProduktId();

		for (int paarH = 0; paarH < 10; paarH++) {
			int h1 = new Random().nextInt(ohrringIDs.size() - 10);
			int h2 = h1 + 1;
			Integer p1 = ohrringIDs.get(h1);
			Integer p2 = ohrringIDs.get(h2);

			dbHelper.insertIntoOhrringPaar(p1, p2);
		}
		int ohrringpaarres = dbHelper.countFromOhrringPaar();
		System.out.println("Insert into Ohrring_paar fertig!  " + ohrringpaarres + " von 10");

		// * * * * * * INSER ITNO DESIGNER * * * * * *

		List<String> designerNames = new ArrayList<String>(
				Arrays.asList("Hello Kitty", "My Melody", "Little Twin Stars", "Cinnamoroll", "Keroppi", "Badtz-Maru",
						"Chococat", "Tuxedosam", "Pochacco", "Hangyodon", "Kuromi", "Sugarbunnies", "Bonbonribbon",
						"Dear Daniel", "Charmmy Kitty", "Spottie Dottie", "Mimmy White", "The Little Ghost"));
		List<String> assistentNames = new ArrayList<>(Arrays.asList("Monkichi", "Tuxedo Sam", "Marumofubiyori",
				"Kaitai Fantasy", "Shinkansen Henkei Robo Shinkalion", "Gurumi no Mori no Monogatari", "Jewelpet",
				"Pekkle", "Landry", "Hana-Maru", "Tora-Maru", "Usahana", "Tippy", "Wish Me Mell", "Purin the Dog",
				"Charmmy Queen", "Rascal", "Kocchi-Muite! Miiko"));

		for (int des = 0; des < designerNames.size(); des++) {
			String desname = designerNames.get(des);
			String desEmail = desname + "@sanrio.com";

			dbHelper.insertIntoDesigner(desEmail, desname);
		}
		int dessres = dbHelper.countFromDesigner();
		System.out.println("Insert into Designer feritg!  " + dessres + " von " + designerNames.size());
		// * * * * * * INSERT INTO ASSISTENT * * * * * *

		for (int as = 0; as < assistentNames.size(); as++) {
			String asName = assistentNames.get(as);
			Integer years = new Random().nextInt(6) + 1;

			dbHelper.insertIntoAssistent(asName, years);
		}
		int assress = dbHelper.countFromAssistent();
		System.out.println("Insert into Assistent fertig!  " + assress + " von " + assistentNames.size());

		// * * * * * * INSERT INTO KREIRENBESTELLUNG * * * * * *

		List<Integer> designersIDs = dbHelper.getDesignerID();
		List<Integer> assistentsIDs = dbHelper.getAssistentID();

		for (int summ = 0; summ < bestellungenNummern.size(); summ++) {
			int randAs = new Random().nextInt(assistentNames.size());
			int randDes = new Random().nextInt(designerNames.size());

			Integer desID = designersIDs.get(randDes);
			Integer asID = assistentsIDs.get(randAs);
			Integer bestNr = bestellungenNummern.get(summ);

			dbHelper.insertIntoKreirenBestellung(bestNr, desID, asID);

		}
		int krebestres = dbHelper.countFromKreirenBestellung();
		System.out
				.println("insert into KreirenBestellung fertig!  " + krebestres + " von " + bestellungenNummern.size());

		// * * * * * * INSERT INTO HABENKONTAKT * * * * * *

		for (int kundekontakt = 0; kundekontakt < kundeBestellungEmail.size(); kundekontakt++) {
			String kundeMail = kundeBestellungEmail.get(kundekontakt);
			int randDes = new Random().nextInt(designersIDs.size());
			Integer designerKontaktId = designersIDs.get(randDes);

			dbHelper.insertIntoHabenkontakt(designerKontaktId, kundeMail);

		}
		int habkres = dbHelper.countFromHabenKontakt();
		System.out.println("Insert into HabenKontakt fertig!  " + habkres + " von " + kundeBestellungEmail.size());
		System.out.println("Alles geschafft!");
		dbHelper.close();
	}

}