<!DOCTYPE html>
<html lang="en">

<head>
<!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <title>Short Links Generator Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">



    <style>
        table td{
            padding:.40rem !important;
        }
        
        table{
            font-size:12px;
            font-weight:bold;
        }
        @media screen and (max-width:500px){
          .nav-item .collapsed{
            font-size:34px;
           }
            table{
                font-size:12px !important;
                width:250px !important;
                font-weight:bold;

            }
            table td{
                font-size:12px !important;

                width:10px;
                padding-top:.01rem !important;
                padding-bottom:.01rem !important;

            }
            .pl-4, .px-4 {
                padding:2px !important;
            }
          
        }
    </style>

</head>

<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
     
     
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>



<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
            aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small"
                        placeholder="Search for..." aria-label="Search"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </li>

    
    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
   

</ul>

</nav>
            

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

<div class="container" id="downloadarea">
    {{-- <h4 class="text-left " style="float:right"><a href="" class="btn btn-primary print" style="float:right">Print Report</a></h4> --}}

<table class="table table-bordered" style='width:100%'>
    <thead class="table-dark">
        <td>id</td>
        <td>Date</td>
        <td>name</td>
        <td>phone</td>
        <td>email</td>
        <td>address</td>
        <td>ip</td>
       
    </thead>
    <tbody>

    
        @foreach ( $myleads as $lead)
        <tr>
        <td>{{$lead->id}}</td>
        <td>{{$lead->created_at}}</td>
        <td >{{$lead->name}}</td>
        <td >{{$lead->phone}}</td>
        <td >{{$lead->email}}</td>
        <td >{{$lead->address}}</td>
        <td class="ip">{{$lead->ip}}</td>
        {{-- @if ($compain->compain_id ==1|$compain->compain_id ==2|$compain->compain_id ==3)
        <td >Short Link</td>
        @else
        <td >Form Link </td>

        @endif --}}
    </tr>
        @endforeach
    </tbody>
</table>
<div class="" style="margin-bottom:10px;">{{$myleads->links()}}</div>
<div id="print">
<a href="" class="btn btn-dark Download" style="float:right">Download Report</a>
</div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>


    
    let Download =document.querySelector('.Download')
    let Downloadtab =document.querySelector('#print')
    Download.addEventListener('click',function(e){
        e.preventDefault();
        Downloadtab.classList.add('hidden')
        window.jsPDF = window.jspdf.jsPDF;

var doc = new jsPDF();
window.html2canvas = html2canvas;

// Source HTMLElement or a string containing HTML.
var elementHTML = document.querySelector("#downloadarea");
doc.html(elementHTML, {
    callback: function(doc) {
        // Save the PDF
        doc.save('sample-document.pdf');
    },
    x: 15,
    y: 15,
    width: 170, //target width in the PDF document
    windowWidth: 650 //window width in CSS pixels
});
let delreq =new XMLHttpRequest();

delreq.onreadystatechange = function(){
    if(this.readyState ==4 && this.status==200){
      
      
    }
}
delreq.open('GET',"/deleteleads");

delreq.send();
// window.location.reload();

    })
    var ipAddress = document.querySelectorAll(".ip");
     let myip =Array.from(ipAddress)

myip.forEach(function(el){
    let x=el.innerText
    fetch('https://reallyfreegeoip.org/json/'+x)

// fetch('https://ipapi.co/'+ x +'/json/')
.then(function(response) {
  response.json().then(jsonData => {
    console.log(jsonData['city']);
    // let res =JSON.parse(this.responseText)
            el.innerText=jsonData['country_code']
  });
})
.catch(function(error) {
  console.log(error)
});
})

myip.forEach(function(el){
     let x=el.innerText
     var xhttp1 = new XMLHttpRequest();
    xhttp1.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(JSON.parse(this.responseText));
            let res =JSON.parse(this.responseText)
            el.innerText=res['country_name']
        }
    };
    xhttp1.open("GET", "https://ip-api.io/json/" + x, true);
    xhttp1.send();
})

</script>

<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>
