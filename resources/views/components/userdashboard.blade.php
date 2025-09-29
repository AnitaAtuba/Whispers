 <!-- USER DASHBOARD -->
  <div class="container-fluid my-5">
    <div class="row my-5 ">
            <div class="col-md-10 offset-md-1">
               <div class="card">
  <div class="card-header d-flex justify-content-center align-items-center">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link " aria-current="true" href="{{route('dashboard')}}"><i class="fa-solid fa-bars"></i> Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard.create')}}"><i class="fa-solid fa-pen-to-square"></i> Write Whisper</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="{{route('dashboard.mywhispers')}}"><i class="fa-solid fa-list"></i> My whispers</a>
      </li>
     <li class="nav-item">
        <a class="nav-link"  href="{{route('dashboard.profile')}}"><i class="fa-solid fa-address-card"></i> Profile</a>
      </li>
    </ul>
  </div>