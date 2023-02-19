use Illuminate\Http\Request;
use App\Models\User;

class ConnectionController extends Controller
{
    public function showSuggestions(Request $request)
    {
        $users = User::whereDoesntHave('connections', function ($query) use ($request) {
            $query->where('user_id', $request->user()->id)
                  ->orWhere('status', 'accepted');
        })->where('id', '!=', $request->user()->id)->get();

        return view('connections.suggestions', compact('users'));
    }

    public function sendRequest(User $user, Request $request)
    {
        $request->user()->connections()->attach($user->id, ['status' => 'pending']);
        return redirect()->back()->with('success', 'Connection request sent');
    }

    public function showSentRequests(Request $request)
    {
        $users = $request->user()->connections()->where('status', 'pending')->get();
        return view('connections.sent-requests', compact('users'));
    }

    public function withdrawRequest(User $user, Request $request)
    {
        $request->user()->connections()->detach($user->id);
        return redirect()->back()->with('success', 'Connection request withdrawn');
    }

    public function showReceivedRequests(Request $request)
    {
        $users = $request->user()->connectionRequests()->get();
        return view('connections.received-requests', compact('users'));
    }

    public function acceptRequest(User $user, Request $request)
    {
        $request->user()->connectionRequests()->updateExistingPivot($user->id, ['status' => 'accepted']);
        return redirect()->back()->with('success', 'Connection request accepted');
    }

    public function showConnections(Request $request)
    {
        $users = $request->user()->connections()->where('status', 'accepted')->get();
        return view('connections.connections', compact('users'));
    }

    public function removeConnection(User $user, Request $request)
    {
        $request->user()->removeConnection($user);
        return redirect()->back()->with('success', 'Connection removed');
    }

    public function showCommonConnections(User $user, Request $request)
    {
        $commonConnections = $request->user()->connections()
                                ->where('status', 'accepted')
                                ->whereIn('id', $user->connections()->where('status', 'accepted')->pluck('id'))
                                ->get();

        return view('connections.common-connections', compact('commonConnections', 'user'));
    }
}

