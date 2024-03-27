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

        <div class="container text-center mt-5">
            <h3 class="p-3 mb-3 bg-dark border mt-5">Add Doctor</h3>

            <form action="{{ url('upload_doctor') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-5">
                    <label for="name">Doctor Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Enter doctor name" required>
                </div>
                <div class="form-group mt-5">
                    <label for="tel">Phone</label>
                    <input type="tel" class="form-control" id="tel" name="phone"
                        placeholder="Enter phone number" required>
                </div>
                <div class="input-group mb- mt-5">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Speciality:</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="specialty">
                        <option selected>-- Select Speciality --</option>
                        <option value="Skin">Skin</option>
                        <option value="Heart">Heart</option>
                        <option value="Eye">Eye</option>
                    </select>
                </div>


                <div class="form-group mt-5">
                    <label for="room">Room no</label>
                    <input type="text" class="form-control" id="room" name="room"
                        placeholder="Enter room number" required>
                </div>
                <div class="form-group mt-5">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image" required
                        placeholder="Enter image">
                </div>
                <input type="submit" class="btn btn-primary" value="Add Doctor">
            </form>
        </div>
    </div>

    <!-- partial -->

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
</body>

</html>
