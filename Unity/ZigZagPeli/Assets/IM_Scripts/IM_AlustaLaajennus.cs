using UnityEngine;

public class IM_AlustaLaajennus : MonoBehaviour
{
    // Julkiset oliot.
    public GameObject IM_alusta;
    public GameObject IM_timantti;

    // Edellisen alustan sijainti.
    Vector3 IM_edellinenSijainti;

    // Alustan koko
    float IM_kokoluokka;

    // Alustetaan, kun peli käynnistyy.
    void Start()
    {
        IM_edellinenSijainti = IM_alusta.transform.position;
        IM_kokoluokka = IM_alusta.transform.localScale.x;

        for (int i = 0; i < 10; i++)
        IMAlustaSiirtymat();
    }

    // Päiviteen kuvaa jokaista kuvaruutua kohden.
    void Update()
    {
        // Jos peli loppu, lopetetaan alustojen tekeminen.
        if (IM_PeliManageri.IM_instanssi.IM_peliLoppu)
        {
            CancelInvoke("IMAlustaSiirtymat");
        }
    }

    // Luodaan uutta alustaa x-akselille.
    void IMSiirtymaX()
    {
        Vector3 IM_paikka = IM_edellinenSijainti;
        IM_paikka.x += IM_kokoluokka;
        IM_edellinenSijainti = IM_paikka;
        Instantiate(IM_alusta, IM_paikka, Quaternion.identity);
        
        // Luodaan timantti satunnaisesti x-akselin alustalle.
        int IM_satunnainenluku = Random.Range(0, 4);
        if (IM_satunnainenluku < 1)
        {
            Instantiate(IM_timantti, new Vector3(IM_paikka.x, IM_paikka.y + 1f, IM_paikka.z), IM_timantti.transform.rotation);
        }
    }

    // Luodaan uutta alustaa z-akselille.
    void IMSiirtymaZ()
    {
        Vector3 IM_paikka = IM_edellinenSijainti;
        IM_paikka.z += IM_kokoluokka;
        IM_edellinenSijainti = IM_paikka;
        Instantiate(IM_alusta, IM_paikka, Quaternion.identity);

        // Luodaan timantti satunnaisesti z-akselin alustalle.
        int IM_satunnainenluku = Random.Range(0, 4);
        if (IM_satunnainenluku < 1)
        {
            Instantiate(IM_timantti, new Vector3(IM_paikka.x, IM_paikka.y + 1f, IM_paikka.z), IM_timantti.transform.rotation);
        }
    }

    // Luoo alustoja loputtomasti. 
    public void IMAloitaAlustojenKopiointi()
    {
        InvokeRepeating("IMAlustaSiirtymat", 2f, 0.2f);
    }

    //  Luodaan satunnaisesti uutta alustaa pallolle.
    void IMAlustaSiirtymat()
    {

        int IM_satunnainenluku = Random.Range(0, 6);
        if (IM_satunnainenluku < 3)
        {
            IMSiirtymaX();
        }
        else if (IM_satunnainenluku >= 3)
        {
            IMSiirtymaZ();
        }
    }
}

