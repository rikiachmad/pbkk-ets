<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'magazine' => $this->when($this->magazine != null, new MagazineResource($this->whenLoaded('magazine'))),
            'paper' => $this->when($this->paper != null, new PaperResource($this->whenLoaded('paper'))),
            'textbook' => $this->when($this->textbook != null, new TextbookResource($this->whenLoaded('textbook'))),
            'thesis' => $this->when($this->thesis != null, new ThesisResource($this->whenLoaded('thesis'))),
            'name' => $this->name,
            'slug' => $this->slug,
            'publisher' => $this->publisher,
            'year_published' => $this->year_published,
            'description' => $this->description,
        ];
    }
}
