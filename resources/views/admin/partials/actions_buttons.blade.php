<a href="{{ route($routeEdit,$id) }}" class="btn btn-info"><i class="fas fa-edit"></i> Editar</a>
<form action="{{ route($routeDelete, $id) }}" method="POST" style="display:inline;">
	@method('DELETE')
	@csrf()
	<button class="btn btn-danger delete_record"><i class="fas fa-trash"></i> Eliminar</button>
</form>