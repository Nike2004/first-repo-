<html> 
<head> 
<title>
 Obliczanie P i obw prostokata
</title>
 <script language="JavaScript">
function P(a,h)
    {
        a_liczba=parseFloat(a)
        h_liczba=parseFloat(h)
        P_wynik=a_liczba*h_liczba;
        2
        document.getElementsByName('pole')[0].value=P_wynik.toFixed(2); /*  dokument */
        alert("P="+P_wynik.toFixed(2)+" cm^2"); /* okna Alert */
        pokaz1.innerHTML="P="+P_wynik.toFixed(2)+" cm^2"+"<br>";  /*  tabela */
    }
function Ob(a,h)    
    {
        a_liczba=parseFloat(a)
        h_liczba=parseFloat(h)
        Ob_wynik=(2*a_liczba)+(2*h_liczba);
        document.getElementsByName('obwod')[0].value=Ob_wynik.toFixed(2);
        alert("Ob="+Ob_wynik.toFixed(2)+" cm");
        pokaz2.innerHTML="Ob="+Ob_wynik.toFixed(2)+"cm";
}
 </script>
</head> 
<body> 

<br> <br>
<form name="formularz" action="..." onsubmit="P(this.bok.value,this.bok2.value); Ob(this.bok.value,this.bok2.value);return false"> 
    Podaj a=
        <input size="6" name="bok">
    Podaj h=
        <input size="6" name="bok2">
    <br>
    <br>
    <input TYPE="submit" Value="oblicz" >
    <br>
    <br>
    P=
        <input size="6" name="obj">
    Ob=
        <input size="6" name="pole">
</form>
    <table>
        <tr id="pokaz1"></tr>
        <tr id="pokaz2"></tr>
    </table>
</body> 
</html>