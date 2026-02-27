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
        // Query op Player model voor ingelogde user
        $query = Player::where('user_id', Auth::id());

        // Zoekfunctie: zoek op naam
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filterfunctie: filter op positie
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

    // 🔹 Opslaan nieuwe speler
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'number' => 'required|integer',
            'position' => 'required',
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