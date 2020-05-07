@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h5 class="card-title">ALGUNAS MARCAS DISPONIBLES</h5></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="w3-content w3-display-container">
                        <div class="mySlides primero">
                            <h1>NISSAN</h1>
                            <img  src="/images/nissan.jpg">
                        </div>
                        <div class="mySlides">
                            <h1>PORSCHE</h1>
                            <img src="/images/porsche.jpg">
                        </div>
                        <div class="mySlides">
                            <h1>CHEVROLET</h1>
                            <img src="/images/chevrolet.jpg">
                        </div>
                        <div class="mySlides">
                            <h1>BMW</h1>
                            <img src="/images/BMW.jpg">
                        </div>
                        <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" id="bontonesSlider">
                            <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
                            <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
                            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
                            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
                            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
                            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(4)"></span>
                        </div>
                    </div>
                    <a class="css-boton boton-primario" href="/coche">Ver catálogo.</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!--https://www.w3schools.com/w3css/tryit.asp?filename=tryw3css_slideshow_self/////////////MODIFICAR PARA SLIDER-->
