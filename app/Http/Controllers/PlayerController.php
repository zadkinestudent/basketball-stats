<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    // 🔹 Dashboard met statistieken
    public function dashboardStats()
    {
        // Haal nu **alle spelers** op, niet per user
        $players = Player::all();

        $totalPlayers = $players->count();
        $positions = $players->groupBy('position')->map->count();

        return view('dashboard', compact('players', 'totalPlayers', 'positions'));
    }

    // 🔹 Spelerslijst met zoek- en filterfunctionaliteit
    public function index(Request $request)
    {
        $query = Player::query(); // haal alles

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

    // 🔹 Opslaan nieuwe speler met validatie
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|integer|between:0,99',
            'position' => 'required|in:Guard,Forward,Center',
        ]);

        Player::create([
            'name' => $request->name,
            'number' => $request->number,
            'position' => $request->position,
            'age' => $request->age ?? null,
            'height' => $request->height ?? null,
            'weight' => $request->weight ?? null,
            'college' => $request->college ?? null,
        ]);

        return redirect()->route('players.index');
    }

    // 🔹 Formulier speler bewerken
    public function edit(Player $player)
    {
        return view('players.edit', compact('player'));
    }

    // 🔹 Update speler
    public function update(Request $request, Player $player)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|integer|between:0,99',
            'position' => 'required|in:Guard,Forward,Center',
        ]);

        $player->update([
            'name' => $request->name,
            'number' => $request->number,
            'position' => $request->position,
            'age' => $request->age ?? $player->age,
            'height' => $request->height ?? $player->height,
            'weight' => $request->weight ?? $player->weight,
            'college' => $request->college ?? $player->college,
        ]);

        return redirect()->route('players.index');
    }

    // 🔹 Spelerdetailpagina
    public function show(Player $player)
    {
        return view('players.show', compact('player'));
    }

    // 🔹 Delete speler
    public function destroy(Player $player)
    {
        $player->delete();

        return redirect()->route('players.index');
    }
}