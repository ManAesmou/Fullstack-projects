import java.util.Scanner;

public class mainCashier {
    public static void main(String[] args) throws Exception {
        try {
            double mikaHinta = 0, tulos = 0; 
            String yesNo, yesNo2 = "kyllä", jasenNumeroStr = "";
            int jasenNumero = 0;

            Scanner sc = new Scanner(System.in);

            //Kysytään tuotteita ja lasketaan yhteen hintamäärä.
            while (true) {
                do {
                    System.out.println("Anna ostoksen hinta: ");
                    mikaHinta = sc.nextDouble();

                    if (mikaHinta > 0) {
                        tulos += mikaHinta;
                    }

                    System.out.println("Haluatko antaa toisen ostoksen hinnan? (y/n)");
                    yesNo = sc.next();
                } while (yesNo.equals("y"));


                //Luodaan olio ja syötetään perustiedot.
                System.out.println("\nJatkaaksesi ostoksia syötä perustiedot: ");
                    
                System.out.println("\nEtunimi:");
                Customer asiakas = new Customer();
                asiakas.asetaEtunimi(sc.next());

                System.out.println("\nSukunimi:");
                asiakas.asetaSukunimi(sc.next());

                System.out.println("\nSähköpostiosoite:");
                asiakas.asetaSposti(sc.next());

                System.out.println("\nPuhelinnumero (muotoa: 045-1234567");
                asiakas.asetaPuhelinnumero(sc.next());

                System.out.println("Anna jäsennumero:");
                jasenNumero = sc.nextInt();
                jasenNumeroStr = Integer.toString(jasenNumero);

                System.out.println("Onko 1) yritys-, 2) jäsen- 3) perusasiakas? (vastaa: 1, 2 tai 3)");
                asiakas.asetaStatus(sc.next());

                asiakas.asetaTuotehinta(tulos);

                //Tarkistetaan jäsenyys.
                if (asiakas.haeStatus().equals("1")) {
                    BusinessCustomer bisnesjasen1 = new BusinessCustomer(asiakas.haeEtunimi(), asiakas.haeSukunimi(), asiakas.haeSposti(), asiakas.haePuhelinnumero());

                    String summa = bisnesjasen1.laskeKokonaisSumma(asiakas.haeTuotehinta(), bisnesjasen1.haeProsentti());

                    System.out.println("\nHenkilön " + bisnesjasen1.haeEtunimi() + " " + bisnesjasen1.haeSukunimi() +  " ostosten summa on " + bisnesjasen1.muutaKahteenDesimaaliin(asiakas.haeTuotehinta()) + " euroa. Bisnesjäsenen nro " + jasenNumeroStr + " alennusprosentti on " + bisnesjasen1.haeBisnesAleProsentti()+ ", joten kokonaishinta on " + summa + " euroa.");
                } else if (asiakas.haeStatus().equals("2")) {
                    MemberShipCustomer jasen1 = new MemberShipCustomer(asiakas.haeEtunimi(), asiakas.haeSukunimi(), asiakas.haeSposti(), asiakas.haePuhelinnumero());
                    String summa = jasen1.laskeKokonaisSumma(asiakas.haeTuotehinta(), jasen1.haeProsentti());

                    System.out.println("\nHenkilön " + jasen1.haeEtunimi() + " " + jasen1.haeSukunimi() + " ostosten summa on " + jasen1.muutaKahteenDesimaaliin(asiakas.haeTuotehinta()) + " euroa. Bisnesjäsenen nro " + jasenNumeroStr + " alennusprosentti on " + jasen1.haeJasenAleProsentti()+ ", joten kokonaishinta on " + summa + " euroa.");
                } else {
                    System.out.println("\nEi jäsenyyttä, joten henkilön " + asiakas.haeEtunimi() + " " + asiakas.haeSukunimi() + " konaishinta on " + asiakas.haeTuotehinta() + " euroa.");
                }

                //Kysytään, haluaako jatkaa ostoksia.
                System.out.println("\nHaluatko tehdä uuden ostoksen? (kyllä tai ei)");

                yesNo2 = sc.next();

                //Nollataan ostokset.
                mikaHinta = 0;
                tulos = 0;
                asiakas.asetaTuotehinta(mikaHinta);

                //Jos vastaa ei, sulje ohjelma.
                if (yesNo2.equals("ei")){
                    System.out.println("\nKassa suljettu.\n");
                    break;
                }
            }
            sc.close();
        } catch (Exception e) {
            System.out.println("Tuli virhe.");
        }
        
    }
}
