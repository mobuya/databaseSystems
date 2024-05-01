
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Statement;
import java.util.ArrayList;

class DatabaseHelper {
	// Database connection info
	private static final String DB_CONNECTION_URL = "jdbc:oracle:thin:@oracle19.cs.univie.ac.at:1521:orclcdb";
	private static final String USER = "a12044041"; // TODO: use a + matriculation number
	private static final String PASS = "dbs23"; // TODO: use your password (default: dbs19)

	private static Statement stmt;
	private static Connection con;

	// CREATE CONNECTION
	DatabaseHelper() {
		try {
			// establish connection to database
			con = DriverManager.getConnection(DB_CONNECTION_URL, USER, PASS);
			stmt = con.createStatement();

		} catch (Exception e) {
			e.printStackTrace();
		}
	}

	// INSERT INTO KUNDE
	void insertIntoKunde(String email, String vorname, String nachname) {
		try {
			String sql = "INSERT INTO KUNDE (EMAIL, VORNAME, NACHNAME) VALUES('" + email + "', '" + vorname + "', '"
					+ nachname + "')";
			stmt.execute(sql);
		} catch (Exception e) {
			System.err.println("Error wuith insertIntoKundE(): " + e.getMessage());
		}
	}

	int countFromKunde() {
		int count = 0;

		try {
			ResultSet rs = stmt.executeQuery("select count(*) from kunde");
			while (rs.next()) {
				count = rs.getInt("count(*)");
			}
			rs.close();
		} catch (Exception e) {
			System.err.println("Errow with countfromKunde(): " + e.getMessage());
		}

		return count;
	}

	ArrayList<String> getKundeEmail() {
		ArrayList<String> kundeEmail = new ArrayList<>();

		try {
			ResultSet rs = stmt.executeQuery("SELECT EMAIL FROM KUNDE");
			while (rs.next()) {
				kundeEmail.add(rs.getString("EMAIL"));
			}
			rs.close();
		} catch (Exception e) {
			System.err.println("Errow with getKundeEmail(): " + e.getMessage());
		}
		return kundeEmail;
	}

	void insertIntoBestellung(String kundeEmail) {
		try {
			String sql = "INSERT INTO bestellung ( kunde_email) VALUES (?)";
			PreparedStatement statement = con.prepareStatement(sql);
			statement.setString(1, kundeEmail);
			statement.executeUpdate();
			statement.close();
		} catch (Exception e) {
			System.err.println("Error with insertIntoBestellung(): " + e.getMessage());
		}
	}

	int countFromBestellung() {
		int count = 0;

		try {
			ResultSet rs = stmt.executeQuery("select count(*) from bestellung");
			while (rs.next()) {
				count = rs.getInt("count(*)");
			}
			rs.close();
		} catch (Exception e) {
			System.err.println("Errow with countFromBestellung(): " + e.getMessage());
		}

		return count;
	}

	ArrayList<Integer> getBestellungsNummer() {
		ArrayList<Integer> bestellungsNummer = new ArrayList<>();
		try {
			ResultSet rs = stmt.executeQuery("SELECT BestellungsNummer FROM BESTELLUNG");
			while (rs.next()) {
				bestellungsNummer.add(rs.getInt("BestellungsNummer"));
			}
			rs.close();
		} catch (Exception e) {
			System.err.println("Errow with getBestellungsNummer(): " + e.getMessage());

		}

		return bestellungsNummer;
	}

	void insertIntoRechnung(Integer bestNr, String austDatum, String zahlung) {
		try {
			String sql = "INSERT INTO RECHNUNG(BESTELLUNGSNUMMER, AUSSTELLUNGSDATUM, ZAHLUNGSART) VALUES (?, to_date(?, 'DD-MM-YYYY'), ?)";
			PreparedStatement statement = con.prepareStatement(sql);
			statement.setInt(1, bestNr);
			statement.setString(2, austDatum);
			statement.setString(3, zahlung);
			statement.executeUpdate();
			statement.close();
		} catch (Exception e) {
			System.err.println("Errow with insertIntoRechnung(): " + e.getMessage());

		}
	}

