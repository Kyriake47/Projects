#include<iostream>
#include<fstream>
#include<string>
#include <iomanip>

// Program przepisuje warto�ci z pliku txt do tablicy, grupuj�c je, wykrywaj�c brakuj�ce warto�ci

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
	cout << table[0][0] << endl;
	cout << table[1][0] << endl;
	cout << table[0][1] << endl;
	cout << table[1][1] << endl;
	cout << table[0][2] << endl;
	cout << table[1][2] << endl;
	
	cout << table[0][0] << endl;
	cout << table[2][0] << endl;
	cout << table[0][1] << endl;
	cout << table[2][1] << endl;
	cout << table[0][2] << endl;
	cout << table[2][2] << endl;

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
	
	int k = 0;//przepisanie j do por�wnania
	fstream plik;
	plik.open("tabela.txt", ios::in|ios::out);
	cout << "Plik otwiera sie" << endl;

//string linia_tekstu;
//int dlugosc;
//	while (!plik.eof()) {
		
//		getline(plik, linia_tekstu);
		//dlugosc = linia_tekstu.length();
		//linia_tekstu += " ";
//		std::cout <<":" << linia_tekstu << "\n";
		//linia_tekstu.insert(dlugosc, " ");
//		plik << linia_tekstu;
//	}
	

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

}
