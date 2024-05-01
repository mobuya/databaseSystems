<?php
class DatabaseHelper 
{
    const username = 'a12044041';
    const password = 'dbs23';
    const con_string = '//oracle19.cs.univie.ac.at:1521/orclcdb';
    
    protected $conn;

    public function __construct()
    {
        try {
            // Create connection with the command oci_connect(String(username), String(password), String(connection_string))
            $this->conn = oci_connect(
                DatabaseHelper::username,
                DatabaseHelper::password,
                DatabaseHelper::con_string
            );
   
            //check if the connection object is != null
            if (!$this->conn) {
                // die(String(message)): stop PHP script and output message:
                die("DB error: Connection can't be established!");
            }
   
        } catch (Exception $e) {
            die("DB error: {$e->getMessage()}");
        } 
    }
    public function __destruct()
    {
        // clean up
        oci_close($this->conn);
    }

    public function selectAllDesigners($designerid, $email, $d_name){
        $sql = "SELECT * FROM DESIGNER WHERE designerid like '%{$designerid}%'
        AND email like '%{$email}%'
        and upper(d_name) like upper('%{$d_name}%')";

        $statement = oci_parse($this->conn, $sql);
        oci_execute($statement);

        oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $res;
    }

    public function getDesignerInfo($designerid){
        $sql = "SELECT * FROM DESIGNER where DesignerID = :designerid";
        $statement = oci_parse($this->conn, $sql);
        oci_bind_by_name($statement, ":designerid", $designerid);
        oci_execute($statement);
        $designer = oci_fetch_assoc($statement);
        oci_free_statement($statement);
        return $designer;
    }

    public function checkKunde($kundeEmail){
        $sql = "SELECT COUNT(*) FROM KUNDE WHERE EMAIL = :kundeEmail";
        $statement = oci_parse($this->conn, $sql);
        oci_bind_by_name($statement, ":kundeEmail", $kundeEmail);
        oci_execute($statement);

        $row = oci_fetch_row($statement);
        oci_free_statement($statement);
        $count = $row[0];
        return($count > 0);
    }

    public function insertIntoHabenKontakt($designerid, $kundeEmail){
        $sql = 'INSERT INTO HABENKONTAKT (DESIGNERID, KUNDE_EMAIL) VALUES (:designerid, :kundeEmail)';
        $statement = oci_parse($this->conn, $sql);
        oci_bind_by_name($statement, ':designerid', $designerid);
        oci_bind_by_name($statement, ':kundeEmail', $kundeEmail);
        $success = oci_execute($statement)  && oci_commit($this->conn);
    
        oci_free_statement($statement);
        return $success;
    }
    
    public function insertIntoKunde($email, $vorname,  $nachname){
        $sql = "INSERT INTO KUNDE (EMAIL, VORNAME, NACHNAME) VALUES (:email, :vorname, :nachname)";
        $statement = oci_parse($this->conn, $sql);
        oci_bind_by_name($statement, ':email', $email);
        oci_bind_by_name($statement, ':vorname', $vorname);
        oci_bind_by_name($statement, ':nachname', $nachname);
        $success = oci_execute($statement);
        oci_commit($this->conn);
        
        oci_free_statement($statement);
        return $success;
    }
    public function getKundeInfo($kundeEmail){
        $sql = "SELECT * FROM KUNDE where EMAIL= :kundeEmail";
        $statement = oci_parse($this->conn, $sql);
        oci_bind_by_name($statement, ":kundeEmail", $kundeEmail);
        oci_execute($statement);
        $kunde = oci_fetch_assoc($statement);
        oci_free_statement($statement);
        return $kunde;
    }

    public function deleteKunde($email){
        $sql = 'DELETE FROM KUNDE WHERE EMAIL=:email';
        $statement = oci_parse($this->conn, $sql);
        oci_bind_by_name($statement, ':email', $email);
        $success = oci_execute($statement);
        oci_commit($this->conn);
        oci_free_statement($statement);
        return $success;
    }

    public function updateKundeVorname($email, $vorname) {
        $sql = 'UPDATE kunde Set Vorname = :vorname WHERE email = :email';
        $statement = oci_parse($this->conn, $sql);
        oci_bind_by_name($statement, ':vorname', $vorname);
        oci_bind_by_name($statement, ':email', $email);
        $success = oci_execute($statement);
        oci_commit($this->conn);
        oci_free_statement($statement);
        return $success;
    }

    public function updateKundeNachname($email, $nachname) {
        $sql = 'UPDATE kunde Set Nachname = :nachname WHERE email = :email';
        $statement = oci_parse($this->conn, $sql);
        oci_bind_by_name($statement, ':nachname', $nachname);
        oci_bind_by_name($statement, ':email', $email);
        $success = oci_execute($statement);
        oci_commit($this->conn);
        oci_free_statement($statement);
        return $success;
    }