	int countFromRechnung() {
		int count = 0;

		try {
			ResultSet rs = stmt.executeQuery("select count(*) from RECHNUNG");
			while (rs.next()) {
				count = rs.getInt("count(*)");
			}
			rs.close();
		} catch (Exception e) {
			System.err.println("Errow with countFromRechnung(): " + e.getMessage());
		}

		return count;
	}

	void insertIntoOhrring(String name, Integer bestNr) {
		try {
			String sql = "INSERT INTO OHRRING( NAME, BESTELLUNGSNUMMER) VALUES(?, ?)";
			PreparedStatement statement = con.prepareStatement(sql);
			statement.setString(1, name);
			statement.setInt(2, bestNr);
			statement.executeUpdate();
			statement.close();
		} catch (Exception e) {
			System.err.println("Error with insertIntoOhrring(); " + e.getMessage());
		}

	}

	int countFromOhrring() {
		int count = 0;

		try {
			ResultSet rs = stmt.executeQuery("select count(*) from OHRRING");
			while (rs.next()) {
				count = rs.getInt("count(*)");
			}
			rs.close();
		} catch (Exception e) {
			System.err.println("Errow with countFromOHRRING(): " + e.getMessage());
		}

		return count;
	}

	void insertIntoHalskette(String name, String groesse, Integer bestNr) {
		try {
			String sql = "INSERT INTO HALSKETTE(NAME, GROESSE, BESTELLUNGSNUMMER) VALUES( ?, ?,?)";
			PreparedStatement statement = con.prepareStatement(sql);
			statement.setString(1, name);
			statement.setString(2, groesse);
			statement.setInt(3, bestNr);
			statement.executeUpdate();
			statement.close();
		} catch (Exception e) {
			System.err.println("Error with insertIntoHalskette(): " + e.getMessage());
		}
	}

	int countFromHalskette() {
		int count = 0;

		try {
			ResultSet rs = stmt.executeQuery("select count(*) from HALSKETTE");
			while (rs.next()) {
				count = rs.getInt("count(*)");
			}
			rs.close();
		} catch (Exception e) {
			System.err.println("Errow with countFromHALSKETTE(): " + e.getMessage());
		}

		return count;
	}

	ArrayList<Integer> getOhrringProduktId() {
		ArrayList<Integer> ohrringID = new ArrayList<>();
		try {
			ResultSet rs = stmt.executeQuery("SELECT ProduktID FROM Ohrring");
			while (rs.next()) {
				ohrringID.add(rs.getInt("ProduktID"));
			}
			rs.close();
		} catch (Exception e) {
			System.err.println("Errow with getOhrrinfProduktID(): " + e.getMessage());

		}

		return ohrringID;
	}

	void insertIntoOhrringPaar(Integer p1, Integer p2) {
		try {
			String sql = "INSERT INTO OHRRING_PAAR(Ohrring_1, Ohrring_2) VALUES(?, ?)";
			PreparedStatement statement = con.prepareStatement(sql);
			statement.setInt(1, p1);
			statement.setInt(2, p2);
			statement.executeUpdate();
			statement.close();
		} catch (Exception e) {
			System.err.println("Error with insertIntoOhrringPaar(): " + e.getMessage());
		}
	}

	int countFromOhrringPaar() {
		int count = 0;

		try {
			ResultSet rs = stmt.executeQuery("select count(*) from OHRRING_PAAR");
			while (rs.next()) {
				count = rs.getInt("count(*)");
			}
			rs.close();
		} catch (Exception e) {
			System.err.println("Errow with ccountFromOhrringPaar(): " + e.getMessage());
		}

		return count;
	}

	void insertIntoDesigner(String email, String name) {
		try {
			String sql = "INSERT INTO DESIGNER(EMail, D_Name) VALUES(?,?)";
			PreparedStatement statement = con.prepareStatement(sql);
			statement.setString(1, email);
			statement.setString(2, name);
			statement.executeUpdate();
			statement.close();
		} catch (Exception e) {
			System.err.println("Error with insertIntoDesigner(): " + e.getMessage());
		}
	}

