<table>
	<thead>
		<tr>
		<th>Nama Barang</th>
		<th>Stok Barang</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($products as $product)
			<tr>    
				<td>{{ $product->name }}</td>
				<td>{{ $product->stock }}</td>
			</tr>
		@endforeach
	</tbody>
</table>