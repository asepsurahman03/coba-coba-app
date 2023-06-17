<!DOCTYPE html>
<html>
<head>
  <title>Multiple File Upload in Laravel 8</title>
 
  <meta name="csrf-token" content="{{ csrf_token() }}">
 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
</head>
<body>
 
<div class="container mt-5">
 
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
 
 
      <h2 class="text-center">Laravel 8 Multiple File Upload With Validation - Tutsmake</h2>
 
 
    <div class="text-center">
 
        <form name="images-upload" method="POST"  action="{{ url('images-upload') }}" accept-charset="utf-8" enctype="multipart/form-data">
 
          @csrf
                   
          <input type="checkbox" name="services[]" value="Pilihan 1"> Pilihan 1<br>
          <input type="checkbox" name="services[]" value="Pilihan 2"> Pilihan 2<br>
          <input type="checkbox" name="services[]" value="Pilihan 3"> Pilihan 3<br>
 
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="file" name="image[]" placeholder="Choose image" multiple >
                    </div>
                    @error('image')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                   
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                </div>
            </div>     
        </form>
 
    </div>
 
 
</div>  
</body>
</html>