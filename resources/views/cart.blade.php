@extends('front.layouts.header')
@section('content')
<style type="text/css">
	li
	{
		list-style-type: none;
	}
	.cf:before, .cf:after {
		content: "\0020";
	  	display: block;
	  	height: 0;
	  	overflow: hidden; 
	}
	.cf:after {clear: both; }
	.cf {zoom: 1; }
	strong{
	  font-weight:900
	}
	.wrap{
	  	width:85%;
	  	max-width:1024px;
	  	margin:0 auto;
	  	padding:100px 0;
	}
	.btn{
	  	display:inline-block;
	  	font-size:.9em;
	  	padding:12px 30px;
	  	background:#ffc21d;
	  	color:#232323;
	  	font-weight:900;
	  	cursor:pointer;
	  	text-transform:uppercase;
	  	font-weight:700;
	  	letter-spacing:2px;
	  	opacity:1;
	  	transition:opacity .3s;
	}
	.btn:hover
	{
		opacity:.8
	}
	.blue-link{
	  	color:#659BAF;
	  	cursor:pointer;
	}
	.blue-link:hover
	{
		color:#223840;
	}
	.cart-header{
	  	border-bottom:1px solid #ccc;
	  	padding-bottom:20px;
	  	position: relative;
	}
	.cart-header .btn
	{
		position:absolute;
	    bottom:10px;
	    right:0;
	}
	.cart-header strong
	{
		font-size:1.8em;
	    position: relative;
	    top:14px;
	    font-weight:400;
	    line-height:1;
	}
	.bonus-products{
	  	border:1px solid #ccc;
	  	border-top:none;
	  	padding:18px;
	  	background:rgba(0,0,0,.05);
	}
	.bonus-products strong
	{
		font-weight:400;
	    color:#888;
	    font-size:.8em;
	}
	.bonus-products strong .bp-toggle
	{
		font-size:.7em;
	    color:blue;
	    cursor:default;
	}
	.cart-table{
	  padding:10px 0 0;
	  border-bottom:1px solid #ccc; 
	}
	.item
	{
	  	border-bottom:1px solid #ccc;
		padding-bottom:10px;
	  	margin-bottom:10px;
	}
	li.item:last-child{
	    border-bottom:none;
	    padding-bottom:0;
	    margin-bottom:0;
	}
	.item-block.ib-info.cf{
	    float:left;
	    width:60%;
	}
	img.product-img
	{
	    float:left;
	    display:block;
	    width:100px;
	    margin-right:15px;
	}
	.ib-info-meta{
	    float:left;
	}
	span.itemno
	{
	    display:block;
	    margin-bottom:3px;
	    color:#888;
	    font-size:.8em;
	}
	span.title
	{
		display:block;
	    margin-bottom:3px
		font-size:1em;
	}
	.styles
	{
	  	border-left:3px solid rgba(0,0,0,.1);
	  	padding-left:5px;
	  	font-size:.8em;
	}
	.styles strong
	{
	    display:inline-block;
	    min-width:70px;
	}
	.blue-link
	{
	    font-size:.8em;
	}
       
    .ib-qty
    {
      width:20%;
      text-align:right;
    }
    .ib-qty input{
        text-align:center;
        font-size:16px;
        border-radius:0;
        outline:none;
        border:1px solid #ccc;
        width:50px;
        height:40px;
        vertical-align:middle;
        color:#555;
    }
    .ib-qty input:focus{
      	border-color:#7BCDE8;
    }
    span.price{
        display:inline-block;
        color:#777;
        margin:0 5px;
    }

    .ib-total-price{
      	width:20%;
      	text-align:right;
      	padding-top:6px;
      	position: relative;
    }
    span.tp-price{
        color:#555;
        font-size:1.4em;
        font-weight:900;          
    }
    .tp-remove{
        font-size:14px;
        margin-left:10px;
        position: relative;
        top:-2px;
        cursor:pointer;
    }
    .tp-remove:hover
    {
    	color:red;
    }

  	.item-foot
  	{
    	padding:0 0 10px 0;
    	margin-top:10px;
    	font-size:.7em;
    }
    .item-foot i{
      position: relative;
      font-size:12px;
    }
    .if-message{
      float:left;
      width:100%;
      margin-bottom:10px;
      color:#777;
    }
    .if-left{
      float:left;
      color:#ccc;
      font-size:115%;
      text-transform:uppercase;
    }
    .if-right{
      float:right;
      color:#ccc;
      padding-top:2px;
      text-transform:uppercase
    }
    .if-status{
      font-weight:900;
      color:#333;
    }
  
	.item .bundle-block
	{
  		padding:0 0 10px  50px;
  		position: relative;
  	}

  	.item .bundle-block ul li
    {
      	position: relative;
      	display:block;
      	width:100%;
      	margin-top:10px;
      	padding-top:5px;
    }
     i.i-down-right-arrow{
        display:block;
        position:absolute;
        left:-30px;
        font-size:12px;
        top:50%;
        margin-top:-6px;
        color:#999;
    }     
    img{
        width:100%;
        max-width:48px;
        display:block;
        float:left;
        margin-right:15px;
    }
    span{
        display:block;
    }
    .bundle-title{
        font-size:.85em;
    }
    .bundle-itemno{
        color:#888;
        font-size:.7em;
    }
	.sub-table
	{
  		margin:20px 0 20px;
  		position: relative;
  	}
  	.copy-block
  	{
    	float:left;  
    	margin-top:60px;
    }
    p
    {
      	font-size:.7em;
      	color:#666;
      	max-width:320px;
      	line-height:1.55;
      	display:block;
    }
      
    .customer-care{
        padding-top:10px;
        margin-top:10px;
        border-top:1px solid #ccc;
    }
    
  	.summary-block
  	{
    	float:right;
    }
    .sb-promo
    {
      border-bottom:1px solid #ccc;
      padding-bottom:10px;
      margin-bottom:10px;
      position: absolute;
      top:0;
      left:0;
      width:320px;
    }
    .btn{
        padding:10px 8px;
        font-size:.8em;

    }  
    ul li{
        margin-bottom:10px;
        font-size:.9em;
        text-align:right;
    }
    span{
      display:inline-block;
    }
    span.sb-label{
      color:#999;
      text-transform:uppercase;
      letter-spacing:1px;
    }
    span.sb-value{
      font-size:1.1em;
      width:120px;
    }
  	.tax-edit
  	{
	    color:#223840;
	    font-size:.8em;
	    font-weight:900;
	    text-transform:capitalize;
	    cursor:pointer;
	}
    .tax i{
      position: relative;
      top:1px;
      left:-3px;
    }
    .te-open i:before
    {
        content: "\edc7";
    }
   	.tax-calculate
   	{
        padding:10px;
        margin-top:10px;
        background:rgba(0,0,0,.05);
        display:none;
    }
    .grand-total{
        border-top:1px solid #ccc;
        padding-top:10px;
        margin-top:10px;
        font-size:1.2em;
        font-weight:900;
    }        
	.cart-footer{
  		border-top:1px solid #ccc;
  		margin-top:15px;
  		padding-top:15px;
  	}
  	.cont-shopping{
    	float:left;
    	font-size:.8em;
    	padding-top:10px;
    	cursor:pointer;
   	}
    
