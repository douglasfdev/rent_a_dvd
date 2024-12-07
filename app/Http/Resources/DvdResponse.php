<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class DvdResponse extends JsonResource
{
    public ?int $statusCode;

    public function __construct($resource, ?int $statusCode = Response::HTTP_OK)
    {
        parent::__construct($resource);
        $this->statusCode = $statusCode;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'genre' => $this->genre,
            'disponibility' => $this->disponibility,
            'price' => $this->price,
            'description' => $this->description,
            'image' => $this->image,
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('dvds.show', $this->id)
                ],
                [
                    'rel' => 'put',
                    'href' => route('dvds.update', $this->id)
                ],
                [
                    'rel' => 'delete',
                    'href' => route('dvds.destroy', $this->id)
                ]
            ]
        ];
    }

    public function toResponse($request)
    {
        return response()->json($this->toArray($request), $this->statusCode);
    }
}