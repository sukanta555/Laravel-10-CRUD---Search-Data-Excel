<?php
namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Product::select('id', 'name', 'detail', 'created_at')->get();
    }

    public function headings(): array
    {
        return ['ID', 'Name', 'Detail', 'Created At'];
    }
}
