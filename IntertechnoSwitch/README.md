# IntertechnoSwitch PHP Module for IP-Symcon
Das Modul stellt Funktionen zur Ansteuerung von Intertechno Schaltaktoren über das Intertechno LAN Gateway zur Verfügung.

### Inhaltverzeichnis

1. [Funktionsumfang](#1-funktionsumfang)
2. [Voraussetzungen](#2-voraussetzungen)
3. [Software-Installation](#3-software-installation)
4. [Einrichten der Instanzen in IP-Symcon](#4-einrichten-der-instanzen-in-ip-symcon)
5. [Statusvariablen und Profile](#5-statusvariablen-und-profile)
6. [WebFront](#6-webfront)
7. [PHP-Befehlsreferenz](#7-php-befehlsreferenz)

### 1. Funktionsumfang

* Ansteuern von Intertechno Schaltaktoren.

### 2. Voraussetzungen

- IP-Symcon ab Version 4.x

### 3. Software-Installation

Über das Modul-Control folgende URL hinzufügen.  
`git://github.com/brownson/Intertechno.git`  

### 4. Einrichten der Instanzen in IP-Symcon

- Unter "Instanz hinzufügen" ist das 'IntertechnoSwitch'-Modul unter dem Hersteller '(Brownson)' aufgeführt.  

__Konfigurationsseite__:

Name                    | Beschreibung
----------------------- | ---------------------------------
Master DIP              | Master Adresse des Aktors
Slave DIP               | Slave Adresse des Aktors
Button "Switch On"      | Einschalten des Aktors.
Button "Switch Off"     | Ausschalten des Aktors.

### 5. Statusvariablen und Profile

Die Statusvariablen/Kategorien werden automatisch angelegt. Das Löschen einzelner kann zu Fehlfunktionen führen.

##### Statusvariablen

Name         | Typ       | Beschreibung
------------ | --------- | ----------------
STATE        | Boolean   | Schaltet des Intertechno Aktor ein und aus
Switch Off   | Skript    | Ausschalten des Aktors.
Switch On    | Skript    | Einschalten des Aktors.

##### Profile:

Es werden keine zusätzlichen Profile hinzugefügt

### 6. WebFront

Über das WebFront kann der Aktor ein und ausgeschaltet werden.  

### 7. PHP-Befehlsreferenz

`boolean ITSW_SwitchOn(integer $InstanzID);`  
Schaltet den Aktor mit der InstanzID $InstanzID ein.  
Die Funktion liefert keinerlei Rückgabewert.  
Beispiel:  
`ITSW_SwitchOn(12345);`

`boolean ITSW_SwitchOff(integer $InstanzID);`  
Schaltet den Aktor mit der InstanzID $InstanzID aus.  
Die Funktion liefert keinerlei Rückgabewert.  
Beispiel:  
`ITSW_SwitchOff(12345);`

`boolean ITSW_SwitchState(integer $InstanzID, boolean $Value);`  
Schaltet das Intertechnomodul mit der InstanzID $InstanzID  auf den Wert $Value (true = An; false = Aus).  
Die Funktion liefert keinerlei Rückgabewert.  
Beispiel:  
`ITSW_SwitchState(12345, true);`

