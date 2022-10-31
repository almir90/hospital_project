

<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style type="text/css">
    label
    {
      display: inline-block;
      width: 200px;
    }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
 
     @include('admin.navbar')
     
     <div class="container-fluid page-body-wrapper">
     <div class="container" align="center" style="padding-top: 100px" >
  
        <form action="{{ url('upload_doctor') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div style="padding: 15px">
          <label for="">Doctor Name</label>
          <input type="text" style="color:black" name="name" placeholder="Write Name" required>
        </div>
          <div style="padding: 15px">
          <label for="">Phone</label>
          <input type="number" style="color:black" name="phone" placeholder="Write Phone Number" required>
        </div>
          <div style="padding: 15px">
          <label for="">Speciality</label>
          <select name="speciality" style="color: black; width:212px"  id="" required>
            <option>--Select--</option>
            <option value="skin">Skin</option>
            <option value="heart">Heart</option>
            <option value="eye">Eye</option>
            <option value="ortopedic">Ortopedic</option>
          </select>
        </div>
          <div style="padding: 15px">
          <label for="">Doctor Room No</label>
          <input type="text" style="color:black" name="room" placeholder="Write Room Number" required>
        </div>
          <div style="padding: 15px; margin-left:115px">
          <label for="">Doctor Image</label>
          <input type="file" name="file" required>
        </div>
          <div style="padding: 15px">
          
          <input type="submit" class="btn btn-success">
        </div>
        </form>
      </div>




      </div>
        
    
    
    @include('admin.script')
  
  </body>
</html>