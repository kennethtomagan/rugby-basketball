<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RugbyPlayerResource extends JsonResource
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
        $image =  preg_replace('/\W+/', '-', strtolower($this->name)) . '.png';
        // split first & last name
        $names = collect(preg_split('/\s+/', $this->name));
        $lastName = $names->pop();
        $firstName = $names->join(' ');

        return [
            "id"            => $this->id,
            "last_name"     => $lastName,
            "first_name"    => $firstName,
            "tries"         => $this->tries,
            "games"         => $this->games,
            "number"        => $this->number,
            "position"      => $this->position,
            "points"        => $this->points,
            "height"        => $this->height,
            "age"           => $this->age,
            "conversions"   => $this->conversions,
            "weight"        => $this->weight,
            "penalties"     => $this->penalties,
            "image"         => $image,
            "featured"      => [
                ['label' => 'Points',   'value' => $this->points],
                ['label' => 'Games',    'value' => $this->games],
                ['label' => 'Tries',    'value' => $this->tries],
            ],
        ];

        return parent::toArray($request);
    }
}
