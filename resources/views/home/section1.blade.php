<div id="carouselExampleCaptions" class="carousel slide mt-5" data-bs-ride="carousel">
    
    <div class="carousel-inner">
        @foreach ($images as $index => $content)
            <div class="carousel-item active" >
                <img src="{{ asset('images/banner.jpg') }}" class="d-block w-100" alt="...">
            </div>
        @endforeach

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<script>
    
</script>
