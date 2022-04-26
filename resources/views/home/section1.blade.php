<div id="carouselExampleCaptions" class="carousel slide mt-5" data-bs-ride="carousel">
    
    <div class="carousel-inner">
        @foreach ($images as $index => $image)
            <div class="carousel-item @if($index == 0) active @endif" >
                <img src="{{ asset($image['path']) }}" class="d-block w-100 " style="height: 100vh" alt="...">
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
