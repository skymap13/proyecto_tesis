<div class="mdslider">
	<ul class="navigation">
		<li><a href="#" id="md_slider_nav_prew"><i class="fa-solid fa-chevron-left"></i></a></li>

		<li><a href="#" id="md_slider_nav_next"><i class="fa-solid fa-chevron-right"></i></a></li>
	</ul>
	@foreach($slider as $slider)

	<div class="md-slider-item">
	    <div class="row">
	        <div class="col-md-7">
	        	<div class="content">
	        		<div class="cinside">
	        			{!! html_entity_decode($slider->content) !!}
	        		</div>
	        	</div>
	        </div>
	        <div class="col-md-5">
	            <img src="{{ url('/uploads/'.$slider->file_path.'/'.$slider->file_name) }} " class="img-fluid">
	        </div>

	    </div>       
	</div>

	@endforeach
</div>

