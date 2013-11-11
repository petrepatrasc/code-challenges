#include <iostream>
#include <fstream>
using namespace std;

ifstream inputFile("adunare.in");
ofstream outputFile("adunare.out");

long upperThreshold = 2000000000;

int addition(int a, int b) {
	return a + b;
}
 
int main()
{   
	int number1, number2, sum;

    inputFile >> number1 >> number2;
    
    sum = addition(number1, number2);

    if(sum < upperThreshold)
        outputFile << sum;
    else
        return 0;
    return 0;
}