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

        <div class="container-sm text-center mt-3">

            <h3 class="p-3 mb-3 bg-dark border">Send Email</h3>
            <div class="mt-3">
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
            </div>
            <form action="{{ route('sendemail', $data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="greeting">Greeting</label>
                    <input type="text" class="form-control" id="greeting" name="greeting" placeholder="greeting"
                        required>
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <input type="text" class="form-control" id="body" name="body" placeholder="Enter body"
                        required>
                </div>
                <div class="form-group">
                    <label for="actiontext">Action text</label><br>
                    <input type="text" class="form-control" id="actiontext" name="actiontext"
                        placeholder="Action text" required>
                </div>
                <div class="form-group">
                    <label for="actionurl">Action url</label><br>
                    <input type="text" class="form-control" id="actionurl" name="actionurl" placeholder="Action url"
                        required>
                </div>
                <div class="form-group">
                    <label for="endpart">End Part</label>
                    <input type="text" class="form-control" id="endpart" name="endpart" required
                        placeholder="End Part">
                </div>
                <input type="submit" class="btn btn-primary" value="Send Email">
            </form>
        </div>

    </div>

    <!-- partial -->

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
</body>

</html>
