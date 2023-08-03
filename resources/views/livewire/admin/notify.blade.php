<div class="table-responsive">
    <table class="table table-striped text-center">
        <thead>
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>Status</th>
        </tr>
        </thead>

        <tbody>
        @foreach($notifications as $notification)
            <tr>
                <td>{{ $notification->id }}</td>
                <td>{{ json_encode($notification->data) }}</td>
                <td>{{ is_null($notification->read_at) ? 'Not Read' : 'Read' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
