

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
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
     @include('admin.navbar')

     <div class="container-fluid page-body-wrapper">
      <div align="center" style="padding-top:100px; ">
        <table>
          <tr style="background-color: black;">
            <th style="padding: 10px">Doctor Name</th>
            <th style="padding: 10px">Phone</th>
            <th style="padding: 10px">Speciality</th>
            <th style="padding: 10px">Room No</th>
            <th style="padding: 10px">Image</th>
            <th style="padding: 10px">Delete</th>
            <th style="padding: 10px">Update</th>
        
          </tr>
          @foreach ($data as $d)
              
          <tr align="center">
            <td>{{ $d->name }}</td>
            <td>{{ $d->phone }}</td>
            <td>{{ $d->speciality }}</td>
            <td>{{ $d->room }}</td>
            <td><img height="90" width="90"  src="doctorimage/{{$d->image}}"></td>
            <td><a onclick="return confirm('Are You Sure ?')" class="btn btn-danger" href="{{ url('deletedoctor', $d->id) }}">Delete</a></td>
            <td><a class="btn btn-primary" href="{{ url('updatedoctor' , $d->id) }}">Update</a></td>
            
          </tr>
          
          @endforeach


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