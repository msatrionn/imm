<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::where('level', '!=', 'admin')->get();
    }
    public function headings(): array
    {
        return [
            'no',
            'username',
        ];
    }

    public function map($user): array
    {
        return [
            $user->$i,
            $user->username,

        ];
    }
}
