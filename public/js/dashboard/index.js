/* 
    ** This code for show the content that is hidden and show it again
    * this occur by  catch all div or ul that have hidden class called (hidd)
      and stor them in array called class_hidd , now i have all div that is hidden
      now i can make a loop on it this array that contain all div and ul 
      then check if the div or ul have hidd class i will remove that class and 
      add a new class called appear and again if i click on this li that now is appear
      will hidden again means toggle between appear and hidden 
*/
// this variable (class_hidd) stor in it all div that have class (.hidd)
let class_hidd = document.querySelectorAll('.hidd'); 
    
for(let i = 0 ; i<class_hidd.length ; i++){
	// when click on the parent of the div or ul i want to show it 
	class_hidd[i].parentElement.onclick = function (){
		// check if the child ( div or ul )have class hidd
		//if true have hidd class will remove it and add class appear
		if(class_hidd[i].classList.contains('hidd')){
			class_hidd[i].classList.remove('hidd');
		    class_hidd[i].classList.add('appear');
		}
		// check if the child (div or ul ) have class appear
		// if true have appear class will remove it and class hidd
		else if(class_hidd[i].classList.contains('appear')){
			class_hidd[i].classList.remove('appear');
		    class_hidd[i].classList.add('hidd');
		}
		// this for for hidden any div that is appear except that you click it now
		for(x = 0 ; x<class_hidd.length; x++){
			if( x == i){
				continue;
			}else{
				class_hidd[x].classList.add('hidd');
				class_hidd[x].classList.remove('appear');
			}
		}
	}
}


// this code using in get the value of the button to calcaulate price
// and get all information about this product
// and this code for add this prodcut to the second div mean product
let buttons = document.getElementsByClassName('btn-primary');
let tbody = document.getElementById('tbody');

 for(let i = 0 ; i < buttons.length ; i++){

 	buttons[i].onclick = function (){
      
 		let id = this.getAttribute('id');
 		let tr = document.createElement('tr');
 		tr.setAttribute('class','remove');
 		tbody.appendChild(tr);
 		this.disabled = true;

 		buttons[i].classList.add('disabled');

 		let ajaxRequest =  new XMLHttpRequest();
          let array = '';
 		 ajaxRequest.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        	  array = ajaxRequest.responseText.split(',');
                

             
        	 let dele =  tr.insertCell(-1);
        	 dele.innerHTML = "<div class='btn btn-danger'> <i class='fas fa-trash-alt'></i> </div>";
        	dele.childNodes[0].setAttribute('id', id);
        	let product = tr.insertCell(-1);
        	product.innerHTML = array[1];
        	let amount = tr.insertCell(-1);
        	amount.innerHTML = "<input type='number' min='1' value='1'>";
        	
        	let price = tr.insertCell(-1);
        	price.innerHTML = "<input type='text'>";
        	price.childNodes[0].setAttribute('value', array[2]);
        	
       }
	};

	ajaxRequest.open("Get", "/dashboard/order/calc?id="+this.getAttribute('id'), true);
	ajaxRequest.send();
 		
 	}
 }


// this code for remove product from product side and add it again in category
let remove = document.getElementsByClassName('remove');
setInterval(function(){ 
  for(let x = 0 ; x < remove.length ; x++){
  	// here wrong cause 
	remove[x].onclick = function(){

      
	
       tbody.removeChild(this);
      
       for(let a = 0 ; a < buttons.length ; a++){
       	  // i thing solution in search about this in buttons list
           if(this.childNodes[0].childNodes[0].getAttribute('id') == buttons[a].getAttribute('id')){
           	buttons[x].classList.remove('disabled');
            buttons[x].disabled = false;
           }
       }
       
	
		
		//console.log();
	}
 }
}, 500);
