## Préparation séance 4

```bash
composer require fakerphp/faker
```

```php
$faker = Faker\Factory::create();
// generate data by calling methods
echo $faker->name();
// 'Vince Sporer'
echo $faker->email();
// 'walter.sophia@hotmail.com'
echo $faker->text();
```

```php
$date = DateTime::createFromFormat('Y/m/d (G:i)', '2017/02/16 (16:15)');
echo $date->format('Y-m-d H:i:s');
```