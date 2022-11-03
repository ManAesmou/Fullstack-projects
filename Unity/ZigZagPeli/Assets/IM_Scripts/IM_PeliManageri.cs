using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class IM_PeliManageri : MonoBehaviour
{
    // Luodaan julkinen olio ja muuttuja.
    public static IM_PeliManageri IM_instanssi;
    public bool IM_peliLoppu;

    // Alustetaan olio.
    void Awake()
    {
        if (IM_instanssi == null)
        {
            IM_instanssi = this;
        }
    }

    // Alustetaan pelitila.
    void Start()
    {
        IM_peliLoppu = false;
    }

    // Aloitetaan peli liikuttamalla tekstejä ja aloitetaan alustojen asennus.
    public void IMAloitaPeli()
    {
        IM_UIManageri.IM_instanssi.IMPelinAlku();
        GameObject.Find("IM_Laajentaja").GetComponent<IM_AlustaLaajennus>().IMAloitaAlustojenKopiointi();
    }

    // Lopetetaan peli liikuttamalla tekstejä ja asettamalla pistearvot.
    public void IMLopetaPeli()
    {
        IM_UIManageri.IM_instanssi.IMPelinLoppu();
        IM_PisteManageri.IM_instanssi.IMLopetaPisteet();
        IM_peliLoppu = true;
    }
}
