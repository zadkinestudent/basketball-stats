<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    // 🔹 Dashboard met statistieken
    public function dashboardStats()
    {
        $players = Player::where('user_id', Auth::id())->get();

        $totalPlayers = $players->count();
        $positions = $players->groupBy('position')->map->count();

        return view('dashboard', compact('players', 'totalPlayers', 'positions'));
    }

    // 🔹 Spelerslijst met zoek- en filterfunctionaliteit
    public function index(Request $request)
    {
        $query = Player::where('user_id', Auth::id());

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->has('position') && $request->position != '') {
            $query->where('position', $request->position);
        }

        $players = $query->get();

        return view('players.index', compact('players'));
    }

    // 🔹 Formulier nieuwe speler
    public function create()
    {
        return view('players.create');
    }

    // 🔹 Opslaan nieuwe speler met uitgebreide validatie
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => [
                'required',
                'integer',
                'between:0,99',
                function ($attribute, $value, $fail) {
                    if (Player::where('user_id', Auth::id())->where('number', $value)->exists()) {
                        $fail('Dit nummer is al in gebruik door een andere speler.');
                    }
                },
            ],
            'position' => 'required|in:Guard,Forward,Center',
        ]);

        Player::create([
            'name' => $request->name,
            'number' => $request->number,
            'position' => $request->position,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('players.index');
    }

    // 🔹 Formulier speler bewerken
    public function edit(Player $player)
    {
        if ($player->user_id !== Auth::id()) {
            abort(403);
        }

        return view('players.edit', compact('player'));
    }

    // 🔹 Update speler met uitgebreide validatie
    public function update(Request $request, Player $player)
    {
        if ($player->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'number' => [
                'required',
                'integer',
                'between:0,99',
                function ($attribute, $value, $fail) use ($player) {
                    if (Player::where('user_id', Auth::id())
                        ->where('number', $value)
                        ->where('id', '!=', $player->id)
                        ->exists()) {
                        $fail('Dit nummer is al in gebruik door een andere speler.');
                    }
                },
            ],
            'position' => 'required|in:Guard,Forward,Center',
        ]);

        $player->update([
            'name' => $request->name,
            'number' => $request->number,
            'position' => $request->position,
        ]);

        return redirect()->route('players.index');
    }

    // 🔹 Spelerdetailpagina
    public function show(Player $player)
    {
        if ($player->user_id !== Auth::id()) {
            abort(403);
        }

        return view('players.show', compact('player'));
    }

    // 🔹 Delete speler
    public function destroy(Player $player)
    {
        if ($player->user_id !== Auth::id()) {
            abort(403);
        }

        $player->delete();

        return redirect()->route('players.index');
    }
}