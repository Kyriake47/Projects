using System.Security.Cryptography.X509Certificates;

namespace JakiToKat
{
    public partial class Form1 : Form
    {
        //RadioButtonService draw;
        public Form1()
        {
            InitializeComponent();
          
        }

        RadioButtonService draw = new RadioButtonService();
        ImageService image= new ImageService();
      

     
        private void Form1_Load(object sender, EventArgs e)
        {
            
            draw.Draw(radioButton1,radioButton2,radioButton3);
            image.display(picture);
            draw.Answer(radioButton1, radioButton2, radioButton3,image.getName());
        }

        private void button1_Click(object sender, EventArgs e)
        {
           
            draw.Check(radioButton1, radioButton2, radioButton3, image.getName(), punkty);
            draw.Draw(radioButton1, radioButton2, radioButton3);
            image.display(picture);
            draw.Answer(radioButton1, radioButton2, radioButton3, image.getName());
            radioButton1.Checked = true;
        }

        private void label2_Click(object sender, EventArgs e)
        {

        }
    }
}