	int countFromDesigner() {
		int count = 0;

		try {
			ResultSet rs = stmt.executeQuery("select count(*) from DESIGNER");
			while (rs.next()) {
				count = rs.getInt("count(*)");
			}
			rs.close();
		} catch (Exception e) {
			System.err.println("Errow with countFromDesigner(): " + e.getMessage());
		}

		return count;
	}

	void insertIntoAssistent(String name, Integer exp) {
		try {
			String sql = "INSERT INTO ASSISTENT(A_Name, Jahre_erfahrung) VALUES (?, ?)";
			PreparedStatement statement = con.prepareStatement(sql);
			statement.setString(1, name);
			statement.setInt(2, exp);
			statement.executeUpdate();
			statement.close();
		} catch (Exception e) {
			System.err.println("error with insertIntoAssistent(): " + e.getMessage());
		}
	}

	int countFromAssistent() {
		int count = 0;

		try {
			ResultSet rs = stmt.executeQuery("select count(*) from ASSISTENT");
			while (rs.next()) {
				count = rs.getInt("count(*)");
			}
			rs.close();
		} catch (Exception e) {
			System.err.println("Errow with ccountFromAssistent(): " + e.getMessage());
		}

		return count;
	}

	ArrayList<Integer> getDesignerID() {
		ArrayList<Integer> desId = new ArrayList<>();

		try {
			ResultSet rs = stmt.executeQuery("SELECT DesignerID FROM Designer");
			while (rs.next()) {
				desId.add(rs.getInt("DesignerID"));
			}
			rs.close();
		} catch (Exception e) {
			System.err.println("Errow with getDesignerID(): " + e.getMessage());

		}

		return desId;
	}

	ArrayList<Integer> getAssistentID() {
		ArrayList<Integer> assId = new ArrayList<>();

		try {
			ResultSet rs = stmt.executeQuery("SELECT AssistentID FROM Assistent");
			while (rs.next()) {
				assId.add(rs.getInt("AssistentID"));
			}
			rs.close();
		} catch (Exception e) {
			System.err.println("Errow with getAssistentID(): " + e.getMessage());

		}

		return assId;
	}

	void insertIntoKreirenBestellung(Integer bestNr, Integer dID, Integer aID) {
		try {
			String sql = "INSERT INTO KREIRENBESTELLUNG(BestellungsNummer, DesignerID, AssistentID) VALUES(?, ? ,?)";
			PreparedStatement statement = con.prepareStatement(sql);
			statement.setInt(1, bestNr);
			statement.setInt(2, dID);
			statement.setInt(3, aID);
			statement.executeUpdate();
			statement.close();
		} catch (Exception e) {
			System.err.println("Error with insertIntoKreirenBestellung(): " + e.getMessage());
		}
	}

	int countFromKreirenBestellung() {
		int count = 0;

		try {
			ResultSet rs = stmt.executeQuery("select count(*) from KREIRENBESTELLUNG");
			while (rs.next()) {
				count = rs.getInt("count(*)");
			}
			rs.close();
		} catch (Exception e) {
			System.err.println("Errow with ccountFromKREIRENBESTELLUNG(): " + e.getMessage());
		}

		return count;
	}

	void insertIntoHabenkontakt(Integer desId, String kundeEmail) {
		try {
			String sql = "INSERT INTO HABENKONTAKT(DesignerID, Kunde_Email) VALUES(?, ?)";
			PreparedStatement statement = con.prepareStatement(sql);
			statement.setInt(1, desId);
			statement.setString(2, kundeEmail);
			statement.executeUpdate();
			statement.close();
		} catch (Exception e) {
			System.err.println("Error with insertIntoHabenKontakt(): " + e.getMessage());
		}

	}

	int countFromHabenKontakt() {
		int count = 0;

		try {
			ResultSet rs = stmt.executeQuery("select count(*) from HABENKONTAKT");
			while (rs.next()) {
				count = rs.getInt("count(*)");
			}
			rs.close();
		} catch (Exception e) {
			System.err.println("Errow with ccountFromHABENKONTAKT(): " + e.getMessage());
		}

		return count;
	}

	public void close() {
		try {
			stmt.close(); // clean up
			con.close();
		} catch (Exception ignored) {
		}
	}
}