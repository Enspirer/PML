@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@push('after-styles')
    <link href="{{ url('css/contact_us.css') }}" rel="stylesheet">
@endpush

@section('content')
    
    <div class="container" >
        <div class="row align-items-center" style="padding:200px 0 150px 0">
            <div class="col-6">
                @if($post_details->type == 'article')
                    <img src="{{url( uploaded_asset($post_details->feature_image) )}}" class="img-fluid w-100" style="object-fit: cover; height: 25rem; "/>
                @else
                    <input type="hidden" value="{{ preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $post_details->youtube, $defaultmatch) }}" />
                    
                    <div id="ytb" youtubeid="{{$defaultmatch[0]}}">
                    </div>

                    <div class="col-sm-12 p-0">
                        <div class="video-content-box p-30 pt-0">
                            <div id="youtubeplayer">
                                <!--<iframe width="560" height="315" src="" frameborder="0" allowfullscreen></iframe>-->
                                <iframe width="100%" height="400" src="https://www.youtube.com/embed/{{ $defaultmatch[0] }}?rel=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-6 ps-5">
                <h3 class="fw-bolder" style="color: #E84C4C">{{$post_details->title}}</h3>
                <p>
                  @if($post_details->category == null)
                  @else
                    {{ App\Models\Category::where('id',$post_details->category)->first()->name }}
                  @endif
                </p>
                
                <div class="mt-3 mb-4">
                    @if($post_details->type == 'article')
                        <div class="" style="color: rgb(0, 0, 0, 0.6); font-size: 0.8rem;"><p>{!! $post_details->article !!}</p></div>
                    @else
                        <div class="" style="color: rgb(0, 0, 0, 0.6); font-size: 0.8rem;"><p>{{ $post_details->description }}</p></div>
                    @endif
                </div>
                
            </div>
        </div>
    </div>

@endsection

@push('after-scripts')
    


    
@endpush