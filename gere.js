  
   let gard_day = document.getElementById('gard_day');
   console.log(gard_day) ;
// console.log(a, b ,c, d,e,f);

let arr = [];
function add(id){
   let st = document.getElementById(id);
   
   console.log(st);
    if(!arr.includes(id)){
         arr.push(id);
         console.log(arr);
         
        console.log('var') ;
        
        let arry = '['+arr+']';
        gard_day.value = arry ;
        st.style.background = 'rgb(129, 248, 25)';

    // console.log(arr.indexOf(id));
 
}else{
    for(let i=0 ; i<arr.length ;i++  ){
        // console.log(arr[i]);
        if(arr[i]==id){
            console.log(i);
            arr.splice(i,1);
            console.log(arr);
             let arry = '[';
            gard_day.value = arry ;
            st.style.background = '';
        }
    }
        
}
}


