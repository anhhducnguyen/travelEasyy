<!DOCTYPE html>
<html>
<head>
    <title>Add Customer</title>
</head>
<body>

    <div class="container">
        <h1>Add Customer</h1>
        <form action="{{ route('admin.customer.store') }}" method="POST">
            @csrf
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                @if ($errors->has('name'))
                    <span>{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span>{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                @if ($errors->has('password'))
                    <span>{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div>
                <label for="role">Role:</label>
                <input type="text" id="role" name="role" value="user" required>
                @if ($errors->has('role'))
                    <span>{{ $errors->first('role') }}</span>
                @endif
            </div>
            <div>
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required>
                @if ($errors->has('phone'))
                    <span>{{ $errors->first('phone') }}</span>
                @endif
            </div>
            <div>
                    <label for="city">City</label>
                    <select class="form-select form-select-sm mb-3" id="city" name="city">
                        <option value="" selected>Chọn tỉnh thành</option>
                    </select>
                </div>

                <div>
                    <label for="district">District</label>
                    <select class="form-select form-select-sm mb-3" id="district" name="district">
                        <option value="" selected>Chọn quận huyện</option>
                    </select>
                </div>

                <div>
                    <label for="ward">Ward</label>
                    <select class="form-select form-select-sm" id="ward" name="ward">
                        <option value="" selected>Chọn phường xã</option>
                    </select>
                </div>

                <div>
                    <label for="detailAddress">Detail Address</label>
                    <input type="text" id="detailAddress" name="detailAddress">
                </div>
            <button type="submit">Add User</button>
        </form>
    </div>
    
    <script src="{{ asset('assets/js/api.js') }}"></script>
</body>
</html>










<!-- 
<!DOCTYPE html>
<html>
<head>
    <title>Create New Tour Guide</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
</head>
<body>
    <div class="container">
        <header>
            <h1>Admin Dashboard</h1>
            <nav>
                <ul>
                    <li><a href="{{ route('admin.tourguides.index') }}">Manage Tour Guides</a></li>
                    <li><a href="{{ route('admin.tourguides.create') }}">Create Tour Guide</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <h2>Create New Tour Guide</h2>

            <form action="{{ route('admin.tourguides.store') }}" method="POST">
                @csrf
                <div>
                    <label for="idTourGuide">Tour Guide ID</label>
                    <input type="text" id="idTourGuide" name="idTourGuide" required>
                </div>

                <div>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name">
                </div>

                <div>
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone">
                </div>

                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">
                </div>

                <div>
                    <label for="city">City</label>
                    <select class="form-select form-select-sm mb-3" id="city" name="city">
                        <option value="" selected>Chọn tỉnh thành</option>
                    </select>
                </div>

                <div>
                    <label for="district">District</label>
                    <select class="form-select form-select-sm mb-3" id="district" name="district">
                        <option value="" selected>Chọn quận huyện</option>
                    </select>
                </div>

                <div>
                    <label for="ward">Ward</label>
                    <select class="form-select form-select-sm" id="ward" name="ward">
                        <option value="" selected>Chọn phường xã</option>
                    </select>
                </div>

                <div>
                    <label for="detailAddress">Detail Address</label>
                    <input type="text" id="detailAddress" name="detailAddress">
                </div>

                <button type="submit">Create Tour Guide</button>
            </form>
        </main>
    </div>
    <script src="{{ asset('assets/js/api.js') }}"></script>
</body>
</html>
 -->
