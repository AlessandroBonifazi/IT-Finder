<template>
<div class="container d-flex justify-content-start p-0">
  
    <div class="d-flex justify-content-center stars px-3">

        <input name="stars" type="radio" id="stars1" value="1" />
        <label for="stars1"></label>
    
        <input name="stars" type="radio" id="stars2" value="2" />
        <label for="stars2"></label>
    
        <input name="stars" type="radio" id="stars3" value="3" />
        <label for="stars3"></label>
    
        <input name="stars" type="radio" id="stars4" value="4" />
        <label for="stars4"></label>
    
        <input name="stars" type="radio" id="stars5" value="5" checked />
        <label for="stars5"></label>
    </div>
 
</div>
  
</template>

<script>
export default {
    name: 'StarsComponent'
}
</script>

<style>
.stars{
  font-size: 12px;
}
.stars input[name="stars"]{
   display: none; 
  }
.stars input[name="stars"] + label:after{
   content: none; 
  }
.stars input[name="stars"] + label{
   font-family: 'FontAwesome'; 
  }
.stars input[name="stars"] + label:before{

    background-color: transparent;
    border: none;
    color: #ffc107;
    content: '\f005';
    font-size: 1.3em;
    transition: none;
}
.stars input[name="stars"]:checked ~ label:before{

    background-color: transparent;
    border: none;
    color: #607d8b;
}
.stars input[name="stars"]:checked + label:before{
   color: #ffc107; 
  }
.stars input[name="stars"] + label:hover ~ input + label:before{
   opacity: 0.3; 
  }
</style>