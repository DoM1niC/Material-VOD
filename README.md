# Material VOD
Video-on-Demand HTML5 / PHP Basis mit der Materialize Library & VideoJS usw.

![screenshots](http://watch.3dns.eu/img/screenshots.png)

## Voraussetzung
- NGINX oder Apache Webserver
- PHP 5 / 7 

## Installation
- Webseite auf beliebigen Server mit PHP kopieren und aufrufen.
- keine Installation von Datenbanken notwendig, alle Bereiche werden per Hand bearbeitet mit einem Editor.
- Unbedingt: sections/config.php  & libs/ssh/localhost.php anpassen!
- ffmpeg / screen / youtube-dl benötigt!

## FAQ
**Frage**: Wie bearbeite ich einzelne Bereiche?

Antwort: Fast alle Bereiche können über die PHP Dateien bearbeitet werden mit puren HTML5, sonst Index.php anpassen! (Siehe Ordner sections,modals usw.)



**Frage:** Wie setze ich den Namen der Seite?

Antwort: includes/sitename.php anpassen!



**Frage:** Wo landen die Uploads?

Antwort: content/vod Ordner und die jeweiligen Unterordner.


## Geplant
- Kategorien erstellen
- Benutzerverwaltung & Rechte anpassen

### Verwendete Libraries
[Materialize](http://materializecss.com/), a CSS Framework based on material design

[VideoJS](http://videojs.com), Video Player

[JQuery](https://jquery.com/)

[Font Awesome](http://fontawesome.io), Symbole & Icon's