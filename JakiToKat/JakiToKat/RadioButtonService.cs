using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Http.Headers;
using System.Text;
using System.Threading.Tasks;
using static System.Windows.Forms.VisualStyles.VisualStyleElement.Rebar;

namespace JakiToKat
{
    internal class RadioButtonService:values
    {
        int points = 0;
        
        string[] angleType = { "zerowy","ostry","prosty","rozwarty","polpelny","wklesly","pelny"};
    ImageService image=new ImageService();

       

        public void Draw(RadioButton radioButton1, RadioButton radioButton2, RadioButton radioButton3)
        {
            int draw=0;
            Random rand = new Random();
            List<int> listDraw= new List<int>();
            for (int i = 0; i < 3; i++)
            {
                
                do { draw = rand.Next(MIN, MAX); } while (
                    listDraw.Contains(draw)
                );
                listDraw.Add(draw);
                
                switch (i)
                {
                    case 0:
                        {
                            radioButton1.Text = angleType[draw];
                            
                            break;
                        }
                    case 1:
                        {
                            radioButton2.Text = angleType[draw];
                            
                            break;
                        }
                    case 2:
                        {
                            radioButton3.Text = angleType[draw];
                         
                            break;
                        }
                        
                }
            }
            
        }
        public void Answer(RadioButton radioButton1, RadioButton radioButton2, RadioButton radioButton3, string name)
        {
            Random rand = new Random();
            int answer = rand.Next(1, 4);
            if (radioButton1.Text != name && radioButton2.Text != name && radioButton3.Text != name) { 
            switch (answer)
            {
                case 1: radioButton1.Text = name; break;
                case 2: radioButton2.Text = name; break;
                case 3: radioButton2.Text = name; break;
            }
        }
        }

        public void Check(RadioButton radioButton1, RadioButton radioButton2, RadioButton radioButton3, string name, Label punkty)
        {
            if (radioButton1.Checked == true)
            {
                if (radioButton1.Text == name)
                {
                    points = points + 1;

                }
                else { points = points - 1; }

            }
            else if (radioButton2.Checked == true)
            {
                if (radioButton2.Text == name)
                {
                    points = points + 1;
                }
                else { points = points - 1; }
            }
            else if (radioButton3.Checked == true)
            {
                if (radioButton3.Text == name)
                {
                    points = points + 1;
                }
                else { points = points - 1; }
            }
            punkty.Text = points.ToString();
        }
    }
}
