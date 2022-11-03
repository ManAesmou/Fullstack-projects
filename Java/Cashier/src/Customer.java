import java.text.DecimalFormat;

public class Customer {

  private String etunimi, sukunimi, puhelinnumero, sahkoposti, yTaiJ;
  private double tuoteHinta, tulos = 0, erotus = 0;

  //Laskee kokonaishinnan alennuksen kanssa.
  public String laskeKokonaisSumma(double tuote, Double ale) {
    erotus = tuote * (ale / 100);
    tulos = tuote - erotus;
    String tulosStr = muutaKahteenDesimaaliin(tulos);
    return tulosStr;
  }

  //Muuttaa kahteen desimaaliin
  public String muutaKahteenDesimaaliin(double numero) {
    DecimalFormat kaksiDesimaalia = new DecimalFormat("##.00");
    String tulosDesimaaleina = kaksiDesimaalia.format(numero);
    return tulosDesimaaleina;
  }

  //asettajat
  public void asetaEtunimi(String eNimi) {
  etunimi = eNimi;
  }
  
  public void asetaSukunimi(String sNimi) {
    sukunimi = sNimi;
  }
  
  public void asetaSposti(String sposti) {
    sahkoposti = sposti;
  }

  public void asetaPuhelinnumero (String puh) {
    puhelinnumero = puh; 
  }

  public void asetaStatus(String merkki) {
    yTaiJ = merkki;
  } 

  public void asetaTuotehinta(double tuote) {
    tuoteHinta = tuote;
  }
  

  //hakijat
  public String haeEtunimi() {
    return etunimi;
  }

  public String haeSukunimi() {
    return sukunimi;
  }

  public String haeSposti() {
    return sahkoposti;
  }

  public String haePuhelinnumero() {
    return puhelinnumero;
  }

  public String haeStatus() {
    return yTaiJ;
  }

  public double haeTuotehinta() {
    return tuoteHinta;
  }

}
