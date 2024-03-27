{{-- <x-app-layout>
</x-app-layout> --}}
{{-- <li class="nav-item">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-primary ml-lg-3">Logout</button>
    </form>
</li> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid">
            <div class="container-fluid" align="center" style="padding-top: 100px;">
                <table class="table table-sm">
                    <thead class="text-white text-center table-hover bold display-2">
                        <tr align="center text-center text-white">
                            <th scope="col" style="color:white;padding:10px;">Customer Name</th>
                            <th scope="col" style="color:white;padding:10px;">Email</th>
                            <th scope="col" style="color:white;padding:10px;">Date</th>
                            <th scope="col" style="color:white;padding:10px;">Phone</th>
                            <th scope="col" style="color:white;padding:10px;">Message</th>
                            <th scope="col" style="color:white;padding:10px;">Status</th>
                            <th scope="col" style="color:white;padding:10px;">Approved</th>
                            <th scope="col"style="color:white;padding:10px;">Cancel</th>
                            <th scope="col" style="color:white;padding:10px;">Send Email</th>
                        </tr>
                    </thead>
                    <tbody class="text-white text-center table-hover bold">
                        @foreach ($appointments as $appoint)
                            <tr align="center">
                                <td style="padding: 10px;">{{ $appoint->name }}</td>
                                <td style="padding: 10px;">{{ $appoint->email }}</td>
                                <td style="padding: 10px;">{{ $appoint->date }}</td>
                                <td style="padding: 10px;">{{ $appoint->phone }}</td>
                                <td style="padding: 10px;">{{ $appoint->message }}</td>
                                <td style="padding: 10px;">{{ $appoint->status }}</td>
                                <td>
                                    <a href="{{ url('approve_appoint', $appoint->id) }}"
                                        class="btn btn-success">Approved</a>
                                </td>
                                <td>
                                    <a href="{{ url('cancel_appoint', $appoint->id) }}"
                                        class="btn btn-danger">Cancel</a>
                                </td>
                                <td>
                                    <a href="{{ route('emailview', $appoint->id) }}" class="btn btn-primary">Send
                                        Email</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
</body>

</html>
