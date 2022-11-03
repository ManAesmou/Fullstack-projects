using TMPro;
using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.SceneManagement;


public class IM_UIManageri : MonoBehaviour
{
    // Julkiset oliot.
    public static IM_UIManageri IM_instanssi;
    public GameObject IM_alkuPaneeli;
    public GameObject IM_pelinLoppuPaneeli;
    public GameObject IM_aloitusTeksti;
    public TextMeshProUGUI IM_pisteet;
    public TextMeshProUGUI IM_huippuPisteet1;
    public TextMeshProUGUI IM_huippuPisteet2;

    // Alutetaan olio.
    void Awake()
    {
        if (IM_instanssi == null)
        {
            IM_instanssi = this;
        }
    }

    // Alustetaan pelin teksti.
    void Start()
    {
        IM_huippuPisteet1.text = "Huippupisteet: " + PlayerPrefs.GetInt("IM_huippuPisteet");
    }

    // Liikutetaaan tekstien paneeli ylös ja vilkkuva teksti alas.
    public void IMPelinAlku()
    {
        IM_alkuPaneeli.GetComponent<Animator>().Play("IM_PaneeliYlos");
        IM_aloitusTeksti.GetComponent<Animator>().Play("IM_TekstiAnimaatioAlas");
    }

    // Haetaan avaimista arvot ja tuodaan lopetuspaneeli esille.
    public void IMPelinLoppu()
    {
        IM_pisteet.text = PlayerPrefs.GetInt("IM_piste").ToString();
        IM_huippuPisteet2.text = PlayerPrefs.GetInt("IM_huippuPisteet").ToString();
        IM_pelinLoppuPaneeli.SetActive(true);
    }

    // Ladataan näkymä uudelleen.
    public void IMAloitaAlusta()
    {
        SceneManager.LoadScene(0);
    }

    // Suljetaan sovellusohjelma.
    public void IMLopetaPeliKokonaan()
    {
        Application.Quit();
    }

}
