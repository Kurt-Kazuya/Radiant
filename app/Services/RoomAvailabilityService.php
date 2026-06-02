<?php

namespace App\Services;

use App\Models\Room;
use Illuminate\Database\Eloquent\Builder;

class RoomAvailabilityService
{
    public const PACKAGE_NAMES = [
        'Deluxe Room',
        'Superior Room',
        'Junior Suite',
        'Penthouse Suite',
    ];

    /**
     * Guest-facing availability (confirmed reservations only).
     */
    public function getDisplayAvailability(string $checkIn, string $checkOut): array
    {
        $availability = [];

        foreach (self::PACKAGE_NAMES as $name) {
            // Keep guest badge numbers aligned with admin "Available Rooms"
            // by using room status, with fallback mapping when room name is missing.
            $total = $this->packageRoomQuery($name)
                ->where('status', '!=', 'maintenance')
                ->count();

            $available = $this->packageRoomQuery($name)
                ->where('status', 'available')
                ->count();

            $availability[$name] = [
                'total'        => $total,
                'available'    => $available,
                'is_available' => $available > 0,
            ];
        }

        return $availability;
    }

    /**
     * Whether a physical room can still be assigned (pending + confirmed overlap check).
     */
    public function hasAssignableRoom(string $roomName, string $checkIn, string $checkOut): bool
    {
        return $this->findBookableRoom($roomName, $checkIn, $checkOut) !== null;
    }

    /**
     * Whether a specific room has no active overlapping reservation for the dates.
     */
    public function isRoomAssignable(Room $room, string $checkIn, string $checkOut): bool
    {
        if ($room->status === 'maintenance') {
            return false;
        }

        return ! $room->reservations()
            ->active()
            ->overlapping($checkIn, $checkOut)
            ->exists();
    }

    /**
     * Find the first room of a package with no active overlapping reservation.
     */
    public function findBookableRoom(string $roomName, string $checkIn, string $checkOut): ?Room
    {
        return $this->packageRoomQuery($roomName)
            ->where('status', '!=', 'maintenance')
            ->whereDoesntHave('reservations', function ($q) use ($checkIn, $checkOut) {
                $q->active()->overlapping($checkIn, $checkOut);
            })
            ->first();
    }

    private function packageRoomQuery(string $roomName): Builder
    {
        return Room::query()->where(function (Builder $query) use ($roomName) {
            switch ($roomName) {
                case 'Deluxe Room':
                    $query->where('name', 'Deluxe Room')
                        ->orWhere(function (Builder $q) {
                            $q->whereNull('name')->where('type', 'single');
                        });
                    break;
                case 'Superior Room':
                    $query->where('name', 'Superior Room')
                        ->orWhere(function (Builder $q) {
                            $q->whereNull('name')->where('type', 'double');
                        });
                    break;
                case 'Junior Suite':
                    $query->where('name', 'Junior Suite')
                        ->orWhere(function (Builder $q) {
                            $q->whereNull('name')->where('room_number', 'like', '3%');
                        });
                    break;
                case 'Penthouse Suite':
                    $query->where('name', 'Penthouse Suite')
                        ->orWhere(function (Builder $q) {
                            $q->whereNull('name')->where('room_number', 'like', '4%');
                        });
                    break;
                default:
                    $query->where('name', $roomName);
                    break;
            }
        });
    }
}
