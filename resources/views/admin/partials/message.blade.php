<script>
    $(document).ready(function(){
        $("table").DataTable();
        @if(Session::get('success'))
            Swal.fire({
              position: 'top-end',
              type: 'success',
              title: '{{ Session::get("success") }}',
              showConfirmButton: false,
              timer: 2500
            });
        @endif

        @if(Session::get('errors'))
            Swal.fire({
              position: 'top-end',
              type: 'error',
              title: '{{ Session::get("error") }}',
              showConfirmButton: false,
              timer: 2500
            });
        @endif

        $("body").on('click','button.delete_record', function(){
            if(confirm("Estas seguro de eliminar este Registro?")){
                return true;
            }else{
                return false;
            }
        });
    });
</script>