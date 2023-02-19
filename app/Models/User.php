
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasFactory;

    public function sentRequests(): HasMany 
    {
        return $this->hasMany(UserConnection::class, 'user_id')->where('status', 'pending');
    }

    public function receivedRequests(): HasMany
    {
        return $this->hasMany(UserConnection::class, 'connection_id')->where('status', 'pending');
    }

    public function connections(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_connections', 'user_id', 'connection_id')->where('status', 'accepted');
    }

    public function connectionRequests(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_connections', 'connection_id', 'user_id')->where('status',
        public function connectionRequests(): BelongsToMany
{
    return $this->belongsToMany(User::class, 'user_connections', 'connection_id', 'user_id')->where('status', 'pending');
}

public function removeConnection(User $user): void
{
    $this->connections()->detach($user->id);
    $user->connections()->detach($this->id);
}
