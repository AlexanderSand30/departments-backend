<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'key' => $this->id,
            'division' => $this->name,
            'upperDivision' => $this->parent?->name ?? '-',
            'collaborator' => (int)$this->employee_count,
            'level' => (int) $this->level,
            'subdivisions' => $this->subdepartments->count(),
            'ambassador' => $this->ambassador_name ?? '-'
        ];
    }
}
