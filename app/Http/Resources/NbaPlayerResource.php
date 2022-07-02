<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NbaPlayerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // determine the image filename from the name
        $fname = preg_replace('/\W+/', '-', strtolower($this->first_name));
        $lname = preg_replace('/\W+/', '-', strtolower($this->last_name));
        $image = $fname .'-'. $lname . '.png';

        return [
            "id"            => $this->id,
            "last_name"     => $this->last_name,
            "first_name"    => $this->first_name,
            "number"        => $this->number,
            "feet"          => $this->feet,
            "inches"        => $this->inches,
            "position"      => $this->position,
            "weight"        => $this->weight,
            "birthday"      => $this->birthday,
            "current_team"  => $this->current_team,
            "image"         => $image,
        ];
    }
}
