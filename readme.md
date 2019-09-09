<p align="center">
    <img src="https://media.licdn.com/dms/image/C4D16AQEBNFH16RlKag/profile-displaybackgroundimage-shrink_350_1400/0?e=1573689600&v=beta&t=10dgJLbuByCPfCMNsitbofR2OsniQR2NBvwYqiTiQOw" height="150">
</p>

# Recursos

Para o teste foi utilizado:

* PHP 7.3
* MySQL 5.7
* Bootstrap 4.3
* Laravel 5.8

## Requisitos

Requisitos para instalação do projeto:

* Composer
* PHP >= 7.2
* MySQL 5.7

## Comandos

Para rodar o projeto, é necessário rodar os seguintes comandos

```
cp .env.example .env
```
```
composer install
```
```
php artisan key:generate
```

Altere as linhas 12 e 13 do arquivo .env para configurar o banco de dados 

Rode o seguinte comando para gerar as tabelas
```
php artisan migrate
```

Rode o comando ``php artisan serve`` e o projeto já estará funcionando.
