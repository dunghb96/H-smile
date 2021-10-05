<button type="button" onclick="confirmDelete('{{ $route ?? '#' }}', '{{ $id ?? 0 }}', '{{ csrf_token() }}');" class="btn btn-danger waves-effect waves-light btn-danger mb-1" title="Delete">
Xóa
</button>
