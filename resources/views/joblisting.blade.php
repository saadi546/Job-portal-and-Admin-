<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>JobEntry - Job Portal Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

   

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('csss/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('csss/style.css')}}" rel="stylesheet">

    
</head>

<body>
    
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="{{route('home')}}" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">JobEntry</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="{{ route('home') }}" class="nav-item nav-link active" data-route="{{ route('home') }}">Home</a>
                    <a href="{{ route('jobs.index') }}" class="nav-item nav-link active" data-route="{{ route('jobs.index') }}">Job Listing</a>
                </div>
                
                @if (Auth::check())
                <li class="nav-item">
                    <a href="{{ route('admin') }}" class="nav-item" data-route="{{ route('admin') }}">Admin</a>    
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-item" data-route="{{ route('login') }}">Login</a>
                </li>
                @endif
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Job List</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Job List</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->

        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{asset('img/hero/about.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Get your job</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->

        <!-- Job List Area Start -->
        
        <div class="job-listing-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <!-- Left content -->
                    <div class="col-xl-3 col-lg-3 col-md-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="small-section-tittle2 mb-45">
                                    <div class="ion"> <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="20px" height="12px">
                                            <path fill-rule="evenodd"  fill="rgb(27, 207, 107)"
                                                d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z"/>
                                        </svg>
                                    </div>
                                    <h4>Filter Jobs</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Job Category Listing start -->
                        <div class="job-category-listing mb-50">
                            <div class="single-listing">
                                <div class="select-Categories pt-80 pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Job Type</h4>
                                    </div>
                                    <form method="GET" id="filterForm">
                                        @csrf
                                        <label class="container">Full Time
                                            <input type="checkbox" name="Job_nature[]" value="full_time" @if (request()->input('job_nature') === 'full_time') checked @endif>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container">Part Time
                                            <input type="checkbox" name="Job_nature[]" value="part_time" @if (request()->input('job_nature') === 'part_time') checked @endif>
                                            <span class="checkmark"></span>
                                        </label>
                                        
                                    
                                    

                                    <label for="location">Location</label>
                                    <select name="job_location" id="job_location">
                                        <option value="">Select Location</option>
                                        <option value="usa" @if (request()->input('job_location') === 'usa') selected @endif>Usa</option>
                                        <option value="new york" @if (request()->input('job_location') === 'new york') selected @endif>New York</option>
                                        <option value="canada" @if (request()->input('job_location') === 'canada') selected @endif>Canada</option>
                                        <option value="uk" @if (request()->input('job_location') === 'uk') selected @endif>UK</option>
                                        <option value="pakistan" @if (request()->input('job_location') === 'pakistan') selected @endif>Pakistan</option>
                                        <option value="washington" @if (request()->input('job_location') === 'washington') selected @endif>Washington</option>
                                        
                                    </select>
                                    
                                    <!-- Price Range Filter -->
                                    <div class="filter">
                                        
                                        <label for="min_salary">Minimum Salary</label>
                                        <input type="text" name="min_salary" id="min_salary" value="{{ request()->input('min_salary') }}">
                                        
                                        <label for="max_salary">Maximum Salary</label>
                                        <input type="text" name="max_salary" id="max_salary" value="{{ request()->input('max_salary') }}">
                                    </div>
                                    <button type="button" class="btn btn-primary" id="applyFiltersButton">Apply Filters</button>
                                </form>
                                <div id="loader" style="display: none;">
                                    <img src="{{asset('gif/Spinner-2.gif')}}" alt="Loading...">
                                </div>
                                
                                <!-- Add this hidden input field for the route URL -->
                                <input type="hidden" id="filterRoute" value="{{ route('jobs.filter') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Right content -->
                
                    <div class="col-xl-9 col-lg-9 col-md-8">
                        <!-- Featured_job_start -->
                        <section class="featured-job-area">
                            <div class="container">
                             

                                <!-- Count of Job list Start -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="count-job mb-35">
                                            <!-- Select job items start -->
                                            <div class="select-job-items">
                                                
                                            </div>
                                            <!--  Select job items End-->
                                        </div>
                                    </div>
                                </div>
                                <!-- Count of Job list End -->
                                <!-- single-job-content -->
                            <div id="dataContainer">
                                @foreach ($jobs as $job)
                                <div class="job-item p-4 mb-4">
                                    <!-- Your job item HTML for Featured jobs goes here -->
                                    <div class="row g-4">
                                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                            <!-- Display job image -->
                                            <img class="flex-shrink-0 img-fluid border rounded" src="{{ asset('images/' . $job->job_image) }}" alt="" style="width: 80px; height: 80px;">
                                            <div class="text-start ps-4">
                                                <!-- Display job title -->
                                                <h5 class="mb-3">{{ $job->job_title }}</h5>
                                                <!-- Display job location -->
                                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $job->job_location }}</span>
                                                <!-- Display job nature -->
                                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ $job->job_nature }}</span>
                                                <!-- Display salary -->
                                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>${{ number_format($job->salary, 2) }}</span>
                                            </div>
                                        </div>
                                        <!-- Add the provided code here -->
                                        <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                            <div class="d-flex mb-3">
                                                <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
                                                <a class="btn btn-primary" href="{{ route('jobs.detail', ['id' => $job->id]) }}">Apply Now</a>
                                            </div>
                                            <!-- Display published date -->
                                            <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: {{ $job->published_date }}</small>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                                <!-- single-job-content -->
                            </div>
                        </section>
                        <!-- Featured_job_end -->
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Job List Area End -->

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Company</h5>
                        <a class="btn btn-link text-white-50" href="">About Us</a>
                        <a class="btn btn-link text-white-50" href="">Contact Us</a>
                        <a class="btn btn-link text-white-50" href="">Our Services</a>
                        <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                        <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Quick Links</h5>
                        <a class="btn btn-link text-white-50" href="">Jobs Listing</a>
                        <a class="btn btn-link text-white-50" href="">Blog</a>
                        <a class="btn btn-link text-white-50" href="">Job Categories</a>
                        <a class="btn btn-link text-white-50" href="">Add Resume</a>
                        <a class="btn btn-link text-white-50" href="">Job by Location</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Newsletter</h5>
                        <p class="text-white-50 mb-4">Subscribe our newsletter to get updates about our services.</p>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control bg-dark border-white" placeholder="Email Address" aria-label="Email Address">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Subscribe</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Address</h5>
                        <p class="text-white-50">123, Second Avenue, New York, USA</p>
                        <p class="text-white-50">support@example.com</p>
                        <p class="text-white-50">+012 345 67890</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
    

    <!-- Scripts -->
    <script>
        
        $(document).ready(function() {
            $('#applyFiltersButton').on('click', function() {
               

                var formData = $('#filterForm').serialize();
                var routeUrl = $('#filterRoute').val();
                var minSalary = $('#min_salary').val();
                var maxSalary = $('#max_salary').val();
                var location = $('#job_location').val()
       
                var filterRoute = $('#filterRoute').val();
                routeUrl += '?min_salary=' + minSalary + '&max_salary=' + maxSalary + '&job_location=' + location;
                        
                $('#loader').show();

                // Send an Ajax request
                $.ajax({
                    type: 'GET',
                    url: routeUrl, 
                    data: formData,
                    success: function(data) {

                        $('#loader').hide();
                        const jobs = data.filteredJobs;
                        
                        //$('#dataContainer').html(jobs);
                        const jobContainer = $('#dataContainer'); // Container to display job items

                        // Clear existing job items
                        jobContainer.html('');

                        // Convert jobs data back to a string and put it in the container
                        //jobContainer.text(JSON.stringify(jobs));

                        // Loop through the JSON data and generate HTML for each job
                        for (var i = 0; i < jobs.length; i++) {
                        var jobData = jobs[i];
                        // Create a new job item container
                        var jobItem = $('<div>').addClass('col-sm-12 col-md-8 d-flex align-items-center job-item p-4 mb-4');

                        // Construct the HTML for the job item
                        jobItem.html(`
                            <!-- Display job image -->
                            <img class="flex-shrink-0 img-fluid border rounded" src="/images/${jobData.job_image}" alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <!-- Display job title -->
                                <h5 class="mb-3">${jobData.job_title}</h5>
                                <!-- Display job location -->
                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>${jobData.job_location}</span>
                                <!-- Display job nature -->
                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>${jobData.job_nature}</span>
                                <!-- Display salary -->
                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>$${parseFloat(jobData.salary).toFixed(2)}</span>
                            </div>
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                            <div class="d-flex mb-3">
                                                <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
                                                <a class="btn btn-primary" href="/jobdetails/${jobData.id}">Apply Now</a>
                                            </div>
                                            <!-- Display published date -->
                                            <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line:${jobData.published_date }</small>
                                        </div>
                        `);

                        // Append the job item to the job list container
                        jobContainer.append(jobItem);
                        }

                        
                        
                    },

                    error: function(xhr, status, error) {

                        $('#loader').hide();
                        console.error(error); 
                    }

                });
            });
        });
    </script>

            <!-- JavaScript Libraries -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="{{asset('lib/wow/wow.min.js')}}"></script>
            <script src="{{asset('lib/easing/easing.min.js')}}"></script>
            <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
            <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
       
             <!-- Template Javascript -->
             <script src="{{asset('jss/main.js')}}"></script>
    </div>
</body>

</html>
