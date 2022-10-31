

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
            <th style="padding: 10px">Customer Name</th>
            <th style="padding: 10px">Email</th>
            <th style="padding: 10px">Phone</th>
            <th style="padding: 10px">Doctor Name</th>
            <th style="padding: 10px">Date</th>
            <th style="padding: 10px">Message</th>
            <th style="padding: 10px">Status</th>
            <th style="padding: 10px">Approved</th>
            <th style="padding: 10px">Canceled</th>
          </tr>
          
          @foreach ($data as $d)
          <tr align="center" >
            
            <td  style="padding-right: 20px">{{ $d->name }}</td>
            <td style="padding-right: 20px">{{ $d->email }}</td>
            <td style="padding-right: 20px">{{ $d->phone }}</td>
            <td style="padding-right: 20px">{{ $d->doctor }}</td>
            <td style="padding-right: 20px">{{ $d->date }}</td>
            <td style="padding-right: 20px">{{ $d->message }}</td>
            <td style="padding-right: 20px">{{ $d->status }}</td>
            <td><a class="btn btn-success" href="{{ url('approved', $d->id) }}">Approve</a></td>
            <td><a class="btn btn-danger" href="{{ url('canceled' , $d->id) }}">Cancel</a></td>
            
          </tr>
          @endforeach
        </table>
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