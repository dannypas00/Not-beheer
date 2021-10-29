<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Installatie
Om het project snel werkend te krijgen op elke machine zijn er twee docker images beschikbaar; `laravel.test` en `mysql`.  
De `laravel.test` image draait de laravel applicatie en de `mysql` image draait de mysql database.

Deze readme gaat uit van een Linux (of WSL2) systeem waar `docker`, `docker-compose`, en `npm` met hun dependencies op geinstalleerd zijn.

## Installeren
Als eerste zal het project gepulled / gecloned moeten worden.
Vervolgens zal het `.env.example` bestand gekopieerd moeten worden naar een `.env` bestand:  
```sh
cp .env.example .env
```
Hierna zullen alle composer en npm dependencies geinstalleerd moeten worden.  
Let op: hiervoor zijn nodejs + npm nodig op de lokale machine.  
```sh
npm i
```
Draai de docker container voor `laravel.test` en `mysql`. Deze gaan uit van een beschikbare poort 80 en 3306 op het host systeem:
```sh
docker-compose up laravel.test mysql
```
Installeer composer dependencies:
```sh
docker-compose exec laravel.test composer install
```
Voer database migraties met seeders uit:
```sh
docker-compose exec laravel.test php artisan migrate:fresh --seed
```

## Opstarten project
Als eerste zullen de docker containers moeten draaien als deze nog niet aan staan:
```sh
docker-compose up -d laravel.test mysql
```
Hierna zal nodejs aan moeten op de lokale machine:
```sh
npm run watch
```
Er zal nu een lokale instantie van de applicatie beschikbaar zijn op http://localhost/.  

# Live server
Er zal een live server beschikbaar staan met de meest recente master op adres http://not-beheer.online/. Let op dat je browser de http niet automatisch over zet naar https, de server heeft namelijk geen ssl certificaat.
