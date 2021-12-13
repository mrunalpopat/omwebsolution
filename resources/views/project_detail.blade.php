@extends('front.layouts.header')
@section('content')


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 --><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 
<?php 
$userdata = Session::get('userdata');
?>

@if ($message = Session::get('success'))
  <div class="alert alert-success">
    <strong>{{ $message }}</strong>
  </div>
@endif

@if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<div class="outer">
  <div class="center-wrapper">
    <div class="container content">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-6 shoe-slider">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <?php $imageData = json_decode($getData->images, true);
              foreach ($imageData as $key => $img_value) {?>

              <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}" class="active">

                <img src="{{asset('uploads/').'/'.$imageData[$key]}}" class="d-block w-100" alt="...">
              </li>
              <?php }?>
            </ol>
            <div class="carousel-inner">
              <?php $imageData = json_decode($getData->images, true); 
              foreach ($imageData as $key => $img_value) {?>
                <div class="carousel-item @if($key == 0) active @endif">
                  <img src="{{asset('uploads/').'/'.$imageData[$key]}}" class="d-block w-100" alt="...">
                </div>
              <?php }?>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>

              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a> 
            </div> 
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 shoe-content">
          <div class="text1">
            <span>{{$getData->name}}</span>
          </div>
          <div class="text2">
            ₹ {{$getData->price}}
          </div>
          <div class="text4">
            TECHNOLOGY : <span class="text5">{{$getData->technology}}</span>
          </div>
          <div class="text4">
            Can be Used : <span class="text5">{{$getData->can_be_used}}</span>
          </div> 

          <div class="text4">
            Modules:
          </div> 
          <div class="text5">
            {{$getData->modules}}
          </div>
                
          <div class="text4">
            DESCRIPTION:
          </div> 
          <div class="text5">
            {{$getData->description}}
          </div> 
          <div class="btn-wrapper">
            <span class="btn">Add to Cart <i class="fa fa-shopping-cart"></i></span> 
            <span class="qantity">
                  <!-- <div>
                      <i class="fas fa-minus"></i>
                      <span class="one">1</span>
                      <i class="fas fa-plus"></i>
                  </div> -->
              <div class="btn">Add to Wishlist <i class="fa fa-heart-o"></i></div>
            </span> 
          </div> 
        </div>
      </div>
    </div>
  </div> 
</div>

<div class="container">
  <div class="row">
    <div class="section-title">
      <h3><span>Latest Project</span></h3>
    </div>
    @foreach($latestData as $data1)
    <?php $imageData = json_decode($data1->images, true); ?>
      <div class="product-card">
        <a href="{{route('projectDetail',$data1->id)}}">
        <div class="badge">Latest</div>
        <div class="product-tumb">
          <img src="{{asset('uploads/').'/'.$imageData[0]}}" alt="">
        </div>
        <div class="product-details">
          <h4><a href="">{{$data1->name}}</a></h4>
          <div class="product-bottom-details">
            <div class="product-price">₹ {{$data1->price}}</div>
              <div class="product-links">
                <a href=""><i class="fa fa-heart"></i></a>
                <a href=""><i class="fa fa-shopping-cart"></i></a>
              </div>
            </div>
          </div>
        </a>
      </div>
    @endforeach
  </div>
</div>

<div class="container">
  <br>
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" @if(!empty($userdata)) data-target="#myModal @else data-target="#login-modal @endif">Ask Question</button>
</div>
@if(!empty($userdata))
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Question</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('addfaq')}}" id="addfaq">
                    @csrf
                    <input type="hidden" name="pid" value="{{$pid}}">
                    <input type="hidden" name="uid" value="{{$userdata->id}}">
                    <div class="form-group">
                        <label for="inputName">Question</label>
                        <textarea id="question" name="question" class="form-control" rows="3"></textarea>
                    </div>
                    <br>
                    <input type="submit" value="Add Question" class="btn btn-success float-right">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endif


<div class="container"><br>
  <h3>List of Question & Answer</h3>
  @foreach($faqData as $fdata)
    <label class="accordion-wrapper">
      <input type="checkbox" class="accordion" hidden />
      <div class="title">
        <strong>{{$fdata->question}}</strong>
        <svg viewBox="0 0 256 512" width="12" title="angle-right" class="side-icon" fill="white">
          <path d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z" />
        </svg>
        <svg viewBox="0 0 320 512" height="24" title="angle-down" class="down-icon" fill="white">
          <path d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z" />
        </svg>
      </div>
      <div class="content">
        <p>{{$fdata->answer}}</p>
      </div>
    </label>
  @endforeach
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection