@extends('layouts')

@section('content')

    <section class="bgimage" id="home">
        <div class="overlay"></div>
        <div class="container-fluid">
            <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hero-text">
                <h2 class="hero_title">Home Base of Fingerstyle</h2>
                <p class="hero_desc">We're selling Tabs and Guitar</p>
            </div>
            </div>
        </div>
    </section>
    <!-- about section-->
    <section id="about">
        <div class="container mt-4 pt-4">
            <h1 class="text-center">About Us</h1>
            <div class="row mt-4">
                <div class="col-lg-4 d-flex justify-content-center">
                    <img src="{{ asset('images/pngegg.png') }}" class= "imageAboutPage" style="height: 500px; width: 200px">
                </div>

                <div class="col-lg-8">
                    <h4>Why GuiGuitaran Was Made</h3>
                    <p>Fingerstyle is a young style of guitar rising in popularity. Due to its infancy in history, it is not an officially recognized style of guitar by most music conservatories and is not documented heavily on. As a consequence, many avid learners of the style teach themselves without guidance.</p>
                    <p>GuiGuitaran aims to have more than just fingerstyle techniques in the future. It is programmed to save items from any 'library' within the web app. Currently, Tabs is the only library that has actual content. Future libraries can include information such as audio mixing and equipment. Currently, the Audio Production library is being made, and will be released in parts</p>
                    <p>GuiGuitaran does not have a curriculum but any user can make one through the usage of it's saving and sharing functionality. For example, a GuiGuitaran shared by a musician gives their fans direct access to the specific tutorials necessary for them to learn in order to play their songs.</p>
                    </div>
                </div>
            </div>
    </section>
    <!-- services section-->
    <section id="services">
        <div class="container mt-5">
            <h1 class="text-center">Tabs</h1>
            <div class="row">
                @foreach ($tabs as $tab)
                    <div class="col-lg-4 mt-4">
                        <a href="{{ route('tabs.show', $tab->id) }}">
                        <div class="card servicesText">
                            <img src="{{ asset('images/' . $tab->images) }}" class="tab-cover">
                            
                            <div class="card-body">
                                <h4 class="card-title">{{ $tab->title }}</h4>
                                <p class="card-text mt-3">{{ $tab->description }}</p>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-end mt-4">
                <button class="btn btn-primary" onclick="window.location='{{ route('tabs.index') }}'">See More</button>
            </div>
        </div>
    </section>

    <!-- portfolio section-->
    <section class="custom-margin-small">
  <div class="container py-5">
    <h1 class="text-center mb-5">Guitar List</h1>

    <div class="row">
        @foreach($guitars as $guitar)
      <div class="col-lg-4 col-md-12 mb-4">
        <div class="bg-image hover-zoom ripple shadow-1-strong rounded">
          <img src="{{ asset('images/' . $guitar->images) }}" style="float: left;
    width: 100%;
    height: 200px;
    object-fit: cover;" />
          <a href="{{ route('guitars.show', $guitar->id) }}">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
              <div class="d-flex justify-content-start align-items-start h-100">
                <h5><span class="badge bg-light pt-2 ms-3 mt-3 text-dark">${{ $guitar->price }}</span></h5>
              </div>
            </div>
            <div class="hover-overlay">
              <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
            </div>
          </a>
        </div>
      </div>
      @endforeach
    </div>
    <div class="d-flex justify-content-end mt-4">
                <button class="btn btn-primary" onclick="window.location='{{ route('guitars.index') }}'">See More</button>
            </div>
  </div>
</section>
    
@endsection