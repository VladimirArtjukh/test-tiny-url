<h1>Products</h1>
<form method="GET">
    @csrf
    <select name="sort_by">
        <option value="name">Name</option>
        <option value="price">Price</option>
    </select>
    <select name="direction">
        <option value="asc">Ascending</option>
        <option value="desc">Descending</option>
    </select>
    <button type="submit">Sort</button>
</form>
@foreach ($products as $product)
    <div>
        <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
        - ${{ $product->price }}
        @if ($product->is_top) (Top) @endif
    </div>
@endforeach
{{ $products->withQueryString()->links() }}
