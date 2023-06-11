namespace kalkulator
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

       // int liczba1=0;
       // int liczba2=0;
        Write write=new Write();
        Clean clean = new Clean();

        private void label_Click(object sender, EventArgs e)
        {

        }

        private void button7_Click(object sender, EventArgs e)
        {
            clean.clean(write, label);
            label.Text = label.Text + "1";
            
           
        }

        private void button8_Click(object sender, EventArgs e)
        {
            clean.clean(write, label);
            label.Text = label.Text + "2";
        }

        private void button9_Click(object sender, EventArgs e)
        {
            clean.clean(write, label);
            label.Text = label.Text + "3";
        }

        private void button4_Click(object sender, EventArgs e)
        {
            clean.clean(write, label);
            label.Text = label.Text + "4";
        }

        private void button5_Click(object sender, EventArgs e)
        {
            clean.clean(write, label);
            label.Text = label.Text + "5";
        }

        private void button6_Click(object sender, EventArgs e)
        {
            clean.clean(write, label);
            label.Text = label.Text + "6";
        }

        private void button1_Click(object sender, EventArgs e)
        {
            clean.clean(write, label);
            label.Text = label.Text + "7";
        }

        private void button2_Click(object sender, EventArgs e)
        {
            clean.clean(write, label);
            label.Text = label.Text + "8";
        }

        private void button3_Click(object sender, EventArgs e)
        {
            clean.clean(write, label);
            label.Text = label.Text + "9";
        }

        private void button14_Click(object sender, EventArgs e)
        {
            clean.clean(write, label);
            label.Text = label.Text + "0";
        }

        private void button10_Click(object sender, EventArgs e)
        {
            write.dodawanie(label);
            //liczba1=Int32.Parse(label.Text);
        }

        private void button16_Click(object sender, EventArgs e)
        {
            label.Text=write.rownasie(label).ToString();
            //label.Text= ((int)(label.Text[0])).ToString();
            if ((int)label.Text[0] == 8734)
            {
                label.Text = "Nie dzielimy przez 0!";
            }
        }

        private void button11_Click(object sender, EventArgs e)
        {
            write.odejmowanie(label);
        }

        private void button13_Click(object sender, EventArgs e)
        {
            write.mnozenie(label);
        }

        private void button12_Click(object sender, EventArgs e)
        {
            write.dzielenie(label);
        }

        private void button15_Click(object sender, EventArgs e)
        {
           
           if (label.Text.Equals(""))
            {
                label.Text = "0,";
            }
            else if (label.Text.Contains(","))
            {

            }
            else { 
            label.Text = label.Text + ",";
        }
        }
    }
}