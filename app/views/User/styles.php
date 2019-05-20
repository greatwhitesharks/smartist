<style>

.product-details{
    opacity: 0;
    transition: opacity 1s;
}

.product-item:hover .product-details{
    opacity: 1;
 
}

.modal{
    background-color:rgba(0,0,0,0.8);
}


.lbl-rate{
	color:gray;
	cursor:pointer;
}

input.radio-rate{
 position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

#rating-container{
display:flex;
flex-direction:row-reverse;
justify-content: center;
margin:0 auto;
min-width:120px;
}

input.radio-rate:checked ~ .lbl-rate, .lbl-rate:hover, .lbl-rate:hover ~.lbl-rate{
	color:goldenrod;    
}



</style>