![Fingpey](https://fingpey.s3.amazonaws.com/Fondo.png "FingPey")

## [FingPeySBC-TechSummaryTemplate.pdf](FingPeySBC-TechSummaryTemplate.pdf)

## Arquitectura
![Diagrama](https://fingpey.s3.amazonaws.com/fingpey-aws.png "Arquitectura AWS")

## Demo Urls 
- Homepage http://ec2-3-83-93-207.compute-1.amazonaws.com/
- Backend http://ec2-3-83-93-207.compute-1.amazonaws.com/admin/
- API http://ec2-3-83-93-207.compute-1.amazonaws.com/api/
- App preview https://marvelapp.com/54ag5f7/screen/66815332

## Stack
- php
- python
- mysql
- java
- aws
- Visa CiberSource


### Instalación  del backend 

#### Requisitos
- php 7.2.x
- mysql 5.7
- composer

#### Documentación Symfony https://symfony.com/doc/4.4/setup.html

#### Instalación
- clonar el repositorio
- instalar las dependencias `composer install`
- crear el archivo de configuración .env
```
# In all environments, the following files are loaded if they exist,
# the latter taking precedence over the former:
#
#  * .env                contains default values for the environment variables needed by the app
#  * .env.local          uncommitted file with local overrides
#  * .env.$APP_ENV       committed environment-specific defaults
#  * .env.$APP_ENV.local uncommitted environment-specific overrides
#
# Real environment variables win over .env files.
#
# DO NOT DEFINE PRODUCTION SECRETS IN THIS FILE NOR IN ANY OTHER COMMITTED FILES.
#
# Run "composer dump-env prod" to compile .env files for production use (requires symfony/flex >=1.2).
# https://symfony.com/doc/current/best_practices.html#use-environment-variables-for-infrastructure-configuration

###> symfony/framework-bundle ###
APP_ENV=dev
APP_SECRET=91d528cf4a58633eb9358cbc4eede68d
#TRUSTED_PROXIES=127.0.0.0/8,10.0.0.0/8,172.16.0.0/12,192.168.0.0/16
#TRUSTED_HOSTS='^(localhost|example\.com)$'
###< symfony/framework-bundle ###

###> symfony/mailer ###
# MAILER_DSN=smtp://localhost
###< symfony/mailer ###

###> doctrine/doctrine-bundle ###
# Format described at https://www.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/configuration.html#connecting-using-a-url
# For an SQLite database, use: "sqlite:///%kernel.project_dir%/var/data.db"
# For a PostgreSQL database, use: "postgresql://db_user:db_password@127.0.0.1:5432/db_name?serverVersion=11&charset=utf8"
# IMPORTANT: You MUST configure your server version, either here or in config/packages/doctrine.yaml
DATABASE_URL=mysql://fingpey_admin:fingpey_password@mysql:3306/fingpey_db?serverVersion=5.7
###< doctrine/doctrine-bundle ###
###> nelmio/cors-bundle ###
CORS_ALLOW_ORIGIN=^https?://(localhost|127\.0\.0\.1)(:[0-9]+)?$
###< nelmio/cors-bundle ###

```
- ejecutar las migraciones `php bin/console doctrine:migrations:migrate`
- ejecutar el servidor local `php bin/console server:start`
- ir a http://localhost:8000