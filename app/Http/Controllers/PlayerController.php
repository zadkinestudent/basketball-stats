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
        $players = Auth::user()->players;

        $totalPlayers = $players->count();
        $positions = $players->groupBy('position')->map->count();

        return view('dashboard', compact('players', 'totalPlayers', 'positions'));
    }

    // 🔹 Spelerslijst
    public function index()
    {
        $players = Auth::user()->players;
        return view('players.index', compact('players'));
    }

    // 🔹 Formulier nieuwe speler
    public function create()
    {
        return view('players.create');
    }

    // 🔹 Opslaan nieuwe speler
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'number' => 'required|integer',
            'position' => 'required',
        ]);

        Auth::user()->players()->create($request->all());

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

    // 🔹 Update speler
    public function update(Request $request, Player $player)
    {
        if ($player->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'name' => 'required',
            'number' => 'required|integer',
            'position' => 'required',
        ]);

        $player->update($request->all());

        return redirect()->route('players.index');
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