/*@media only screen and (max-width:860px){
  .item-main{
    position: relative;
  }
  .item .item-block.ib-info {
    width: 70%;
  }
  .item .item-block.ib-qty {
    width: 30%;
    text-align: right;
  }  
  .item .item-block.ib-total-price {
    width: auto;
    text-align: right;
    padding-top:0;
    position: absolute;
    top:50px;
    right:0;
  }
  .sub-table .copy-block{
    float:right;
    margin-top:0;
    text-align:right;
    // border-top:1px solid #ccc;
    padding:12px;
    background:rgba(0,0,0,.035);
  }
  .sub-table .summary-block {
    float:none;
    width:100%;
    margin-top:55px;
    .sb-promo{
      position: absolute;
      top: 0;
      left: auto;
      right: 0;
      max-width: 300px;
      text-align: right;
      border-bottom: none;
    }
    
  }
}

@media only screen and (max-width:630px){
  .item .item-block.ib-info {
    float:left;
    width: 100%;
  }
  .item .item-block.ib-qty {
    float:left;
    width:auto;
    margin-top:10px;
  }
  .item .item-block.ib-total-price {
    float:left;
    width:auto;
    position: relative;
    top:13px;
    right:0;
    border-left:1px solid #ccc;
    padding-left:15px;
    margin-left:15px;
  }
  .item .bundle-block{
    display:none;
  }
  .item .item-block.ib-info img.product-img{
    width:70px;
  }
}*/

</style>
<div class="wrap">

  <header class="cart-header cf">
    <strong>Items in Your Cart</strong>
  </header>
  <div class="bonus-products">
    <strong>Products<span class="bp-toggle"></span></strong>
    
  </div>
  <div class="cart-table">
    <ul>

<!-- begin simple product -->
      <li class="item">
        <div class="item-main cf">
          <div class="item-block ib-info cf">
            <img class="product-img" src="http://fakeimg.pl/150/e5e5e5/adadad/?text=IMG" />
            <div class="ib-info-meta">
              <span class="title">Drink Up Nalgene Water Bottle</span>
            </div>
          </div>
          <div class="item-block ib-total-price">
            <span class="tp-price">$75.00</span>
            <span class="tp-remove"><i class="i-cancel-circle"></i></span>
          </div>         
        </div>
      </li>
<!-- end simple product -->

<!-- end bundle product -->
    </ul>
  </div>
  <div class="sub-table cf">
    <div class="summary-block">
              
      <ul>
        <li class="subtotal"><span class="sb-label">Subtotal</span><span class="sb-value">$25.99</span></li>
        <li class="shipping"><span class="sb-label">Shipping</span><span class="sb-value">n/a</span></li>
        <li class="tax"><span class="sb-label">Est. Tax | <span class="tax-edit">edit <i class="i-notch-down"></i></span></span><span class="sb-value">$5.00</span></li>
        <li class="tax-calculate"><input type="text" value="06484" class="tax" /><span class="btn">Calculate</span></li>
        <li class="grand-total"><span class="sb-label">Total</span><span class="sb-value">$120.99</span></li>
      </ul>
    </div>
      
  </div>
  
  <div class="cart-footer cf">
      <span class="btn">Checkout</span>
  </div>
</div>
<script type="text/javascript">
	$( ".tax-edit" ).click(function() {
  $(this).toggleClass('te-open').parent;
  $('.tax-calculate').slideToggle(200);
});

$( ".if-left" ).click(function() {
  $(this).prev('.if-message').slideToggle(200);
});

$( ".bp-toggle" ).click(function() {
  $('.bonus-products').slideToggle(200);
});
</script>
@endsection