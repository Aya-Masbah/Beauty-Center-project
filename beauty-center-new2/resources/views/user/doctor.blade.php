<div class="page-section">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp">Our Specialists</h1>

        <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
            @foreach($employee as $employees)
            <div class="item">
                <div class="card-doctor">
                    <div class="header">
                        <img height="300 px" src="employeeimage/{{$employees->image}}" alt="">
                        <div class="meta">
                            <a href="#"><span class="mai-call"></span></a>
                            <a href="#"><span class="mai-logo-whatsapp"></span></a>
                        </div>
                    </div>
                    <div class="body">
                        <p class="text-xl mb-0">{{$employees->name}}</p> <br>
                        <span class="text-sm text-grey">{{$employees->service}}</span><br>
                        <span class="text-sm text-grey">{{$employees->numero_telephone}}</span><br>
                        <span class="text-sm text-grey">{{$employees->email}}</span>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>