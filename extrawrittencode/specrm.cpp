#include <iostream>
#include <fstream>
#include <string>
#include <cstring>

using namespace std;
int main()
{
	ifstream in("input.txt");
	string s ="";
	ofstream out("in.txt");

	in >> s;
	while(!in.fail())
	{
		//cout << s;
		const char * i = s.c_str();
		//cout << i << " ";
		for(int k=0; i[k]!='\0'; k++)
		{
			 if(i[k] != '\\'){
				out << i[k];
			 //cout << i[k]; 
			}
		}
		out << " ";
		in >> s;
	
	}
	
	in.close();
	out.close();	
}
