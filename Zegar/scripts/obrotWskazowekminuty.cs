using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class obrotWskazowekminuty : MonoBehaviour {


	// Use this for initialization
	void Start () {
       
	}

    public GameObject wskgodz;
    
    private void Reset()
    {
        transform.rotation = Quaternion.Euler(0, 0, 0);
    }
    // Update is called once per frame
    void Update () {
		if (Input.GetKeyDown(KeyCode.W))
        {
            Reset();
            float los = wskgodz.GetComponent<obrotWskazowekgodziny>().los;
            //Debug.Log("(minuty) wylosowana liczba dla minut(skrypt minuty): " + los);
            transform.Rotate(new Vector3(0, 0, - (360/12 * los)));
            //Debug.Log("(minuty) przesunęło wskazówkę minutową o " + 360 / 12 * los + "stopni");

            
        }

        if (Input.GetKeyDown(KeyCode.LeftAlt))
        {
            Reset();
            float los = wskgodz.GetComponent<obrotWskazowekgodziny>().los;
            //Debug.Log("(minuty) wylosowana liczba dla minut(skrypt minuty): " + los);
            transform.Rotate(new Vector3(0, 0, -(360/60 * los)));
            //Debug.Log("(minuty) przesunęło wskazówkę minutową o " + 360 / 12 * los + "stopni");

        }
	}

}
