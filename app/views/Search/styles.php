<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

body{
    background-color: rgb(241, 163, 241) ;
    font-family: arial;
}

.article-container{
    width:900px;
    background-color: rgb(255, 255, 255);
    padding:50px;
}

.article-box{
    padding-bottom: 30px;
    width:100%;
}
input{
    padding: 0px 20px;
    width:300px;
    height:40px;
    font-size: 22px;
}
img{
    padding: 0px 0px;
    width:50px;
    height:50px; 
}
.error{
    color: red;
}
a:hover{
    text-decoration: none;
    text-decoration-color: aqua;
}
@import url('https://fonts.googleapis.com/css?family=Inconsolata:700');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html, body {
  width: 100%;
  height: 100%;
}

body {
  background: #bea9df;
}

.search-box{
  position: absolute;
  top: 50%;
  left: 50%;
  transform : translate(-50%,-50%);
  background: #2f3640;
  height: 60px;
  border-radius : 40px;
  padding: 10px;

}
.search-box:hover> .search-txt{
  width: 300px;
  padding: 0 6px;

}
.search-box:hover> .search-btn{
  background: white;
  height: 40px;
  
}
.search-btn{
  color: #563d7c;
  float: right;
  width: 40px;
  border: none;
  height: 40px;
  border-radius: 50%;
  background: #2f3640;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: 0.6s;

}
.search-txt{
  border: none;
  background: none;
  outline: none;
  float: left;

  color: white;
  font-size: 16px;
  transition: 0.6s;
  line-height: 40px;
  width: 300px;
  padding: 0 6px;

}
#srchNav{
  /* position: absolute; */ */
  top: 100px;
  width: 100%;
  background-color: #563d7c;
}


#noContent{
  background-color: #8e52f0;
  padding: 20px 20px 20px 20px;
  width: 200px;
  position: absolute;
  top: 400px;
  left: 43%;
  color:white;
  text-align: center;
}

.wrapper {
  position: relative;
  overflow: hidden;
}

.colorlib-bubbles {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -1;
}

.colorlib-bubbles li {
  position: absolute;
  list-style: none;
  display: block;
  width: 40px;
  height: 40px;
  background-color: rgba(255, 255, 255, 0.15);
  bottom: -160px;
  -webkit-animation: square 20s infinite;
  -moz-animation: square 250s infinite;
  -o-animation: square 20s infinite;
  -ms-animation: square 20s infinite;
  animation: square 20s infinite;
  -webkit-transition-timing-function: linear;
  -moz-transition-timing-function: linear;
  -o-transition-timing-function: linear;
  -ms-transition-timing-function: linear;
  transition-timing-function: linear;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  -o-border-radius: 50%;
  -ms-border-radius: 50%;
  border-radius: 50%;
}

.colorlib-bubbles li:nth-child(1) {
  left: 10%;
}

.colorlib-bubbles li:nth-child(2) {
  left: 20%;
  width: 80px;
  height: 80px;
  -webkit-animation-delay: 2s;
  -moz-animation-delay: 2s;
  -o-animation-delay: 2s;
  -ms-animation-delay: 2s;
  animation-delay: 2s;
  -webkit-animation-duration: 17s;
  -moz-animation-duration: 17s;
  -o-animation-duration: 17s;
  animation-duration: 17s;
}

.colorlib-bubbles li:nth-child(3) {
  left: 25%;
  -webkit-animation-delay: 4s;
  -moz-animation-delay: 4s;
  -o-animation-delay: 4s;
  -ms-animation-delay: 4s;
  animation-delay: 4s;
}

.colorlib-bubbles li:nth-child(4) {
  left: 40%;
  width: 60px;
  height: 60px;
  -webkit-animation-duration: 22s;
  -moz-animation-duration: 22s;
  -o-animation-duration: 22s;
  -ms-animation-duration: 22s;
  animation-duration: 22s;
  background-color: rgba(255, 255, 255, 0.25);
}

.colorlib-bubbles li:nth-child(5) {
  left: 70%;
}

.colorlib-bubbles li:nth-child(6) {
  left: 80%;
  width: 120px;
  height: 120px;
  -webkit-animation-delay: 3s;
  -moz-animation-delay: 3s;
  -o-animation-delay: 3s;
  -ms-animation-delay: 3s;
  animation-delay: 3s;
  background-color: rgba(255, 255, 255, 0.2);
}

.colorlib-bubbles li:nth-child(7) {
  left: 32%;
  width: 160px;
  height: 160px;
  -webkit-animation-delay: 7s;
  -moz-animation-delay: 7s;
  -o-animation-delay: 7s;
  -ms-animation-delay: 7s;
  animation-delay: 7s;
}

.colorlib-bubbles li:nth-child(8) {
  left: 55%;
  width: 20px;
  height: 20px;
  -webkit-animation-delay: 15s;
  -moz-animation-delay: 15s;
  animation-delay: 15s;
  -webkit-animation-duration: 40s;
  -moz-animation-duration: 40s;
  animation-duration: 40s;
}

.colorlib-bubbles li:nth-child(9) {
  left: 25%;
  width: 10px;
  height: 10px;
  -webkit-animation-delay: 2s;
  animation-delay: 2s;
  -webkit-animation-duration: 40s;
  animation-duration: 40s;
  background-color: rgba(255, 255, 255, 0.3);
}

.colorlib-bubbles li:nth-child(10) {
  left: 90%;
  width: 160px;
  height: 160px;
  -webkit-animation-delay: 11s;
  animation-delay: 11s;
}


@-webkit-keyframes square {
  0% {
    -webkit-transform: translateY(0);
    -moz-transform: translateY(0);
    -o-transform: translateY(0);
    -ms-transform: translateY(0);
    transform: translateY(0);
  }

  100% {
    -webkit-transform: translateY(-700px) rotate(600deg);
    -moz-transform: translateY(-700px) rotate(600deg);
    -o-transform: translateY(-700px) rotate(600deg);
    -ms-transform: translateY(-700px) rotate(600deg);
    transform: translateY(-700px) rotate(600deg);
  }
}

@keyframes square {
  0% {
    -webkit-transform: translateY(0);
    -moz-transform: translateY(0);
    -o-transform: translateY(0);
    -ms-transform: translateY(0);
    transform: translateY(0);
  }

  100% {
    -webkit-transform: translateY(-700px) rotate(600deg);
    -moz-transform: translateY(-700px) rotate(600deg);
    -o-transform: translateY(-700px) rotate(600deg);
    -ms-transform: translateY(-700px) rotate(600deg);
    transform: translateY(-700px) rotate(600deg);
  }
}
.result{
  position:relative;
  top: 300px;
  padding: 10px 10px 10px 10px;
  left:-1000px;
}



</style>

