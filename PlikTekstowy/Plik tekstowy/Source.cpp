#include<iostream>
#include<fstream>
#include<string>
#include <iomanip>
#include<algorithm>

// Program przepisuje wartoœci z pliku txt do tablicy, grupuj¹c je, wykrywaj¹c brakuj¹ce wartoœci

using namespace std;
int i =1;//numer wiersza
void Read(string table[][3]);
int AddToTable(string table[][3], string a, string b, int *i, int j, int k);

int main() {
    string table[10][3];
	
	table[0][0] = "Miasto";
	table[0][1] = "Imie";
	table[0][2] = "Nazwisko";
	
	Read(table);
	cout << "Wypisane z tablicy" << endl;
	cout << endl;
	cout << table[0][0] << endl;
	cout << table[1][0] << endl;
	cout << table[0][1] << endl;
	cout << table[1][1] << endl;
	cout << table[0][2] << endl;
	cout << table[1][2] << endl;
	cout <<"-------------"<< endl;
	cout << table[0][0] << endl;
	cout << table[2][0] << endl;
	cout << table[0][1] << endl;
	cout << table[2][1] << endl;
	cout << table[0][2] << endl;
	cout << table[2][2] << endl;
	cout << "-------------" << endl;
	cout << table[0][2] << endl;
	cout << table[3][2] << endl;

	return 0;
}

int AddToTable(string table[][3], string a, string b, int &i, int j, int k) {
	if (a == "Miasto") {
		j = 1;
		if (k < j) {		
			table[i][0] = b;		
		}
		else {
			i++;
			table[i][0] = b;		
		}
	}
	if (a == "Imie") {
		j = 2;
		if (k < j) {
			table[i][1] = b;			
		}
		else {
			i++;
			table[i][1] = b;			
		}
	}
	if (a == "Nazwisko") {
		j = 3;
		if (k < j) {
			table[i][2] = b;			
		}
		else {
			i++;
			table[i][2] = b;			
		}
	}
	
	return j;

}
void Read(string table[][3]) {

	string wyraz1;
	string wyraz2;
	int j = 0;//numer kolumny
	int k = 0;//przepisanie j do porównania
	fstream plik;
	fstream plik2;
//-------------------------------------------------------------------	
//dodawanie spacji na koniec ka¿dej linii
	plik.open("tabela.txt", ios::in);
	plik2.open("tabela2.txt",ios::out);

	string linia_tekstu;
	string b = "";
	while (getline(plik, linia_tekstu))
	{
		plik2 <<b<< linia_tekstu << ' ';
		b = "\n";
	}
	plik.close();
	plik2.close();
//---------------------------------------------------------------
//przepisywaniedanych do tablicy
	plik.open("tabela2.txt", ios::in);
	
	while (!plik.eof()) {

		getline(plik, wyraz1, '=');
		
			getline(plik, wyraz2, ' ');

			while (wyraz1.find_first_of('\n') != -1) {
				wyraz1.replace(wyraz1.find_first_of('\n'), 1, "");
			}
			
		k=AddToTable(table, wyraz1, wyraz2, i, j, k);
		j = k;
	}
	
	plik.close();
	remove("tabela2.txt");
}
