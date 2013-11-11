#include <iostream>
#include <fstream>
#include <cmath>

using namespace std;

ifstream inputFile("cmmdc.in");
ofstream outputFile("cmmdc.out");

int computeGreatestCommonDivisor(int n, int m) {
    n = abs(n);
    m = abs(m);

    if (n == m)
        return n;

    if (n == 0) {
        return m;
    }

    if (m == 0) {
        return n;
    }

    return (m < n) ? computeGreatestCommonDivisor(n - m, n)
        : computeGreatestCommonDivisor(n, m - n);
}

int main() {
    int number1, number2, cmmdc;

    inputFile >> number1 >> number2;
    
    cmmdc = computeGreatestCommonDivisor(number1, number2);

    if (cmmdc == 1) {
        cmmdc = 0;
    }
    
    outputFile << cmmdc;

    return 0;
}