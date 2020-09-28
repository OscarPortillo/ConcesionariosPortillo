@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <!-- Card -->
                <div class="card card-cascade wider reverse">
                  <!-- Card image -->
                  <div class="view view-cascade overlay">
                    <img class="card-img-top" src="/images/oscar.jpg"
                      alt="Card image cap">
                    <a href="#!">
                      <div class="mask rgba-white-slight"></div>
                    </a>
                  </div>
                  <div class="card-body card-body-cascade text-center">
                    <h4 class="card-title"><strong>Oscar Portillo</strong></h4>
                    <h6 class="font-weight-bold indigo-text py-2">Programador JR</h6>
                    <!-- Text -->
                    <p class="card-text">“Por mucho tiempo me intrigó cómo algo tan caro, tan de punta, puede ser tan inútil. Y entonces se me ocurrió que una computadora es una máquina estúpida con la habilidad de hacer cosas increíblemente inteligentes, mientras que los informáticos son gente inteligente con la capacidad de hacer cosas increíblemente estúpidas. Son, en definitiva, una combinación perfecta.”
                    -  Bill Bryson
                    </p>
                    <!-- Redes sociales -->
                    <a class="px-2 fa-lg li-ic" href="https://www.linkedin.com/in/oscar-portillo-herrera-5a4a611a6/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <a class="px-2 fa-lg tw-ic" href="https://twitter.com/oscar_9414" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a class="px-2 fa-lg fb-ic" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>

                  </div>

                </div>
                <!-- Card -->
            </div>
        </div>
    </div>
</div>
@endsection
