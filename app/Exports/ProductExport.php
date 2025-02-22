<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function collection()
    {
        return collect([
            [
                'ID' => $this->product->id,
                'Name' => $this->product->name,
                'Detail' => $this->product->detail,
                'Created At' => $this->product->created_at,
            ]
        ]);
    }

    public function headings(): array
    {
        return ['ID', 'Name', 'Detail', 'Created At'];
    }
}
