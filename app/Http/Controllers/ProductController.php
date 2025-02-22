<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage; // Import this at the top
// Excel Export
use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;

///
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /*public function index(): View
    {
        $products = Product::latest()->paginate(5);
        return view('products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }*/
    /**
        * Display a listing of the resource & search.
     */
    public function index(Request $request): View
    {
        //  Get search keyword
        $search = $request->query('search');
        // Get start and end date
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');
        
        // Fetch products with search and date range filtering
        $products = Product::when($search, function ($query, $search) {
            return $query->where('name', 'LIKE', "%{$search}%")
                         ->orWhere('detail', 'LIKE', "%{$search}%");
        })
        ->when($startDate, function ($query, $startDate) {
            return $query->whereDate('created_at', '>=', $startDate);
        })
        ->when($endDate, function ($query, $endDate) {
            return $query->whereDate('created_at', '<=', $endDate);
        })
        ->latest()
        ->paginate(5);

        return view('products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(): View
    {
        return view('products.create');
    }
    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('featured_image')) {
            // Store the image in 'storage/app/uploads/' directory
            $imagePath = $request->file('featured_image')->store('uploads', 'public'); 
            $data['featured_image'] = $imagePath; // Save relative path in DB
        }

        Product::create($data);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */

    public function show(Product $product): View
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'detail']);

        if ($request->hasFile('featured_image')) {
            // Delete the old image if it exists
            if ($product->featured_image && Storage::disk('public')->exists($product->featured_image)) {
                Storage::disk('public')->delete($product->featured_image);
            }

            // Store the new image correctly in `storage/app/public/uploads/`
            $imagePath = $request->file('featured_image')->store('uploads', 'public');
            $data['featured_image'] = $imagePath; // Store only the relative path
        }

        // Update product
        $product->update($data);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
    /**
     * Export products to Excel file.Download the specified file.
     */
    
    /**
     * Download a single product as an Excel file.
     */
    public function downloadExcel(Product $product)
    {
        $fileName = 'Product-' . $product->id . '.xlsx';
        return Excel::download(new ProductExport($product), $fileName);
    }

    /**
     * Download all products as an Excel file.
     */
    public function downloadAllExcel(Product $product)
    {
        return Excel::download(new ProductsExport($product), 'All-Products.xlsx');
        //dd("Method is being accessed!");
    }
    
}
