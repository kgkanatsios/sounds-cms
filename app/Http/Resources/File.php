<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class File extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'type' => 'files',
                'file_id' => $this->id,
                'attributes' => [
                    'title' => $this->title,
                    'file' => asset('storage/' . $this->file),
                ],
            ],
            'links' => [
                'self' => url('/api/files/' . $this->id)
            ]
        ];
    }
}
