#include<iostream>
#include<fstream>
#include<string>

using namespace std;

int main()
{
	ifstream in("comments.txt");
	string s;

	getline(in, s);
	while(!in.fail())
	{
		cout << s << " ";
		in >> s;
	}
	cout << endl;
	in.close();
}
	

		
