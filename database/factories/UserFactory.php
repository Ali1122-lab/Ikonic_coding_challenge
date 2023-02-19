// database/factories/UserFactory.php
use App\Models\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('password'),
        'remember_token' => Str::random(10), 
    ];
});

// database/factories/ConnectionFactory.php
use App\Models\User; 
use App\Models\Connection;
use Faker\Generator as Faker;

$factory->define(Connection::class, function (Faker $faker) {
    $user1 = User::inRandomOrder()->first();
    $user2 = User::where('id', '!=', $user1->id)->inRandomOrder()->first();
    return [
        'user_id' => $user1->id,
        'connection_id' => $user2->id,
        'status' => Connection::STATUS_ACCEPTED,
    ];
});
