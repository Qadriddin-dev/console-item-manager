# Shopping List Console App

This PHP console application allows you to manage a shopping list stored in a file (`data.txt`). You can add, edit, delete items, calculate the total price of your shopping list, and subtract a discount if needed.

## Usage

### Commands

#### Add an Item

To add an item to the shopping list, use the `add` command:

```php
php index.php data.txt add "Product Name" Price
```

Example:

```php
php index.php data.txt add "Шоколад" 50
```

#### Edit an Item

To edit the price of an item in the shopping list, use the `edit` command:

```php
php index.php data.txt edit "Product Name" NewPrice
```

Example:

```php
php index.php data.txt edit "Шоколад" 50
```

#### Delete an Item

To remove an item from the shopping list, use the `delete` command:

```php
php index.php data.txt delete "Product Name"
```

Example:

```php
php index.php data.txt delete "Шоколад"
```

#### Calculate Total Price

To calculate the total price of the shopping list, use the `subtract` command:

```php
php index.php data.txt subtract
```

Example:

```php
php index.php data.txt subtract
```

### File Structure

- `index.php`: The main entry point of the console application.
- `data.txt`: The file where the shopping list data is stored.
