# symfony-collection

## Install

```
git clone git@github.com:TBoileau/symfony-collection.git
composer install
yarn install
```
Don't forget to configure the environment variable `DATABASE_URL` in `.env` file.
```
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
```

## Launch development server
```
php bin/console server:run
yarn run encore dev --watch
```
