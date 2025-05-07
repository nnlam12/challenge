#include <stdio.h> // Ensure this header is included for printf and other standard I/O functions
#include <stdlib.h> // Include stdlib.h for general purpose functions
typedef long long int ll;

int* hbg76787ytgGybjhjgvJ(char *str) {
    static int b[3]; // Use static to ensure the array persists after the function returns
    int i;
    for (i = 0; i < 3; i++) {
        b[i] = 0;
    }
    for (i = 0; str[i] != '\0'; i++) {
        if (str[i] == 'a') {
            b[0]++;
        } else if (str[i] == 'i') {
            b[1]++;
        } else if (str[i] == 'o') {
            b[2]++;
        }
    }
    return b; // Return pointer to the first element of the array
}
int G4565tvffFTGVFgb(char *str) {
    int i;
    int a =0;
    for (i = 0; str[i] != '\0'; i++) {
        a+= (i==0) ? (hbg76787ytgGybjhjgvJ(str)[0] +hbg76787ytgGybjhjgvJ(str)[1] + hbg76787ytgGybjhjgvJ(str)[2]) : 0;
        }
        return a;
    }
char* uBNBH788u56rfB(char *str) {
    int i;
    int a = G4565tvffFTGVFgb(str);
    for (i = 0; i< a; i++) {
        if (str[i] == 'a') {
            str[i] = 'i';
        } else if (str[i] == 'i') {
            str[i] = 'o';
        } else if (str[i] == 'o') {
            str[i] = 'a';
        }
    }
    return str;
}
ll awerfrFR323eTGV(char*str) {
    int i;
    str = uBNBH788u56rfB(str); // Modify the string using uBNBH788u56rfB
    int a = G4565tvffFTGVFgb(str); // Calculate the value of a
    
    ll baaa = 0; // Initialize baaa to 0
    for (i = a-1; i >= 0; i--) {
        baaa += (int)str[i];
        baaa *= 1000;
    }
    return baaa;
}
int main(){
    //oiiai
    puts("Enter the code for the treasure box:\n");
    char inp[100]; // Declare a character array to hold the input
    scanf("%s", inp); // Read a string from standard input
    if (awerfrFR323eTGV(inp) == 111105111111097000) {
        printf("That is also the prison key!\n");
    } else {
        printf("Incorrect code\n");
    }
    return 0; // Correct return for int main
}