<div class="section4">
    <h3>Te presentamos articulos sobre vacunación y sus beneficios para la salud.</h3>
    <div class="container mt-4">
        <div class="row section4-row">
            <div class="col-lg-2"></div>
            <div class="d-flex align-items-start flex-column bd-highlight mb-3 section4-card card1 d-flex container col-lg-3 col-md-12">
                <div class="paraph mb-auto p-2">
                    <span><img class="section4-rows-icon" src={{$cards['card1']['icon']}} alt=""></span>
                    <h4>{{$cards['card1']['h4']}}</h4>
                    <p>{{$cards['card1']['p']}}</p>
                </div>

                <a href={{$cards["card2"]['a']['url']}} class="  btn btn-rounded btn-warning text-light">Conoce más</a>
            </div>
            <div class="d-flex align-items-start flex-column bd-highlight mb-3 section4-card card2 container col-lg-5 col-md-12">
                <div class="paraph mb-auto p-2">
                    <span><img class="section4-rows-icon" src={{$cards["card2"]['icon']}} alt=""></span>
                    <h4>{{$cards['card2']['h4']}}</h4>
                    <p>{{$cards['card2']['p']}}</p>
                </div>
                <a  href={{$cards["card2"]['a']['url']}} class="btn btn-rounded btn-warning text-light">{{$cards["card2"]['a']['text']}}</a>
            </div>
            <div class="col-lg-2"></div>

        </div>
    </div>
</div>
<img class="section4-girl" src="images/girl_purple.png" alt="">
