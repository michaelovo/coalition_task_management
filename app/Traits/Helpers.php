<?php

namespace App\Traits;

use App\Models\Priority;
use Illuminate\Support\Str;

trait Helpers
{

    /**
     * This endpoint fetches a priority ID through the priority name.
     * @param string $name
     * @return int
     *
     */
    public static function getPriorityId(string $name): int
    {
        $priority_id = Priority::where('name', $name)->pluck('id')->first();
        if (is_null($priority_id)) {
            throw new \Exception('Failed To Fetch priority ID');
        }

        return $priority_id;
    }

    /**
     * This endpoint fetches a priority Name through the priority ID.
     * @param int $priorityID
     * @return string
     *
     */
    public static function getPriorityName(int $priorityID): string
    {
        $priority = Priority::find($priorityID);
        if (is_null($priority)) {
            throw new \Exception('Failed To Fetch priority Name');
        }

        return $priority->name;
    }
}
