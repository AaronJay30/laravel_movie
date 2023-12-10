
@include('partials.__header', ['title' => '401 Error | Rotten Popcorn'])

<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap');
 * {
	 box-sizing: border-box;
	 margin: 0;
	 pading: 0;
	 position: relative;
}
 body {
	 background-color: #aafbaa;
     display: flex;
     flex-direction: column;
     justify-content: center;
     align-items: center;
	 color: #3d3d3d;
	 font-family: 'Open Sans', sans-serif;
}
 h1 {
	 color: black;
	 font-family: 'Montserrat', sans-serif;
	 font-size: 3.6em;
	 font-weight: lighter;
	 margin: 40px auto;
	 text-align: center;
}
 .container {
	 display: flex;
	 flex-direction: column;
	 justify-content: center;
}
 .container .col {
	 display: flex;
	 flex-direction: column;
	 justify-content: center;
	 text-align: center;
}
 .container .col img {
	 margin: -10px auto 0;
	 width: 20vw;
}
 .container .col h4 {
	 font-size: 1.5em;
	 font-weight: lighter;
	 padding: 10px;
}
 .container .col h5 {
	 font-size: 1.3em;
	 font-weight: lighter;
	 padding: 10px;
}
 .container .col p {
	 font-size: 0.9em;
	 margin: 20px;
}
 .container .col p a {
	 color: #8c8cb4;
	 text-decoration: none;
}
 
</style>
<h1>401 Error</h1>

<div class='container'>
  <div class='col'>
    <h4>Oops, something went wrong.</h4>
    <h5>Invalid credentials.</h5>
    <h3>You are sus :></h3>
  </div>
  <div class='col'>
    <img src="{{asset('img/duck.webp')}}"/>
  </div>
</div>

@include('partials.__footer')