<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Criando salas padrão na DB
         foreach (Room::ROOMS_PORTO as $roomName => $localId) {
            Room::create([
                'name' => $roomName, // Nome da sala
                'id_local' => $localId, // ID do local associado
            ]);
        }

        foreach (Room::ROOMS_SJM as $roomName => $localId) {
            Room::create([
                'name' => $roomName, // Nome da sala
                'id_local' => $localId, // ID do local associado
            ]);
        }

        foreach (Room::ROOMS_MDC as $roomName => $localId) {
            Room::create([
                'name' => $roomName, // Nome da sala
                'id_local' => $localId, // ID do local associado
            ]);
        }
    }
}
