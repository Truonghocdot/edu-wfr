<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Claim;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    // /**
    //  * Middleware to require authentication for item operations
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth')->except(['foundItems', 'lostItems', 'viewFoundItem', 'viewLostItem']);
    // }

    /**
     * Get all found items with search and filter
     */
    public function foundItems(Request $request)
    {
        $query = Item::where('type', 'found')
            ->where('status', 'open');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        if ($request->filled('location')) {
            $query->where('location', 'like', "%" . $request->input('location') . "%");
        }

        $items = $query->latest()->paginate(12)->withQueryString();

        return view('user.foundItems', compact('items'));
    }

    /**
     * Get all lost items with search and filter
     */
    public function lostItems(Request $request)
    {
        $query = Item::where('type', 'lost')
            ->where('status', 'open');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        if ($request->filled('location')) {
            $query->where('location', 'like', "%" . $request->input('location') . "%");
        }

        $items = $query->latest()->paginate(12)->withQueryString();

        return view('user.lostItems', compact('items'));
    }

    /**
     * View a specific found item
     */
    public function viewFoundItem($id)
    {
        $item = Item::where('type', 'found')->findOrFail($id);
        $claims = $item->claims()->with('user')->get();

        return view('user.viewFoundItem', compact('item', 'claims'));
    }

    /**
     * View a specific lost item
     */
    public function viewLostItem($id)
    {
        $item = Item::where('type', 'lost')->findOrFail($id);
        $claims = $item->claims()->with('user')->get();

        return view('user.viewLostItem', compact('item', 'claims'));
    }

    /**
     * Show form to report a found item
     */
    public function reportFoundItem()
    {
        return view('user.reportFoundItem');
    }

    /**
     * Store a found item report
     */
    public function storeFoundItem(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'location' => 'required|string',
            'date_reported' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['type'] = 'found';

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('items/found', 'public');
        }

        Item::create($validated);
        \app('flasher')->addSuccess('Found item reported successfully.');
        return redirect()->route('userDashboard');
    }

    /**
     * Show form to report a lost item
     */
    public function reportLostItem()
    {
        return view('user.reportLostItem');
    }

    /**
     * Store a lost item report
     */
    public function storeLostItem(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'location' => 'required|string',
            'date_reported' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['type'] = 'lost';

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('items/lost', 'public');
        }

        Item::create($validated);
        \app('flasher')->addSuccess('Lost item reported successfully.');
        return redirect()->route('userDashboard');
    }

    /**
     * Show user dashboard with their items and claims
     */
    public function userDashboard()
    {
        /**
         * @var User $user
         */
        $user = Auth::user();
        $myItems = $user->items()->latest()->get();
        $myClaims = $user->claims()->with('item')->latest()->get();
        $unreadMessages = Message::where('recipient_id', $user->id)->unread()->count();

        return view('user.userDashboard', compact('myItems', 'myClaims', 'unreadMessages'));
    }

    /**
     * Get user's messages
     */
    public function messages()
    {
        $user = Auth::user();
        $messages = Message::where('recipient_id', $user->id)
            ->orWhere('sender_id', $user->id)
            ->with('sender', 'recipient')
            ->latest()
            ->paginate(20);

        $unreadCount = Message::where('recipient_id', $user->id)->unread()->count();

        return view('user.messages', compact('messages', 'unreadCount'));
    }

    /**
     * Send a new message (Push Message)
     */
    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|exists:users,email',
            'message' => 'required|string|max:1000',
        ]);

        $recipient = \App\Models\User::where('email', $validated['email'])->first();

        if ($recipient->id === Auth::id()) {
            \app('flasher')->addError('You cannot send a message to yourself.');
            return redirect()->back();
        }

        Message::create([
            'sender_id' => Auth::id(),
            'recipient_id' => $recipient->id,
            'body' => $validated['message'],
        ]);

        \app('flasher')->addSuccess('Message sent successfully.');
        return redirect()->back();
    }

    /**
     * Show general reports/statistics
     */
    public function report()
    {
        $totalLostItems = Item::where('type', 'lost')->count();
        $totalFoundItems = Item::where('type', 'found')->count();
        $resolvedItems = Item::where('status', 'resolved')->count();
        $totalUsers = \App\Models\User::count();

        return view('user.report', compact('totalLostItems', 'totalFoundItems', 'resolvedItems', 'totalUsers'));
    }

    /**
     * Create a claim for an item
     */
    public function createClaim(Request $request, Item $item)
    {
        if (Auth::id() === $item->user_id) {
            \app('flasher')->addError('You cannot claim your own item.');
            return redirect()->back();
        }

        $validated = $request->validate([
            'message' => 'nullable|string|max:500',
        ]);

        $claim = Claim::create([
            'item_id' => $item->id,
            'user_id' => Auth::id(),
            'message' => $validated['message'] ?? null,
        ]);

        // Notify item owner via message
        Message::create([
            'sender_id' => Auth::id(),
            'recipient_id' => $item->user_id,
            'claim_id' => $claim->id,
            'body' => Auth::user()->name . ' claimed your item: ' . $item->title,
        ]);

        \app('flasher')->addSuccess('Claim submitted. The item owner has been notified.');
        return redirect()->back();
    }

    /**
     * Delete an item (soft delete - update status)
     */
    public function deleteItem(Request $request, Item $item)
    {
        if (Auth::id() !== $item->user_id) {
            \app('flasher')->addError('Unauthorized.');
            return redirect()->back();
        }

        $item->update(['status' => 'resolved']);

        \app('flasher')->addSuccess('Item marked as resolved.');
        return redirect()->route('userDashboard');
    }
}
