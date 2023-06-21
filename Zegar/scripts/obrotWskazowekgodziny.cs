using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class obrotWskazowekgodziny : MonoBehaviour {

    
    public GameObject wskgodz;
    public float los;

    // Use this for initialization
    void Start () {
        
	}

    // Update is called once per frame
    private void Reset()
    {
        transform.rotation = Quaternion.Euler(0, 0, 0);
    }
    void Update () {
		if (Input.GetKeyDown(KeyCode.W))
        {
            
            Reset();
            los = Random.Range(1, 12);
            int losowaniedlagodzin = Random.Range(1, 12);
            transform.Rotate(new Vector3(0, 0, -(30/12 * los)));
            transform.Rotate(new Vector3(0, 0, -(losowaniedlagodzin * 30)));


            //Debug.Log("(godziny) wylosowana liczba dla minut(skrypt godziny): " + los);
            //Debug.Log("(godziny) pierwsze przesunięcie:" + 30 / 12 * los);
            //Debug.Log("(godziny) drugie losowanie i przesunięcie godzin: " + losowaniedlagodzin *30);
            
        }

        if (Input.GetKeyDown(KeyCode.LeftAlt))
        {
            Reset();
            los = Random.Range(1, 60);
            transform.Rotate(new Vector3(0, 0, (int)-((6.0f / 12.0f) * (float)los)));

            int losowaniedlagodzin = Random.Range(1, 12);
            transform.Rotate(new Vector3(0, 0, -(losowaniedlagodzin * 30)));

            //Debug.Log("(godziny) wylosowana liczba dla minut(skrypt godziny): " + los);
            //Debug.Log("(godziny) pierwsze przesunięcie:" + (float)6/12 * los);
            //Debug.Log("(godziny) drugie losowanie i przesunięcie godzin: " + losowaniedlagodzin * 30);
        }

    }
   
}
