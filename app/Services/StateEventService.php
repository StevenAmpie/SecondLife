<?php

namespace App\Services;

class StateEventService
{
    public static function createRollbackEvent(string $eventName, string $id, int $minutes)
    {
        return "
            CREATE EVENT `$eventName`
            ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL $minutes MINUTE
            DO
                UPDATE publicacion
                SET estado = 'Disponible'
                WHERE id = '$id'
                AND estado NOT IN ('Disponible', 'Vendida');
        ";
    }
}
