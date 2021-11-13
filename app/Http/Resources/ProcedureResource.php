<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProcedureResource extends JsonResource
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
            'title' => $this->title,
            'department' => $this->department,
            'submitter' => $this->submitter,
            'created_at' => Carbon::parse($this->created_at)->isoFormat('D MMMM Y H:m:s'),
            'status' => $this->status,
        ];
    }
}
