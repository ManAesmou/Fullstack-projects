using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class IM_PallonHallinta : MonoBehaviour
{
    // Luodaan oliot.
    public GameObject IM_partikkeli;
    Rigidbody rb;

    // Pallon nopeusm‰‰r‰.
    [SerializeField]
    private float IM_nopeus = 0f;

    // Pallon putoamisnopeus.
    [SerializeField]
    private float IM_putoamisnopeus;
    
    // Pelin aloitus, kun pelaaja painaa ensimm‰isen kerran hiirt‰.
    bool IM_pelinAlku;

    // Pelin lopetus, kun pallo tippuu alustalta.
    bool IM_pelinLoppu; 

     // Haetaan rigidbody ennen pelin k‰ynnistyst‰.
    void Awake()
    {
        rb = GetComponent<Rigidbody>();
    }

    // Alustetaan pelitila, kun peli k‰ynnistet‰‰n.
    void Start()
    {
        IM_pelinAlku = false; 
        IM_pelinLoppu = false;
    }

    // P‰ivitet‰‰n ruutu jokaisella kuvataajuudella.
    void Update()
    {
        if (!IM_pelinAlku)
        {
            // Jos painettu hiiren vasenta painiketta, pallo liikkuu x-suuntaan ja peli k‰ynnistyy.
            if (Input.GetMouseButtonDown(0))
            {
                rb.velocity = new Vector3(IM_nopeus, 0, 0); 
                IM_pelinAlku = true;

                IM_PeliManageri.IM_instanssi.IMAloitaPeli();
            }
        }

        // Jos pallo putoaa, pallo tuhotaan, kamera pys‰htyy ja lopetetaan peli..
        if (!Physics.Raycast(transform.position, Vector3.down, 1f))
        {
            IM_pelinLoppu = true;
            rb.velocity = new Vector3(0, -IM_putoamisnopeus, 0);
            Destroy(gameObject, 1f);

            Camera.main.GetComponent<IM_KameraSeuranta>().IM_peliLoppu = true;

            IM_PeliManageri.IM_instanssi.IMLopetaPeli();
        }

        // Jatketaan pallon liikattamista, jos hiiren vasen painike on painettu ja peli ei ole loppu.
        if (Input.GetMouseButtonDown(0) && !IM_pelinLoppu)
        {
            IMSuunnanVaihto();
        }
    }

    // Vaihdetaan suuntaa sen mukaan, mill‰ akselilla on nopeutta.
    void IMSuunnanVaihto()
    {
        if (rb.velocity.z > 0)
            rb.velocity = new Vector3(IM_nopeus, 0, 0);
        else if (rb.velocity.x > 0)
            rb.velocity = new Vector3(0, 0, IM_nopeus);
    }

    // Tuhotaan timantti, kun siihen osutaan.
    void OnTriggerEnter(Collider IM_jotain)
    {
        if (IM_jotain.gameObject.CompareTag("IM_Timantti"))
        {
            GameObject IM_osa = Instantiate(IM_partikkeli, IM_jotain.gameObject.transform.position, Quaternion.identity);
            Destroy(IM_jotain.gameObject);
            Destroy(IM_osa, 1f);
            IM_PisteManageri.IM_instanssi.IMLisaaPisteita();
        }
    }
}
