using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class przyciskkwadrans : MonoBehaviour
{

   

      public GameObject tarczaZegaraZMinutamiKwadranse;
      bool czywl = true;


      public void OnPointerDown()
      {
          tarczaZegaraZMinutamiKwadranse.SetActive(czywl);
          czywl = !czywl;
      }

     
}
