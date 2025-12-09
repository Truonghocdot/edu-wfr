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
     * Get all found items
     */
    public function foundItems()
    {
        $items = Item::where('type', 'found')
            ->where('status', 'open')
            ->latest()
            ->paginate(12);

        return view('user.foundItems', compact('items'));
    }

    /**
     * Get all lost items
     */
    public function lostItems()
    {
        $items = Item::where('type', 'lost')
            ->where('status', 'open')
            ->latest()
            ->paginate(12);

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
