let wilaya = document.getElementById('wilaya');
let commun = document.getElementById('commun');
let get_pharm = document.getElementById('get_pharm');
console.log(wilaya) ;
console.log(commun) ;
console.log(get_pharm) ;
// if(wilaya.value != ''){
//     console.log(wilaya.value) ;
// } 
// let val = wilaya.value ;
// console.log(val);
if(navigator.geolocation){
    navigator.geolocation.getCurrentPosition(function(position){
console.log(position);
    },
    function(error){
        console.log(error);
    }
    
    )
}