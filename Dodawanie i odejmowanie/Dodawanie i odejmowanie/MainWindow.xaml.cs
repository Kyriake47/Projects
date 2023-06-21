using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;

namespace Dodawanie_i_odejmowanie
{
    /// <summary>
    /// Logika interakcji dla klasy MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public MainWindow()
        {
            InitializeComponent();

          

        }

        int pierwsza = 2;
        int druga = 1;
        string tmp = "0";
        int wybor = 0;
        int min = 1;
        int max = 10;
        
        

        public void Losuj_Click(object sender, RoutedEventArgs e)
        {
            czyDobrze.Content = " ";
            czyDobrze2.Content = "";
            Rozwiazanie.Text = "";
            Random rand = new Random();
            pierwsza = rand.Next(min, max);
                    
            druga = rand.Next(min,max);

            if (wybor == 3 || wybor == 4)
            {
                while (pierwsza<druga)
                {
                    pierwsza = rand.Next(min, max);

                    druga = rand.Next(min, max);
                }
            }

            tmp = Rozwiazanie.Text;
            pierwszaLiczba.Content = pierwsza;
            drugaLiczba.Content = druga;
            
        }

        //Przycisk przenoszący z menu do Menu
        private void przyciskMenu_Click(object sender, RoutedEventArgs e)
        {
            DodawanieBardzoŁatwe.Visibility = Visibility.Hidden;
            Menu.Visibility = Visibility.Visible;

            if (Menu.Visibility == Visibility.Visible)
            {
                przyciskMenu.Visibility = Visibility.Hidden;
            }
        }

        public void Sprawdzacz(int pierwsza, int druga, string tmp)
        {
            int wynik=0;
            if (wybor == 1 || wybor == 2)
            {
                wynik = (pierwsza + druga);
            }
            else if (wybor==3 || wybor == 4)
            {
                wynik = pierwsza - druga;
            }
        string odpowiedz = wynik.ToString();
            //MessageBox.Show("Funkcja Sprawdzacz się wykonuje");
            if (Equals(Rozwiazanie.Text, odpowiedz))
            {
                //MessageBox.Show("Brawo");
                czyDobrze2.Content = "";
                czyDobrze.Content = "Dobrze! :)";
            }
            else
            {
                czyDobrze.Content = "";
                czyDobrze2.Content = "Spróbuj jeszcze raz";
            }
        }

        public void Sprawdz_Click(object sender, RoutedEventArgs e)
        {
            Sprawdzacz(pierwsza, druga, tmp);
        }

        
        

       

      void pokaz()
        {
           // if (wybor == 1)
            {
                DodawanieBardzoŁatwe.Visibility = Visibility.Visible;
                Menu.Visibility = Visibility.Hidden;
                przyciskMenu.Visibility = Visibility.Visible;

                if(wybor == 1)
                {

                    znak.Content = "+";
                }
                else if(wybor == 2){
                    znak.Content = "+";
                }
                else if (wybor == 3)
                {
                    znak.Content = "-";
                }
                else if (wybor == 4)
                {
                    znak.Content = "-";
                }
            }
            czyDobrze.Content = " ";
            czyDobrze2.Content = "";
            Rozwiazanie.Text = "";
            pierwszaLiczba.Content = 2;
            drugaLiczba.Content = 1;
            pierwsza = 2;
            druga = 1;

        }

       

        void menuDodawanieBardzoŁatwe_Click(object sender, RoutedEventArgs e)
        {


            wybor = 1;
            min = 1;
            max = 10;
            pokaz();
        }

        private void menuDodawanieŁatwe1_Click(object sender, RoutedEventArgs e)
        {
            
            wybor = 2 ;
            min = 1;
            max = 50;
            pokaz();
        }

        private void menuOdejmowanieBardzoŁatwe1_Click(object sender, RoutedEventArgs e)
        {
            
            wybor = 3;
            min = 1;
            max = 10;
            pokaz();
        }

        private void menuOdejmowanieŁatwe1_Click(object sender, RoutedEventArgs e)
        {
            
            wybor = 4;
            min = 1;
            max = 50;
            pokaz();
        }




    }
   
}
