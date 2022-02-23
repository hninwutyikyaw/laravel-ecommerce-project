<link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">
<style>
    .myButton {
		border-radius:28px;
		display:inline-block;
		color:#ffffff;
		font-size:15px;
		padding:8px 15px;
		text-decoration:none;
		text-shadow:0px 1px 0px #2f6627;
		margin-top: 2rem;
		display: flex;
    float: right;
    margin-bottom: 2%;
	}

.noUi-connects {
  width: 300px;
  margin: 0 auto;
}
.noUi-base{
  width:300px;
  margin: 0 auto;
}

.noUi-target{
  width: 300px;
  margin: 0 auto;
}

.noUi-connect {
  background: #333;
}
.noUi-tooltip{
  background-size: 30px;
  background-image: url("/img/frontend/icons8-marker-100.png");
  background-repeat: no-repeat;	
  border: 0px;
  background-position: center;
  background-color: rgba(255, 255, 255, 0);
  padding-bottom: 50px;
  margin-bottom: -23px;
}
.noUi-handle{
  width:5px;
  margin-left: 30px;
}
/* handle circle */
.noUi-horizontal .noUi-handle{ 
  width:30px;
  height:30px;
  border-radius: 100%;
}

    </style>
    
<div class="container">
    <h2>Price Range</h2>
    <hr style="height:1px;border:none;color:#333;background-color:#333;" />
    <br>
    <br>
    <br>
    <div class="row">
      <div class="col price-range">
        <form action="{{ url('/allproducts')}}" method="GET" onsubmit="searchItems()">
          <input type="hidden" name="min_price" id="min_price">
          <input type="hidden" name="max_price" id="max_price">
          <div id="slider"></div>
          <input  class="myButton" type="submit" value="Search" >
      </form>	
      </div>
      
    </div>
    
</div>


<script src="{{asset('js/wNumb.min.js')}}"></script>
<script src="{{asset('js/nouislider.min.js')}}"></script>
<script>
var slider = document.getElementById('slider');

noUiSlider.create(slider, {
    start: [10000, 2000000],
	connect: true,
	tooltips: true,
    range: {
        'min': 10000,
        'max': 2000000
	},
	format: wNumb({
        decimals: 0
	}),
	step: 100000
});

window.slider = slider;

function searchItems() {
	let data = slider.noUiSlider.get();

	let min_price = data[0];
	let max_price = data[1];
	
	let min_price_input = document.getElementById('min_price');
	min_price_input.value = min_price;
	
	let max_price_input = document.getElementById('max_price');
	max_price_input.value = max_price;

}

</script>
