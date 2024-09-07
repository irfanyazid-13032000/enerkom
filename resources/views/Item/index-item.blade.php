<!DOCTYPE html>
<html>

<head>
    <title>Film kesukaanku</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>

.odd,.even{
    font-weight:bold
}

.odd{
    background-color:#FFB9B9;
    color:#1B2430;
}

.even{
    background-color:#AAC4FF;
    color:#0F0E0E;
}

thead{
    background-image: linear-gradient(to right, #2192FF , #F7EC09);

}
    
</style>
</head>

<body>


<div class="modalnya"></div>

    <div class="container mt-5">
        <table class="table table-bordered yajra-datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Stock</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <a onclick="addModal()" class="btn btn-primary">Add</a>
    </div>




</body>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(function() {

        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('items.all') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'stock',
                    name: 'stock'
                },
                {
                    data: 'category.name',
                    name: 'category'
                },

                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },

            ]
        });

    });



    function editModal(id) {
         $.ajax({
        method:'get',
        url:'{{ url("item/edit/")}}/'+id,
        success:function (res) {
            $('.modalnya').html(res);
            // alert("berhasil request loh");
        }
      })
    }

    function addModal() {
         $.ajax({
        method:'get',
        url:'{{ url("item/create/")}}',
        success:function (res) {
            $('.modalnya').html(res);
            // console.log(res);
            // alert("berhasil request loh");
        }
      })
    }

    function konfirmasi(id) {
        Swal.fire({
        title: 'Apakah kamu yakin untuk menghapus ini?',
        text: "Jika dihapus maka tidak akan mungkin dikembalikan!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#ADA2FF',
        cancelButtonColor: '#FB2576',
        confirmButtonText: 'IYA DONK'
        }).then((result) => {
        if (result.isConfirmed) {
        Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
        )
        $.ajax({
            method:'get',
        url:'{{ url("item/destroy/")}}/'+ id,
        success:function (res) {
            // console.log(res);
        location.reload();
            // alert("berhasil request loh");
        }
    });
};

        })
    }
    
    

  
    
    

</script>

</html>