    public function selectKundeBestellung($kundeEmail){
        $sql = 'select * from bestellung where kunde_email = :kundeEmail';
        $statement = oci_parse($this->conn, $sql);
        oci_bind_by_name($statement, ':kundeEmail', $kundeEmail);
        oci_execute($statement);
        oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $res;
    }

    public function showBestellungOhrring($bestellungNr){
        $sql = 'select * from ohrring where bestellungsNummer = :bestellungNr';
        $statement = oci_parse($this->conn, $sql);
        oci_bind_by_name($statement, ':bestellungNr', $bestellungNr);
        oci_execute($statement);
        oci_fetch_all($statement, $res, null, null,  OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $res;
    }

    public function showBestellungHalskette($bestellungNr){
        $sql = 'select * from halskette where bestellungsNummer = :bestellungNr';
        $statement = oci_parse($this->conn, $sql);
        oci_bind_by_name($statement, ':bestellungNr', $bestellungNr);
        oci_execute($statement);
        oci_fetch_all($statement, $res, null, null,  OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $res;
    }
    public function deleteOhrring($produktID){
        $sql ='delete from ohrring where ProduktID = :produktID';
        $statement = oci_parse($this->conn, $sql);
        oci_bind_by_name($statement, ':produktID', $produktID);
        $success = oci_execute($statement);
        oci_commit($this->conn);
        oci_free_statement($statement);
        return $success;
    }

    public function deleteHalskette($produktID){
        $sql ='delete from Halskette where ProduktID = :produktID';
        $statement = oci_parse($this->conn, $sql);
        oci_bind_by_name($statement, ':produktID', $produktID);
        $success = oci_execute($statement);
        oci_commit($this->conn);
        oci_free_statement($statement);
        return $success;
    }

    public function deleteBestellung($bestellungsNr){
        $sql = 'delete from bestellung where bestellungsnummer =:bestellungsNr';
        $statement = oci_parse($this->conn, $sql);
        oci_bind_by_name($statement, ':bestellungsNr', $bestellungsNr);
        $succes = oci_execute($statement);
        oci_commit($this->conn);
        oci_free_statement($statement);
        return $succes;
    }

   public function insertIntoBestellung($email){
        $sql = 'insert into bestellung(Kunde_email) values(:email) returning Bestellungsnummer into :bestellungsNr';
        $statement = oci_parse($this->conn, $sql);
        oci_bind_by_name($statement, ':email', $email);
        oci_bind_by_name($statement, ':bestellungsNr', $bestellungsNr, 25);
        oci_execute($statement);
        oci_commit($this->conn);

        oci_free_statement($statement);
        return $bestellungsNr;

    }

    public function getBestellungInfo($bestellungsNr){
        $sql = "SELECT * FROM Bestellung where Bestellungsnummer= :bestellungsNr";
        $statement = oci_parse($this->conn, $sql);
        oci_bind_by_name($statement, ":bestellungsNr", $bestellungsNr);
        oci_execute($statement);
        $bestellung = oci_fetch_assoc($statement);
        oci_free_statement($statement);
        return $bestellung;
    }
    
    public function selectAllAssistents(){
        $sql = 'SELECT * FROM ASSISTENT';
        $statement = oci_parse($this->conn, $sql);
        oci_execute($statement);
        oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $res;
    }


    public function getAssistentInfo($assistentID){
        $sql = "SELECT * FROM ASSISTENT where AssistentID = :assistentID";
        $statement = oci_parse($this->conn, $sql);
        oci_bind_by_name($statement, ":assistentID", $assistentID);
        oci_execute($statement);
        $assistent = oci_fetch_assoc($statement);
        oci_free_statement($statement);
        return $assistent;
    }

    public function insertIntoKreirenBestellung($bestNr, $designerID, $assistentID){
        $sql = 'insert into KreirenBestellung(BestellungsNummer, DesignerID, AssistentID) values(:bestNr, :designerID, :assistentID)';
        $statement = oci_parse($this->conn, $sql);
        oci_bind_by_name($statement, ':bestNr', $bestNr);
        oci_bind_by_name($statement, ':designerID', $designerID);
        oci_bind_by_name($statement, ':assistentID', $assistentID);
        $success = oci_execute($statement);
       oci_commit($this->conn);
        
        oci_free_statement($statement);
        return $success;
    }


    //function to delete Preis 0!!

    public function insertIntoOhrring($name, $bestellungNr){
        $sql = 'insert into OHRRING(Name, BestellungsNummer) values(:name, :bestellungNr)';
        $statement = oci_parse($this->conn, $sql);
        oci_bind_by_name($statement, ':name', $name);
        oci_bind_by_name($statement, ':bestellungNr', $bestellungNr);
        $success = oci_execute($statement);
        oci_commit($this->conn);

        oci_free_statement($statement);
        return $success;
    }

    public function insertIntoHalskette($name, $groesse = null, $bestellungNr){
        $sql = 'insert into HALSKETTE(Name, Groesse, BestellungsNummer) values(:name, :groesse, :bestellungNr)';
        $statement = oci_parse($this->conn, $sql);
        oci_bind_by_name($statement, ':name', $name);
        oci_bind_by_name($statement, ':groesse', $groesse);
        oci_bind_by_name($statement, ':bestellungNr', $bestellungNr);
        $success = oci_execute($statement);
        oci_commit($this->conn);

        oci_free_statement($statement);
        return $success;
    }

  public function createRechnungProcedure($bestellungsNr, $zahlungsart){
    $rechnungsNummer =null;
    $sql = 'BEGIN ErstelleRechnung(:bestellungsNr, :zahlungsart, :rechnungsNummer); END;';
    $statement = oci_parse($this->conn, $sql);
    oci_bind_by_name($statement, ':bestellungsNr', $bestellungsNr);
    oci_bind_by_name($statement, ':zahlungsart', $zahlungsart);
    oci_bind_by_name($statement, ':rechnungsNummer', $rechnungsNummer, 15);
    oci_execute($statement);

    oci_commit($this->conn);
    oci_free_statement($statement);

    return $rechnungsNummer;

  }

  public function updateBestellung($bestellungNr){
    $sql = 'update Bestellung set Gesamtpreis = Gesamtpreis * 0.75 where Bestellungsnummer = :bestellungNr';
    $statement = oci_parse($this->conn, $sql);
    oci_bind_by_name($statement, ':bestellungNr', $bestellungNr);
    $success = oci_execute($statement);
    oci_commit($this->conn);
    
    oci_free_statement($statement);
    return $success;
}

    public function cancelBestellung(){
        $sql = 'delete from bestellung where gesamtpreis = 0';
        $statement = oci_parse($this->conn, $sql);
        $success = oci_execute($statement);
        oci_commit($this->conn);

        oci_free_statement($statement);
        return $success;
    }

    public function getOhrring($produktID){
        $sql = 'select * from ohrring where ProduktID = :produktID';
        $statement = oci_parse($this->conn, $sql);
        oci_bind_by_name($statement, ':produktID', $produktID);
        oci_execute($statement);
        $ohrring = oci_fetch_assoc($statement);
        oci_free_statement($statement);

        return $ohrring;
    }

    public function getHalskette($produktID){
        $sql = 'select * from Halskette where ProduktID = :produktID';
        $statement = oci_parse($this->conn, $sql);
        oci_bind_by_name($statement, ':produktID', $produktID);
        oci_execute($statement);
        $halskette = oci_fetch_assoc($statement);
        oci_free_statement($statement);

        return $halskette;
    }

    public function reduceBestellungPreis($bestellungNr, $preis){
        $preis = $preis * 0.75;
        $sql = 'update bestellung set Gesamtpreis = Gesamtpreis - :preis where Bestellungsnummer = :bestellungNr';
        $statement = oci_parse($this->conn, $sql);
        oci_bind_by_name($statement, ':preis', $preis);
        oci_bind_by_name($statement, ':bestellungNr', $bestellungNr);
        $success = oci_execute($statement);
        oci_commit($this->conn);

        oci_free_statement($statement);
        return $success;
    }

    public function insertOhrringPaar($pid1, $pid2) {
        $sql = 'insert into ohrring_paar(ohrring_1, ohrring_2) values(:pid1, :pid2)';
        $statement = oci_parse($this->conn, $sql);
        oci_bind_by_name($statement, ':pid1', $pid1);
        oci_bind_by_name($statement, ':pid2', $pid2);
        $success = oci_execute($statement);
        oci_commit($this->conn);

        oci_free_statement($statement);
        return $success;
    }
        
    public function showView(){
        $sql = 'select * from MitarbeitDaten';
        $statement = oci_parse($this->conn, $sql);
        oci_execute($statement);

        $result = [];
        while($row = oci_fetch_assoc($statement)){
            $result[] = $row;
        }

        oci_free_statement($statement);
        return $result;
    }

    public function readAllOhhringe(){
        $sql = 'SELECT * FROM OHRRING';
        $statement = oci_parse($this->conn, $sql);
        oci_execute($statement);
        oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $res;
    }

    public function readAllHalsketten(){
        $sql = 'SELECT * FROM HALSKETTE';
        $statement = oci_parse($this->conn, $sql);
        oci_execute($statement);
        oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        oci_free_statement($statement);
        return $res;
    }

}