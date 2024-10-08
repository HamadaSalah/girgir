@extends('layouts.app')
@section('title' , 'Packages')

@push('css')
<link rel="stylesheet" href="{{ asset('') }}css/bootstrap.css" />
<link rel="stylesheet" href="{{ asset('') }}css/NewBorn.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endpush

@section('content')

<div class="divide">

    <!-- DashBoard -->

    <aside>
        <ul>
            <li>birthday <i class="fa-solid fa-crown"></i></li>
            <li>new born <i class="fa-solid fa-face-smile"></i></li>
            <li>baby gender <i class="fa-solid fa-mars-and-venus"></i></li>
            <li>wedding <img style="width: 25px;height: 25px;" src="./imgs/wpf_wedding-cake.png" alt=""></li>
            <li>more <i class="fa-solid fa-arrow-down"></i></li>
        </ul>
    </aside>

    <div>
        <!-- New born  section-->
        <div class="newBorn">
            <h1>New born</h1>
            <div class="myCards">
                <div class="myCard">
                    <div class="image">
                        <img src="././imgs/new born.jpeg">
                        
                    </div>
                    <div class="info">
                        <div class="header">
                            <h1>Pink Theme Wedding</h1>
                            <span><i class="fa-solid fa-star"></i>4.8</span>
                        </div>
                        <p>Name shop : <span>kareem evee</span></p>
                        <p>details</p>
                        <span>100 guestes, DJ, music drinks decor</span>
                        <span>100 guestes, DJ, music drinks decor</span>
                        <p>provider type : <span>company</span></p>
                        <span> from / 100$</span>
                        <button>Discover now</button>
                    </div>
                </div>
                <div class="myCard">
                    <div class="image">
                        <img src="././imgs/new born.jpeg">
                        
                    </div>
                    <div class="info">
                        <div class="header">
                            <h1>Pink Theme Wedding</h1>
                            <span><i class="fa-solid fa-star"></i>4.8</span>
                        </div>
                        <p>Name shop : <span>kareem evee</span></p>
                        <p>details</p>
                        <span>100 guestes, DJ, music drinks decor</span>
                        <span>100 guestes, DJ, music drinks decor</span>
                        <p>provider type : <span>company</span></p>
                        <span> from / 100$</span>
                        <button>Discover now</button>
                    </div>
                </div>
            </div>
            <div class="col-12 btnmore">
              <a href="" class="btnformore"><button>Find Out More <img style="width: 20px;" src="././imgs/Arrow 3.png" alt=""></button></a> 
            </div>            </div>

        <!-- baby gender  section-->

        <div class="newBorn">
            <h1>baby gender</h1>
            <div class="myCards">
                <div class="myCard">
                    <div class="image">
                        <img src="././imgs/new born.jpeg">

                    </div>
                    <div class="info">
                        <div class="header">
                            <h1>Pink Theme Wedding</h1>
                            <span><i class="fa-solid fa-star"></i>4.8</span>
                        </div>
                        <p>Name shop : <span>kareem evee</span></p>
                        <p>details</p>
                        <span>100 guestes, DJ, music drinks decor</span>
                        <span>100 guestes, DJ, music drinks decor</span>
                        <p>provider type : <span>company</span></p>
                        <span> from / 100$</span>
                        <button>Discover now</button>
                    </div>
                </div>
                <div class="myCard">
                    <div class="image">
                        <img src="././imgs/new born.jpeg">

                    </div>
                    <div class="info">
                        <div class="header">
                            <h1>Pink Theme Wedding</h1>
                            <span><i class="fa-solid fa-star"></i>4.8</span>
                        </div>
                        <p>Name shop : <span>kareem evee</span></p>
                        <p>details</p>
                        <span>100 guestes, DJ, music drinks decor</span>
                        <span>100 guestes, DJ, music drinks decor</span>
                        <p>provider type : <span>company</span></p>
                        <span> from / 100$</span>
                        <button>Discover now</button>
                    </div>
                </div>
                <div class="col-12 btnmore">
                  <a href="" class="btnformore"><button>Find Out More <img style="width: 20px;" src="././imgs/Arrow 3.png" alt=""></button></a> 
                </div>                </div>
        </div>

        <!-- wedding  section-->

        <div class="newBorn">
            <h1>wedding</h1>
            <div class="myCards">
                <div class="myCard">
                    <div class="image">
                        <img src="././imgs/new born.jpeg">

                    </div>
                    <div class="info">
                        <div class="header">
                            <h1>Pink Theme Wedding</h1>
                            <span><i class="fa-solid fa-star"></i>4.8</span>
                        </div>
                        <p>Name shop : <span>kareem evee</span></p>
                        <p>details</p>
                        <span>100 guestes, DJ, music drinks decor</span>
                        <span>100 guestes, DJ, music drinks decor</span>
                        <p>provider type : <span>company</span></p>
                        <span> from / 100$</span>
                        <button>Discover now</button>
                    </div>
                </div>
                <div class="myCard">
                    <div class="image">
                        <img src="././imgs/new born.jpeg">

                    </div>
                    <div class="info">
                        <div class="header">
                            <h1>Pink Theme Wedding</h1>
                            <span><i class="fa-solid fa-star"></i>4.8</span>
                        </div>
                        <p>Name shop : <span>kareem evee</span></p>
                        <p>details</p>
                        <span>100 guestes, DJ, music drinks decor</span>
                        <span>100 guestes, DJ, music drinks decor</span>
                        <p>provider type : <span>company</span></p>
                        <span> from / 100$</span>
                        <button>Discover now</button>
                    </div>
                </div>
                <div class="col-12 btnmore">
                <a href="" class="btnformore"><button>Find Out More <img style="width: 20px;" src="././imgs/Arrow 3.png" alt=""></button></a> 
              </div>
              </div>
        </div>
    </div>


</div>


@endsection

