public class BusinessCustomer extends Customer {
  private double bisnesAleProsentti = 10.0;

  //Muuttaa arvon kokonaisluvuksi.
  public int haeBisnesAleProsentti() {
    int arvo = (int)bisnesAleProsentti;
    return arvo;
  }

  public double haeProsentti() {
    return bisnesAleProsentti;
  }

  //Konstruktori luokalle.
  BusinessCustomer(String etunimi, String sukunimi, String sposti, String puh) {
    asetaEtunimi(etunimi);
    asetaSukunimi(sukunimi);
    asetaSposti(sposti);
    asetaPuhelinnumero(puh);
  }
}
