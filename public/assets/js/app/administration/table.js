$(document).ready(function () {


    $('#myTable').DataTable({
        ajax: "{{ route('getUsers') }}",
        "columns":[
            {data:'id'},
            {data:'name'},
            {data:'email'},
        ]
    });

});