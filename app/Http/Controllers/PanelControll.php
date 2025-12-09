<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Claim;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class PanelControll extends Controller
{
    /**
     * Show admin dashboard with statistics
     */
    public function dashboard()
    {
        $totalUsers = User::where('role', 'user')->count();
        $totalItems = Item::count();
        $totalClaims = Claim::count();
        $pendingClaims = Claim::where('status', 'pending')->count();
        $lostItems = Item::where('type', 'lost')->count();
        $foundItems = Item::where('type', 'found')->count();
        $resolvedItems = Item::where('status', 'resolved')->count();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalItems',
            'totalClaims',
            'pendingClaims',
            'lostItems',
            'foundItems',
            'resolvedItems'
        ));
    }

    /**
     * Show all claims for admin approval
     */
    public function claims(Request $request)
    {
        $claims = Claim::with(['item', 'user'])
            ->when($request->input('status'), fn($query) => $query->where('status', $request->input('status')))
            ->latest()
            ->paginate(20);

        return view('admin.claims', compact('claims'));
    }

    /**
     * Approve a claim
     */
    public function approveClaim(Request $request, Claim $claim)
    {
        $claim->update(['status' => 'approved']);
        \app('flasher')->addSuccess('Claim approved.');
        return redirect()->route('claims');
    }

    /**
     * Reject a claim
     */
    public function rejectClaim(Request $request, Claim $claim)
    {
        $claim->update(['status' => 'rejected']);
        \app('flasher')->addSuccess('Claim rejected.');
        return redirect()->route('claims');
    }

    /**
     * Show all items in the system
     */
    public function items(Request $request)
    {
        $items = Item::with('user')
            ->when($request->input('type'), fn($query) => $query->where('type', $request->input('type')))
            ->when($request->input('status'), fn($query) => $query->where('status', $request->input('status')))
            ->latest()
            ->paginate(20);

        return view('admin.items', compact('items'));
    }

    /**
     * Delete an item
     */
    public function deleteItem(Request $request, Item $item)
    {
        $item->delete();
        \app('flasher')->addSuccess('Item deleted.');
        return redirect()->route('items');
    }

    /**
     * Show all users
     */
    public function users(Request $request)
    {
        $users = User::when($request->input('role'), fn($query) => $query->where('role', $request->input('role')))
            ->latest()
            ->paginate(20);

        return view('admin.users', compact('users'));
    }

    /**
     * Update user role
     */
    public function updateUserRole(Request $request, User $user)
    {
        $validated = $request->validate([
            'role' => 'required|in:user,admin',
        ]);

        $user->update($validated);
        \app('flasher')->addSuccess('User role updated successfully.');
        return redirect()->route('users');
    }

    /**
     * Show all messages
     */
    public function message(Request $request)
    {
        $messages = Message::with(['sender', 'recipient', 'claim'])
            ->latest()
            ->paginate(20);

        return view('admin.message', compact('messages'));
    }
}