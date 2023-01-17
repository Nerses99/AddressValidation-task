<!DOCTYPE html>
<html lang="">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>FOrm Validation</title>
</head>
<body>
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Login</h3>
                        <div class="card-body">
                            <form method="POST" action="{{ route('check') }}">
                                @csrf
                                @isset($error)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <span class="error">{{ $error }}</span>
                                    </div>
                                @endisset
                                <div class="form-group mb-3">
                                    <label for="street">Street</label>
                                    <input
                                        type="text"
                                        placeholder="Street"
                                        id="street"
                                        class="form-control"
                                        name="street"
                                        required
                                        autofocus
                                        @if (isset($data)) value="{{$data->Address1 . $data->Address2}}" @endif
                                    >
                                    @if ($errors->has('street'))
                                        <span class="text-danger">{{ $errors->first('street') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <label for="city">City</label>
                                    <input
                                        type="text"
                                        placeholder="City"
                                        id="city"
                                        class="form-control"
                                        name="city"
                                        required
                                        @if (isset($data) && $data->City) value="{{$data->City}}" @endif
                                    >
                                    @if ($errors->has('city'))
                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <label for="state">State</label>
                                    <input
                                        type="text"
                                        placeholder="State"
                                        id="state"
                                        class="form-control"
                                        name="state"
                                        required
                                        @if (isset($data) && $data->State) value="{{$data->State}}" @endif
                                    >
                                    @if ($errors->has('state'))
                                        <span class="text-danger">{{ $errors->first('state') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <label for="zip_code">Zip Code</label>
                                    <input
                                        type="text"
                                        placeholder="Zip Code"
                                        id="zip_code"
                                        class="form-control"
                                        name="zip_code"
                                        required
                                        @if (isset($data) && $data->Zip5) value="{{$data->Zip5}}" @endif
                                    >
                                    @if ($errors->has('zip_code'))
                                        <span class="text-danger">{{ $errors->first('zip_code') }}</span>
                                    @endif
                                </div>

                                <div class="d-grid mx-auto">
                                    <button type="submit" value="check" name="action" class="btn btn-dark btn-block">Check</button>
                                    <button type="submit" value="save" name="action" class="btn btn-primary btn-block mt-2">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
