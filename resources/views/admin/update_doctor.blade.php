

<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">

    <style>
      label{
        display: inline-block;
        width: 200px;
      }


    </style>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
     @include('admin.navbar')
     <div class="container-fluid page-body-wrapper">
      <div class="container" align="center" style="padding: 100px">
      <form action="{{ url('editdoctor', $data->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div style="padding: 15px;">
          <label>Doctor Name</label>
          <input style="color: black" type="text" name="name" value="{{ $data->name }}">
        </div>
        <div style="padding: 15px;">
          <label>Phone</label>
          <input style="color: black" type="number" name="phone" value="{{ $data->phone }}">
        </div>
        <div style="padding: 15px;">
          <label>Speciality</label>
          <input style="color: black" type="text" name="speciality" value="{{ $data->speciality }}">
        </div>
        <div style="padding: 15px;">
          <label>Doctor Name</label>
          <input style="color: black" type="text" name="room" value="{{ $data->room }}">
        </div>
        <div style="padding: 15px; margin-left:110px">
          <label>Old Image</label>
          <img height="120" width="120" src="doctorimage/{{ $data->image }}" alt="">
        </div>

        <div style="padding: 15px; margin-left:120px" >
          <label>Change Image</label>
          <input type="file" name="file">
        </div>
        <div style="padding: 15px;">
          
          <input type="submit" class="btn btn-primary">
        </div>

      </form>
      
      </div>

     </div>

     
     
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>