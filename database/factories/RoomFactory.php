<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Room::class;

    /**
     * Método genérico para definir uma sala com base no conjunto de salas.
     *
     * @param array $roomsArray
     * @return array
     */
    private function definitionForRooms(array $roomsArray): array
    {
        // Pega um nome de sala da lista de nomes, sem considerar os IDs dos locais
        $roomName = $this->faker->randomElement(array_keys($roomsArray));
        // Pega o ID do local associado ao nome da sala
        $localId = $roomsArray[$roomName];

        return [
            'name' => $roomName,  // Nome da sala
            'id_local' => $localId,  // ID do local associado
        ];
    }

    public function definition(): array
    {
        return $this->definitionForRooms(Room::ROOMS_PRT);
    }

    public function definitionSJM(): array
    {
        return $this->definitionForRooms(Room::ROOMS_SJM);
    }

    public function definitionMDC(): array
    {
        return $this->definitionForRooms(Room::ROOMS_MDC);
    }
}
