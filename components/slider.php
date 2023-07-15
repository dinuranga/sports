<style>
.carousel {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
}

.carousel-inner {
  height: 100%;
}

.carousel-item {
  height: 100%;
}

.carousel-item img {
  object-fit: cover;
  height: 100%;
}

.carousel-caption {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  padding: 3.5rem;
  color: #fff;
  text-align: center;
  background-color: rgba(0, 0, 0, 0.5);
}
.yellow{
    color: yellow;
}
.red{
    color: red;
}
</style>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../assets/img/banner1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption">
        <h1>Badminton Championship</h1>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        <i><h1 class="yellow">SEP 15-OCT 20</h1></i>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../assets/img/banner2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption">
        <h1>Second slide label</h1>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        <i><h1 class="yellow">Wednesday</h1></i>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../assets/img/banner3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption">
        <h1>Third slide label</h1>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        <i><h1 class="yellow">4.00PM-6.30PM</h1></i>
      </div>
    </div>
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