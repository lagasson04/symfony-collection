# symfony-collection

## Install

```
git clone git@github.com:lagasson04/symfony-collection.git
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

## What should I see ?
* [app.js](assets/js/app.js)
* [FooController](src/Controller/FooController.php)
* [Foo](src/Entity/Foo.php)
* [Bar](src/Entity/Bar.php)
* [Item](src/Entity/Item.php)
* [FooType](src/Form/FooType.php)
* [BarType](src/Form/BarType.php)
* [ItemType](src/Form/ItemType.php)
* [edit.html.twig](templates/foo/edit.html.twig)
* [bar.html.twig](templates/foo/bar.html.twig)
* [item.html.twig](templates/foo/item.html.twig)
