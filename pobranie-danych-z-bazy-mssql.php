<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Serwis ABC</title>
<meta http-equiv=content-type content="text/html; charset=iso-8859-2">
<meta http-equiv="Content-Language" content="pl">
</head>

<body>
<?php 

////////////////////////////////////////////////////////////
//Przyk�ad kodu wy�wietlaj�cego dane z bazy mysql (tabeli newsletter z
//osobami zapisanymi na list� dystrybucyjn�)
//Wymagania
//  1. Zalozona baza mysql na serwerze
//  2. Tabela newsletter w bazie mysql z polami imie, nazwisko, mail
////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////
//Definicje zmiennych

//adres ip serwera mysql kt�ry zawiera baz� danych i tabele z osobami 
//zapisanymi na list� dystrybucyjna newslettera
$adres_ip_serwera_mysql_z_baza_danych = '127.0.0.1';

//nazwa bazy danych z tabel� newsletter zawieraj�c� osoby zapisane na 
//list� dystrybucyjna newslettera
$nazwa_bazy_danych = 'moja_baza';

//nazwa uzytkownika bazy danych $nazwa_bazy_danych
$login_bazy_danych = 'user_test';

//haslo uzytkownika bazy danych $nazwa_bazy_danych
$haslo_bazy_danych = 'haslo_test';

////////////////////////////////////////////////////////////
//Kod programu

//Ustanawiamy po��czenie z serwerem mysql
if ( !mysql_connect($adres_ip_serwera_mysql_z_baza_danych,$login_bazy_danych,$haslo_bazy_danych) ) {
   echo 'Nie moge polaczyc sie z baza danych';
	 exit (0);
}
//Wybieramy baze danych na serwerze mysql ktora zawiera tabele
//newsletter gdzie sa dane osob z listy dystrybucyjnej
if ( !mysql_select_db($nazwa_bazy_danych) ) {
   echo 'Blad otwarcia bazy danych';
	 exit (0);
}

//Definiujemy zapytanie pobieraj�ce wszystkie wiersze z wszystkimi
//polami z tabeli newsletter
$zapytanie = "SELECT * FROM `newsletter`";
//wykonujemy zdefiniowane zapytanie na bazie mysql
$wynik = mysql_query($zapytanie);

//Wy�wietlamy w tabeli html dane pobrane 
//z tabeli newsletter bazy mysql
//Najpierw definiujemy nag��wek tabeli html
echo "<p>";
echo "<table boder=\"1\"><tr>";
echo "<td bgcolor=\"ffff00\"><strong>UID</strong></td>";
echo "<td bgcolor=\"ffff99\"><strong>Imie</strong></td>";
echo "<td bgcolor=\"ffff00\"><strong>Nazwisko</strong></td>";
echo "<td bgcolor=\"ffff99\"><strong>Mail</strong></td>";
echo "</tr>";
//Teraz wy�wietlamy kolejne wiersze z tabeli newsletter
//Pola tabeli newsletter pobieramy odwo�uj�c si� do ich 
//numer�w jak poni�ej:
//   0 (UID)
//   1 (Imie)
//   2 (Nazwisko)
//   3 (Mail)
while ( $row = mysql_fetch_row($wynik) ) {
   echo "</tr>";
   echo "<td bgcolor=\"ffff00\">" . $row[0] . "</td>";
   echo "<td bgcolor=\"ffff99\">" . $row[1] . "</td>";
   echo "<td bgcolor=\"ffff00\">" . $row[2] . "</td>";
   echo "<td bgcolor=\"ffff99\">" . $row[3] . "</td>";
   echo "</tr>";
}
echo "</table>";


//Zamykamy po��czenie z baz� danych
if ( !mysql_close() ) {
   echo 'Nie moge zakonczyc polaczenia z baza danych';
   exit (0);
}

?>
</body> 
</html>
