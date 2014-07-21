University of Mathematics and Computer Science, Bucharest, 2014
===============================================================

Introduction
------------

The following operation is defined:
> Convert : {1, 2} -> {1, 2}, so that Convert(1) = 2 and Convert(2) = 1. The operation is then extended to any sequence of digits containing only 1 and 2, so that for instance, Convert(1211212121) = 2122121212.

We now consider the infinite string **S**, formed only of digits 1 and 2, generated incrementally from the following concatenation rule:

    S1 = 1221
    S2 = 1221211221121221
    ....
    S(k+1) = S(k) + Convert(S(k)) + Convert(S(k)) + S(k).

The rule above applies for any non-zero, natural number, **k**.

Request
-------

Let there be a non-zero, natural number **n**, where **n** < 1.000.000.

1. Write a program which reads **n** and prints out the first **n** digits of string **S**. Example: For **n = 18**, the program will output: *122121122112122121*.
2. Write a program which reads **n** and prints out the **n**-th digits of string **S**, so that the number of steps of the program is proportional to log(n). Example: For **n = 11**, the program will output *1* and for **n = 20**, the program will output *2*.