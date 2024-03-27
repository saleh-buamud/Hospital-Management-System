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
        <div class="container-fluid page-body-wrapper">

            <div class="container" align="center" style="padding-top: 100px;">
                @if (session()->has('message'))
                    <div id="alert-message" class="alert alert-success alert-dismissible fade show text-center m-4"
                        role="alert" style="font-size: 25px;">
                        {{ session()->get('message') }}
                    </div>
                    <script>
                        setTimeout(function() {
                            var alertMessage = document.getElementById('alert-message');
                            alertMessage.style.display = 'none';
                        }, 4000); // 5000 milliseconds = 5 seconds
                    </script>
                @endif

                <h2 class="text-center p-3 display-2">All Doctors</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Speciality</th>
                            <th scope="col">Room</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doctors as $doctor)
                            <tr>
                                <th scope="row">{{ $doctor->name }}</th>
                                <td>{{ $doctor->phone }}</td>
                                <td>{{ $doctor->specialty }}</td>
                                <td>{{ $doctor->room }}</td>
                                <td><img src="images/{{ $doctor->image }}" alt="No"
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                </td>
                                <td>
                                    <a href="{{ url('deletedoctor', $doctor->id) }}" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this doctor?')">DELETE</a>
                                    <a href="{{ route('editdoctor', $doctor->id) }}"
                                        class="btn btn-info px-4 m-1">EDIT</a>
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
