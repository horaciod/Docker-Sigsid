# Docker-Sigsid
Imagen docker para correr el SIGSID con extensiones especiales

Con esta imagen se puede correr el sistema de bibliotecas que he desarrollado para la UNCUYO https://bibliotecas.uncuyo.edu.ar 

- PHP
- APACHE2 
- UBUNTU FOCAL (20.04) 
- Con extensiones del repositorio de ubuntu y una especial del repositorio yaz
- Página de check de extensiones instaladas en el directorio html. 
- Agregado el soporte para SOLR-client
 
construir con
docker build -t sigsidv2 .

Desarrollado por el [sid](https://sid.uncu.edu.ar)

