using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class IM_PisteManageri : MonoBehaviour
{
    // Luodaan julkinen olio ja muuttujat.
    public static IM_PisteManageri IM_instanssi;
    public int IM_pisteet;
    public int IM_huippuPisteet;

    // alustetaan olio.
    void Awake()
    {
        if (IM_instanssi == null)
        {
            IM_instanssi = this;
        }
            
    }

    // Alustetaan peli.
    void Start()
    {
        IM_pisteet = 0;
        PlayerPrefs.SetInt("piste", IM_pisteet);
    }

    // Lisätään piste.
    public void IMLisaaPisteita()
    {
        IM_pisteet += 1;
    }

    // Asetetaan uudet huippupisteet.
    public void IMLopetaPisteet()
    {
        PlayerPrefs.SetInt("IM_piste", IM_pisteet);

        if (PlayerPrefs.HasKey("IM_huippuPisteet"))
        {
            if (IM_pisteet > PlayerPrefs.GetInt("IM_huippuPisteet"))
            {
                PlayerPrefs.SetInt("IM_huippuPisteet", IM_pisteet);
            }
        }
        else
        {
            PlayerPrefs.SetInt("IM_huippuPisteet", IM_huippuPisteet);
        }
    }
}
