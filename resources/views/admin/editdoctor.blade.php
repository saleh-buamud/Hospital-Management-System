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
    <base href="/public">
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
            <div class="container pt-5 text-center ">
                <div class="container text-center mt-5">
                    <h3 class="p-3 mb-3 bg-dark border mt-5">Edit Doctor</h3>

                    <form action="{{ route('updatedoctor', $doctor->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mt-5">
                            <label for="name">Doctor Name</label>
                            <input type="text" class="form-control" value="{{ $doctor->name }}" id="name"
                                name="name" placeholder="Enter doctor name" required>
                        </div>
                        <div class="form-group mt-5">
                            <label for="tel">Phone</label>
                            <input type="tel" class="form-control" value="{{ $doctor->phone }}" id="tel"
                                name="phone" placeholder="Enter phone number" required>
                        </div>
                        <div class="input-group mb- mt-5">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Speciality:</label>
                            </div>
                            <label for="Specialty">Specialty</label>
                            <input type="text" name="specialty" id="specialty" value="{{ $doctor->specialty }}">
                        </div>


                        <div class="form-group mt-5">
                            <label for="room">Room no</label>
                            <input type="text" class="form-control" value="{{ $doctor->room }}" id="room"
                                name="room" placeholder="Enter room number" required>
                        </div>
                        <div class="form-group mt-5">
                            <label for="image"> Old Image</label><br>
                            <img src="images/{{ $doctor->image }}" width="100px" height="100px" alt="">
                        </div>
                        <div class="form-group mt-5">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Update">
                    </form>
                </div>
            </div>


        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
</body>

</html>
