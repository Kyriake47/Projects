using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace kalkulator
{
    internal class Write
    {
        double liczba1 = 0;
        double liczba2 = 0;
        bool check = false; 
        typDzialania typ;
        double liczba3=0;
        double liczba4 = 0;

        

        public void dodawanie(Label label)
        {
            typ = typDzialania.dodawanie;
            liczba1 = Int32.Parse(label.Text);
            label.Text = "";
        }
        public void odejmowanie(Label label)
        {
            typ = typDzialania.odejmowanie;
            liczba1 = Int32.Parse(label.Text);
            label.Text = "";
        }

        public void mnozenie(Label label)
        {
            typ = typDzialania.mnozenie;
            liczba1 = Int32.Parse(label.Text);
            label.Text = "";
        }

        public void dzielenie(Label label)
        {
            typ = typDzialania.dzielenie;
            liczba1 = Double.Parse(label.Text);
            label.Text = "";
            
        }

        public double rownasie(Label label)
        {
            liczba2 = Double.Parse(label.Text);
            double result=0;

            if (typ == typDzialania.dodawanie)
            {
                result = liczba1 + liczba2;

                if (check == false) { 
                liczba1 = liczba2;
                check = true; 
                }
            }

            if (typ == typDzialania.odejmowanie)
            {
              
                if (check == false)
                {
                    result = liczba1 - liczba2;
                    liczba3 = result;
                    liczba4 = liczba2;
                    check = true;
                }
                else { 
                result = liczba3 - liczba4;
                liczba3 = result;
            }
               
         
        }

            if (typ == typDzialania.mnozenie)
                {
                    result = liczba1 * liczba2;

                    if (check == false)
                    {
                        liczba1 = liczba2;
                        check = true;
                    }
                }
            if (typ == typDzialania.dzielenie)
            {

             //  Console.WriteLine();
              
                
                    if (check == false)
                    {
                        result = liczba1 / liczba2;
                        liczba3 = result;
                        liczba4 = liczba2;
                        check = true;
                    
                    }
                    else
                    {
                        result = liczba3 / liczba4;
                        liczba3 = result;
                    }

                
                
            }
            return result;
        }
        ////////////////////////get set/////////////////////////
        
       
        public bool Check { get => check; set => check = value; }
    }




 
}
