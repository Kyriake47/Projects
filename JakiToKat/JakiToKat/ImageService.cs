using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace JakiToKat
{
    internal class ImageService:values
    {

        int displayedImage;
        string name;

        Image[] image= { Image.FromFile("Image/zerowy.png"), Image.FromFile("Image/ostry.png"), 
            Image.FromFile("Image/prosty.png"), Image.FromFile("Image/rozwarty.png"), 
            Image.FromFile("Image/polpelny.png"), Image.FromFile("Image/wklesly.png"), Image.FromFile("Image/pelny.png") };

        Random rand=new Random();
        public void display(PictureBox picture)
        {
            displayedImage = rand.Next(MIN, MAX);
            switch (displayedImage)
            {
                case 0: name = "zerowy";break;
                case 1: name = "ostry"; break;
                case 2: name = "prosty"; break;
                case 3: name = "rozwarty"; break;
                case 4: name = "polpelny"; break;
                case 5: name = "wklesly"; break;
                case 6: name = "pelny"; break;
            }
            picture.BackgroundImage = image[displayedImage];
            
        }
public string getName() { return name; }
    }
}
