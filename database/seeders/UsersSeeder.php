// database/seeds/UserSeeder.php
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Connection;

class UserSeeder extends Seeder
{
    public function run()
    {
        factory(User::class, 50)->create(); 

        // Create some connections between users
        $connections = factory(Connection::class, 25)->create();
    }
}
