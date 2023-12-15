<!-- resources/views/users/index.blade.php -->

@extends('layouts.home')

@section('title', 'User List')
    
@section('content')
    <table class="display" id="userTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Unread Notifications</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    
@endsection

@section('page-js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#userTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("user.datatable") }}',
            columns: [
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'phone_number', name: 'phone_number' },
                { data: 'unread_notifications', name: 'unread_notifications'},
                { data: 'action', name: 'action' },
            ],
            initComplete: function () {
                this.api().columns().every(function () {
                    var column = this;
                    $('<input>').appendTo($(column.footer()).empty())
                        .on('keyup', function () {
                            column.search($(this).val()).draw();
                        });
                });
            }
        });
    });
</script>


@endsection
