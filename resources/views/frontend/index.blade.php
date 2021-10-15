@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
    <link href="{{ url('css/index.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container index" style="margin-top: 9rem;">
        <div class="row side-links">

            <div class="col-3 left">
                <a class="btn custom-shadow w-100 mb-3"><img src="{{ url('img/frontend/index/location-pin.png') }}" alt="" class="me-3">Find a Land</a>
                <a class="btn custom-shadow w-100 mb-3"><img src="{{ url('img/frontend/index/house.png') }}" alt="" class="me-3">Build Your House</a>
                <a class="btn custom-shadow w-100 mb-3"><img src="{{ url('img/frontend/index/livingroom.png') }}" alt="" class="me-3">Interior Designs</a>
                <a class="btn custom-shadow w-100 mb-3"><img src="{{ url('img/frontend/index/mortgage.png') }}" alt="" class="me-3">Mortgages</a>
                <a class="btn custom-shadow w-100 mb-3"><img src="{{ url('img/frontend/index/compass.png') }}" alt="" class="me-3">Vaastu</a>
            </div>

            <div class="col-6 center">
                <form>
                    <div class="input-group">
                        <input type="text" name="search_keyword" class="form-control p-3 rounded-0" aria-label="search" data-bs-toggle="modal" data-bs-target="#exampleModal" placeholder="Search">

                        <button type="submit" class="btn text-white rounded-0" style="background-color : #35495E;"><i class="fas fa-search"></i></button>
                    </div>
                </form>

                <div class="row mt-3 scroll-box">
                    <div class="col-12 mb-3" style="padding-right: 10px;">
                        <img src="{{ url('img/frontend/index/blog.png') }}" alt="" class="img-fluid w-100" style="object-fit: cover; height: 20rem;">
                    </div>

                    <div class="col-12 mb-3" style="padding-right: 10px;">
                        <h5 class="fw-bold" style="font-size: 1.15rem;">08 common interview questions and answers - Job Interview Skills</h5>

                        <div class="row mt-2">
                            <div class="col-5">
                                <div class="row">
                                    <div class="col-6 pe-0">
                                        <p style="font-size: 0.8rem">18,719,690 views</p>
                                    </div>
                                    <div class="col-6">
                                        <p style="font-size: 0.8rem">Jun 29, 2014</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-7 text-end">
                                <div class="row">
                                    <div class="col pe-0 text-end">
                                        <p style="color: black; font-size: 0.8rem"><i class="far fa-thumbs-down me-1"></i>304K</p>
                                    </div>
                                    <div class="col pe-0 text-center">
                                        <p style="color: black; font-size: 0.8rem"><i class="far fa-thumbs-up me-1"></i>2K</p>
                                    </div>
                                    <div class="col pe-0 text-end">
                                        <p style="color: black; font-size: 0.8rem"><i class="fas fa-share me-1"></i>SHARE</p>
                                    </div>
                                    <div class="col text-end">
                                        <p style="color: black; font-size: 0.8rem"><i class="far fa-thumbs-up me-1"></i>SAVE</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12" style="padding-right: 10px;">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Assumenda temporibus, nesciunt, veniam facilis fugit odio suscipit accusamus, eaque laboriosam obcaecati vel aliquam eius dolorem consequatur perferendis inventore ratione rem voluptatibus ipsum dignissimos quia! Inventore error, similique est natus illo distinctio. Quia commodi iste optio eum ut dolore hic, natus quasi, fuga ipsum pariatur saepe velit laudantium animi. Eius id maxime magni commodi illo blanditiis, consequatur repudiandae asperiores quis, doloremque culpa. Cupiditate explicabo dolores magni tempore velit et voluptates aspernatur hic. Asperiores ut, voluptatem enim quasi necessitatibus nesciunt aut voluptatibus cumque eos architecto similique corporis vel ad repellendus doloremque inventore facilis, recusandae odio. Dolores id ducimus assumenda voluptate a vero molestias commodi nobis iusto, iure excepturi officiis architecto itaque velit, totam sit magni. Hic, illo quisquam? Nam suscipit quidem, eius voluptate dolorum temporibus! Aliquid pariatur, tenetur numquam similique excepturi corrupti maiores temporibus officia dolorem necessitatibus! Neque illum quasi animi! Ab minus inventore fugit! Quaerat magni aspernatur quos laudantium provident? Quam corporis atque voluptatem eos numquam, ipsa pariatur enim sunt officiis cumque dolor aperiam et nostrum, aut non omnis minima doloribus est minus eveniet iure distinctio quas? Possimus quae labore asperiores laudantium commodi architecto magni nam ratione et id tempore quisquam dolorem quam aliquid impedit deserunt velit corporis, distinctio atque dolore enim perspiciatis quaerat saepe exercitationem! Porro error, eligendi voluptate rerum, harum expedita saepe dicta, quasi adipisci iste vel! Non earum, et illo suscipit, dolore sint fuga asperiores, ipsum eos minus explicabo voluptatibus aperiam. Quidem aliquam illo ipsa nisi similique dolore, cumque veritatis consectetur ducimus vitae ipsum magnam repellat totam quibusdam tempore natus, quia soluta est aliquid accusamus, adipisci modi delectus et. Molestias, dolorum? Error exercitationem magnam alias. Dolore, aliquid illum! Iste repudiandae quod vitae adipisci magnam, cumque culpa voluptates officia odit blanditiis esse, id corrupti enim! Ut aliquam cum dolore unde quis molestias similique accusamus voluptatem, dolores iusto nemo modi non, dignissimos aliquid iure soluta cumque rerum, ea error eveniet odit voluptates. Minus voluptatibus reiciendis similique perferendis, at quaerat sit tenetur voluptatem labore id consequuntur doloribus dolores temporibus illo placeat nobis laboriosam fugiat autem ipsum quasi numquam consequatur. Architecto, quaerat cumque perferendis, veniam ea cupiditate nobis omnis tempora voluptates, illo aspernatur ipsa quibusdam quos ad enim ratione nam vero? Officia, voluptatibus nulla dolorum enim natus doloribus ducimus at labore vitae earum adipisci quia cum aliquam repudiandae vero tenetur? Quidem labore perspiciatis voluptate illum quaerat id numquam assumenda, sequi, molestiae magnam rerum.</p>
                    </div>
                </div>
            </div>

            <div class="col-3 right">
                <div class="row mb-3">
                    <div class="col-6 pe-0">
                        <img src="{{ url('img/frontend/index/1.png') }}" alt="" class="img-fluid w-100" style="height: 5rem; object-fit: cover;">
                    </div>
                    <div class="col-6">
                        <h6 class="fw-bolder" style="font-size: 0.8rem;">Bendetta Caretta collection | Bendetta collection</h6>
                        <p style="font-size: 0.8rem;">Carmelo Benilla Jr</p>
                        <p style="font-size: 0.7rem;">1.1 M views  2 months ago</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-6 pe-0">
                        <img src="{{ url('img/frontend/index/2.png') }}" alt="" class="img-fluid w-100" style="height: 4rem; object-fit: cover;">
                    </div>
                    <div class="col-6">
                        <h6 class="fw-bolder" style="font-size: 0.8rem;">Bendetta Caretta collection | Bendetta collection</h6>
                        <p style="font-size: 0.8rem;">Carmelo Benilla Jr</p>
                        <p style="font-size: 0.7rem;">1.1 M views  2 months ago</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-6 pe-0">
                        <img src="{{ url('img/frontend/index/3.png') }}" alt="" class="img-fluid w-100" style="height: 5rem; object-fit: cover;">
                    </div>
                    <div class="col-6">
                        <h6 class="fw-bolder" style="font-size: 0.8rem;">Bendetta Caretta collection | Bendetta collection</h6>
                        <p style="font-size: 0.8rem;">Carmelo Benilla Jr</p>
                        <p style="font-size: 0.7rem;">1.1 M views  2 months ago</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-6 pe-0">
                        <img src="{{ url('img/frontend/index/4.png') }}" alt="" class="img-fluid w-100" style="height: 5rem; object-fit: cover;">
                    </div>
                    <div class="col-6">
                        <h6 class="fw-bolder" style="font-size: 0.8rem;">Bendetta Caretta collection | Bendetta collection</h6>
                        <p style="font-size: 0.8rem;">Carmelo Benilla Jr</p>
                        <p style="font-size: 0.7rem;">1.1 M views  2 months ago</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-6 pe-0">
                        <img src="{{ url('img/frontend/index/5.png') }}" alt="" class="img-fluid w-100" style="height: 5rem; object-fit: cover;">
                    </div>
                    <div class="col-6">
                        <h6 class="fw-bolder" style="font-size: 0.8rem;">Bendetta Caretta collection | Bendetta collection</h6>
                        <p style="font-size: 0.8rem;">Carmelo Benilla Jr</p>
                        <p style="font-size: 0.7rem;">1.1 M views  2 months ago</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-6 pe-0">
                        <img src="{{ url('img/frontend/index/6.png') }}" alt="" class="img-fluid w-100" style="height: 5rem; object-fit: cover;">
                    </div>
                    <div class="col-6">
                        <h6 class="fw-bolder" style="font-size: 0.8rem;">Bendetta Caretta collection | Bendetta collection</h6>
                        <p style="font-size: 0.8rem;">Carmelo Benilla Jr</p>
                        <p style="font-size: 0.7rem;">1.1 M views  2 months ago</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-6 pe-0">
                        <img src="{{ url('img/frontend/index/7.png') }}" alt="" class="img-fluid w-100" style="height: 5rem; object-fit: cover;">
                    </div>
                    <div class="col-6">
                        <h6 class="fw-bolder" style="font-size: 0.8rem;">Bendetta Caretta collection | Bendetta collection</h6>
                        <p style="font-size: 0.8rem;">Carmelo Benilla Jr</p>
                        <p style="font-size: 0.7rem;">1.1 M views  2 months ago</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="properties" style="margin-top: 5rem;">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-4">
                    <form>
                        <div class="input-group">
                            <button type="submit" class="btn text-white" style="background-color : #35495E; border-top-left-radius: 35px; border-bottom-left-radius: 35px;"><i class="fas fa-search"></i></button>
                        
                            <input type="text" name="search_keyword" class="form-control p-3" aria-label="search" data-bs-toggle="modal" data-bs-target="#exampleModal" placeholder="Search" style="border-top-right-radius: 35px; border-bottom-right-radius: 35px;">
                        </div>
                    </form>
                </div>

                <div class="col-2">
                    <form>
                        <div class="input-group">
                            <input type="text" name="search_keyword" class="form-control p-3" aria-label="search" data-bs-toggle="modal" data-bs-target="#exampleModal" placeholder="Filters" style="border-top-left-radius: 35px; border-bottom-left-radius: 35px;">
 
                            <button type="submit" class="btn text-white" style="background-color : #35495E; border-top-right-radius: 35px; border-bottom-right-radius: 35px;"><img src="{{ url('img/frontend/index/filter.png') }}" alt="" style="height: 1rem;"></button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row mt-5 mb-4">
                <div class="col-3">
                    <div class="card custom-shadow">
                        <img src="{{ url('img/frontend/index/1.png') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">$450, 000</h5>
                            <p>4 Bed Semidetached house</p>
                            <p>541, Rosewood place,</p>
                            <p>Colombo, Sri Lanka</p>
                            <p>3<i class="fas fa-bed ms-2 me-3"></i> 5<i class="fas fa-bath ms-2"></i></p>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card custom-shadow">
                        <img src="{{ url('img/frontend/index/2.png') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">$450, 000</h5>
                            <p>4 Bed Semidetached house</p>
                            <p>541, Rosewood place,</p>
                            <p>Colombo, Sri Lanka</p>
                            <p>3<i class="fas fa-bed ms-2 me-3"></i> 5<i class="fas fa-bath ms-2"></i></p>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card custom-shadow">
                        <img src="{{ url('img/frontend/index/3.png') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">$450, 000</h5>
                            <p>4 Bed Semidetached house</p>
                            <p>541, Rosewood place,</p>
                            <p>Colombo, Sri Lanka</p>
                            <p>3<i class="fas fa-bed ms-2 me-3"></i> 5<i class="fas fa-bath ms-2"></i></p>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card custom-shadow">
                        <img src="{{ url('img/frontend/index/ad_1.png') }}" alt="" class="img-fluid w-100" style="height: 19.2rem; object-fit: cover;">
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-3">
                    <div class="card custom-shadow">
                        <img src="{{ url('img/frontend/index/4.png') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">$450, 000</h5>
                            <p>4 Bed Semidetached house</p>
                            <p>541, Rosewood place,</p>
                            <p>Colombo, Sri Lanka</p>
                            <p>3<i class="fas fa-bed ms-2 me-3"></i> 5<i class="fas fa-bath ms-2"></i></p>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card custom-shadow">
                        <img src="{{ url('img/frontend/index/5.png') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">$450, 000</h5>
                            <p>4 Bed Semidetached house</p>
                            <p>541, Rosewood place,</p>
                            <p>Colombo, Sri Lanka</p>
                            <p>3<i class="fas fa-bed ms-2 me-3"></i> 5<i class="fas fa-bath ms-2"></i></p>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card custom-shadow">
                        <img src="{{ url('img/frontend/index/6.png') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">$450, 000</h5>
                            <p>4 Bed Semidetached house</p>
                            <p>541, Rosewood place,</p>
                            <p>Colombo, Sri Lanka</p>
                            <p>3<i class="fas fa-bed ms-2 me-3"></i> 5<i class="fas fa-bath ms-2"></i></p>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card custom-shadow">
                        <img src="{{ url('img/frontend/index/ad_2.png') }}" alt="" class="img-fluid w-100" style="height: 19.2rem; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container social" style="margin-top: 5rem; margin-bottom: 5rem;">
        <div class="row justify-content-center align-items-center mb-5">
            <div class="col-1 text-center">
                <a href="#" target="_blank"><i class="fab fa-facebook-square"></i></a>
            </div>
            <div class="col-1 text-center">
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
            <div class="col-1 text-center">
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
            <div class="col-1 text-center">
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="col-1 text-center">
                <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>

        <div class="row">
            <div class="col-3 fb">
                <div class="card" style="height: 25rem;">
                    <img src="{{ url('img/frontend/index/social_1.png') }}" class="img-fluid w-100" alt="..." style="object-fit: cover; height: 13rem;">
                    <div class="card-body p-2">
                        <p class="card-text mb-1" style="font-size: 0.8rem;">We're giving away 100,000,000 $Shib to 5 random people (20,000,000 each)Money bag RocketFollow Me! Gem stoneRetweet and Like. Open handsComment #SHIBARMY  ⚠followers only giveaway⚠ #BTC  #ETH #Giveaway #ADA</p>
                        
                        <div class="row justify-content-between mt-3 align-items-center">
                            <div class="col-5">
                                <p style="color: #55ACEE; font-size: 0.8rem">7 minutes ago</p>
                            </div>
                            <div class="col-5 text-end">
                                <img src="{{ url('img/frontend/index/fb_color.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

         
            <div class="col-3 twitter">
                <div class="card" style="height: 25rem;">
                    <img src="{{ url('img/frontend/index/social_2.png') }}" class="card-img-top" alt="..." style="object-fit: cover; height: 13rem;">
                    <div class="card-body p-2">
                        <p class="card-text mb-1" style="font-size: 0.8rem;">We're giving away 100,000,000 $Shib to 5 random people (20,000,000 each)Money bag RocketFollow Me! Gem stoneRetweet and Like. Open handsComment #SHIBARMY  ⚠followers only giveaway⚠ #BTC  #ETH #Giveaway #ADA</p>
                        
                        <div class="row justify-content-between mt-3 align-items-center">
                            <div class="col-5">
                                <p style="color: #55ACEE; font-size: 0.8rem">7 minutes ago</p>
                            </div>
                            <div class="col-5 text-end">
                                <img src="{{ url('img/frontend/index/twitter_color.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        
            <div class="col-3">
                <div class="card" style="height: 25rem;">
                    <img src="{{ url('img/frontend/index/social_3.png') }}" class="card-img-top" alt="..." style="object-fit: cover; height: 13rem;">
                    <div class="card-body p-2">
                        <p class="card-text mb-1" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 5; /* number of lines to show */-webkit-box-orient: vertical;height: 130px; font-size: 0.8rem;">We're giving away 100,000,000 $Shib to 5 random people (20,000,000 each)Money bag RocketFollow Me! Gem stoneRetweet and Like. Open handsComment #SHIBARMY  ⚠followers only giveaway⚠ #BTC  #ETH #Giveaway #ADA</p>
                        
                        <div class="row justify-content-between mt-3 align-items-center">
                            <div class="col-5">
                                <p style="color: #55ACEE; font-size: 0.8rem">7 minutes ago</p>
                            </div>
                            <div class="col-5 text-end">
                                <a href="#" style="color: #0F9D58; font-size: 1.1rem;">Blogs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="card" style="height: 25rem;">
                    <img src="{{ url('img/frontend/index/social_4.png') }}" class="card-img-top" alt="..." style="object-fit: cover; height: 13rem;">
                    <div class="card-body p-2">
                        <p class="card-text mb-1" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 5; /* number of lines to show */-webkit-box-orient: vertical;height: 130px; font-size: 0.8rem;">We're giving away 100,000,000 $Shib to 5 random people (20,000,000 each)Money bag RocketFollow Me! Gem stoneRetweet and Like. Open handsComment #SHIBARMY  ⚠followers only giveaway⚠ #BTC  #ETH #Giveaway #ADA</p>

                        <div class="row justify-content-between mt-3 align-items-center">
                            <div class="col-5">
                                <p style="color: #55ACEE; font-size: 0.8rem">7 minutes ago</p>
                            </div>
                            <div class="col-5 text-end">
                                <a href="#" style="color: #FF0000; font-size: 1.1rem;">News</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
