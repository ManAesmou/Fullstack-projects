public class MemberShipCustomer extends Customer {
  
  private double jasenAleProsentti = 5.0;

  //Muuttaa arvon kokonaisluvuksi.
  public int haeJasenAleProsentti() {
    int arvo = (int)jasenAleProsentti;
    return arvo;
  }

  public double haeProsentti() {
    return jasenAleProsentti;
  }

  //Konstruktori luokalle.
  MemberShipCustomer(String etunimi, String sukunimi, String sposti, String puh) {
    asetaEtunimi(etunimi);
    asetaSukunimi(sukunimi);
    asetaSposti(sposti);
    asetaPuhelinnumero(puh);
  }

}
