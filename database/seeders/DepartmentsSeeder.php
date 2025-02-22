<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::factory()
            ->count(10)
            ->create()
            ->each(function ($department) {
                Department::factory()
                    ->count(3)
                    ->withParent($department->id)
                    ->create();
            });

        //     $departments = [
        //         [
        //             'name' => 'Departamento de Recursos Humanos',
        //             'parent_id' => null,
        //             'level' => rand(1, 10),
        //             'employee_count' => rand(1, 100),
        //             'ambassador_name' => 'María Pérez',
        //         ],
        //         [
        //             'name' => 'Departamento de Finanzas',
        //             'parent_id' => null,
        //             'level' => rand(1, 10),
        //             'employee_count' => rand(1, 100),
        //             'ambassador_name' => 'José Ramírez',
        //         ],
        //         [
        //             'name' => 'Departamento de Tecnología',
        //             'parent_id' => null,
        //             'level' => rand(1, 10),
        //             'employee_count' => rand(1, 100),
        //             'ambassador_name' => 'Laura Martínez',
        //         ],
        //     ];

        //     Department::insert($departments);
    }
}
