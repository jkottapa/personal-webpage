#include <iostream>
#include <fstream>
#include <string>

using namespace std;

int main () {

	ifstream in("in.txt");
	ofstream out("userinput.txt", ios::app);

	string s;
	getline(in, s);
	while(!in.fail())
	{
		out << s;
		in >> s;
	}
	in.close(); out.close();
}

