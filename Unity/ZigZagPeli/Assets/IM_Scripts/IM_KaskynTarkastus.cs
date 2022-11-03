using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class IM_KaskynTarkastus : MonoBehaviour
{
    // Kun pallo osuu käskyntarkastus kohtaan, pudotetaan viiveellä alusta 
    void OnTriggerExit(Collider col)
    {
        if (col.gameObject.CompareTag("Player"))
        {
            Invoke("IMPudottaminen", 0.5f);
        }
    }

    // Pudotus-fuktio pudottaa alustan ja tuhoaa sen.
    void IMPudottaminen()
    {
        GetComponentInParent<Rigidbody>().useGravity = true;
        GetComponentInParent<Rigidbody>().isKinematic = false;
        Destroy(transform.parent.gameObject, 2f);
    }
}
