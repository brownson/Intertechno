# IntertechnoShutter PHP Module for IP-Symcon
Das Modul stellt Funktionen zur Ansteuerung von Intertechno Shutteraktoren über das Intertechno LAN Gateway zur Verfügung.

### Inhaltverzeichnis

1. [Funktionsumfang](#1-funktionsumfang)
2. [Voraussetzungen](#2-voraussetzungen)
3. [Software-Installation](#3-software-installation)
4. [Einrichten der Instanzen in IP-Symcon](#4-einrichten-der-instanzen-in-ip-symcon)
5. [Statusvariablen und Profile](#5-statusvariablen-und-profile)
6. [WebFront](#6-webfront)
7. [PHP-Befehlsreferenz](#7-php-befehlsreferenz)

### 1. Funktionsumfang

* Ansteuern von Intertechno Shutteraktoren.

### 2. Voraussetzungen

- IP-Symcon ab Version 4.x

### 3. Software-Installation

Über das Modul-Control folgende URL hinzufügen.  
`git://github.com/brownson/Intertechno.git`  

### 4. Einrichten der Instanzen in IP-Symcon

- Unter "Instanz hinzufügen" ist das 'IntertechnoShutter'-Modul unter dem Hersteller '(Brownson)' aufgeführt.  

__Konfigurationsseite__:

Name                    | Beschreibung
----------------------- | ---------------------------------
Master DIP              | Master Adresse des Aktors
Slave DIP               | Slave Adresse des Aktors
Button "Move Down"      | Shutter in die geschlossene Position fahren.
Button "Move Up"        | Shutter in die geöffnete Position fahren.

### 5. Statusvariablen und Profile

Die Statusvariablen/Kategorien werden automatisch angelegt. Das Löschen einzelner kann zu Fehlfunktionen führen.

##### Statusvariablen

Name         | Typ       | Beschreibung
------------ | --------- | ----------------
Move Down    | Skript    | Shutter in die geschlossene Position fahren.
Move Up      | Skript    | Shutter in die geöffnete Position fahren.

##### Profile:

Es werden keine zusätzlichen Profile hinzugefügt

### 6. WebFront

Über das WebFront kann der Aktor ein und ausgeschaltet werden.  

### 7. PHP-Befehlsreferenz

`boolean ITSH_MoveDown(integer $InstanzID);`  
Shutter in die geschlossene Position fahren.
Die Funktion liefert keinerlei Rückgabewert.  
Beispiel:  
`ITSH_MoveDown(12345);`

`boolean ITSH_MoveUp(integer $InstanzID);`  
Shutter in die geöffnete Position fahren.
Die Funktion liefert keinerlei Rückgabewert.  
Beispiel:  
`ITSH_MoveUp(12345);`

`boolean ITSH_Move(integer $InstanzID, boolean $Value);`  
Schaltet das Intertechnomodul mit der InstanzID $InstanzID  auf den Wert $Value (true = Geschlossen; false = Geöffnet).  
Die Funktion liefert keinerlei Rückgabewert.  
Beispiel:  
`ITSH_Move(12345, true);`

