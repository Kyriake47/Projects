#include<iostream>
#include<fstream>
#include<string>

using namespace std;
int i = 1;//numer wiersza
void Read(string table[][3]);
int AddToTable(string table[][3], string a, string b, int i, int j, int k);

int main() {
    string table[10][3];
	//string** wsk = &table[0];
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
	return 0;
}

int AddToTable(string table[][3], string a, string b, int i, int j, int k) {
	if (a == "Miasto") {
		j = 1;
		if (k <= j) {		
			table[i][0] = b;
			cout << "i=" << i << endl;
			//cout << table[*i][0] << endl;
		}
		else {
			i++;
			table[i][0] = b;
			cout << table[i][0] << endl;
			//cout << "i=" << *i << endl;
		}
	}
	if (a == "Imie") {
		j = 2;
		if (k <= j) {
			table[i][1] = b;
			cout << "i=" << i << endl;
			//cout << table[*i][0] << endl;
		}
		else {
			i++;
			table[i][1] = b;
			cout << table[i][0] << endl;
			//cout << "i=" << *i << endl;
		}
	}
	if (a == "Nazwisko") {
		j = 3;
		if (k <= j) {
			table[i][2] = b;
			cout << "i=" << i << endl;
			//cout << table[*i][0] << endl;
		}
		else {
			i++;
			table[i][2] = b;
			cout << table[i][0] << endl;
			//cout << "i=" << *i << endl;
		}
	}
	//funkcja int wiec przypisanie wartosci wskaznika, i zapisanie go pod k, j jest wskaznikiem wiec zmienia siê ca³y czas
	return j;

}
void Read(string table[][3]) {

	string wyraz1;
	string wyraz2;
	int j = 0;//numer kolumny
	
	int k = 0;//przepisanie j do porównania
	fstream plik;
	plik.open("tabela.txt", ios::in);
	cout << "Plik otwiera sie" << endl;

	while (!plik.eof()) {

		getline(plik, wyraz1, '=');
		//cout << wyraz1 << endl;
								// ' ' lub '\n'
			getline(plik, wyraz2, ' ');
			//if(wyraz2.include('n'))
			wyraz2=wyraz2.replace(wyraz2.size(), "\n", "");
		
		//cout << wyraz2;
		k=AddToTable(table, wyraz1, wyraz2, i, j, k);
		j = k;
	}
	
	plik.close();

}
