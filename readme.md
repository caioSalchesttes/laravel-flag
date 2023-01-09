## Composer library description
This library aims to add an additional column in the tables, which can be used as a "cache" to add and remove flags.

The cache column can be useful for storing temporary information that is used by the application but doesn't need to be permanent. It can be used, for example, to store session information or to mark records for deletion in a batch operation.

# The library provides the following methods:
Add Flag to Cache Column of a Specific Record Remove Flag from Cache Column of a Specific Record Query the Flag Value in a Specific Record Thus, you can manage the flags stored in the cache column efficiently and conveniently.

# Installation

```php
composer require caiosalchesttes/laravel-flag
```

**We must add in your migrations to generate the column**

```php
   public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->flag();
        });
    }

```

**After that you can put in your model what you want to use**

```php
<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Caiosalchesttes\LaravelFlag\Flag:

class User extends Authenticatable
{
    use Notifiable, Flag:
```

**Some methods you can use**

Add

```php
$user = User::find(1);
$user->addFlag('key', 'value');
$user->save();
```
Add persist

```php
$user = User::find(1);
$user->addFlagPersist('key', 'value');
```

Remove flag

```php
$user = User::find(1);
$user->removeFlag('key');
$user->save();
```

Remove flag persist

```php
$user = User::find(1);
$user->removeFlagPersist('key');
```

Clear all flags

```php
$user = User::find(1);
$user->clearFlags();
$user->save();
```

Has flag

```php
$user = User::find(1);
$user->hasFlag('key');
```

Get flag

```php
$user = User::find(1);
$user->getFlag('key');
```


Get all flags

```php
$user = User::find(1);
$user->getFlags();
```

## License
MIT License (MIT). Please, read the License File for more informations.
