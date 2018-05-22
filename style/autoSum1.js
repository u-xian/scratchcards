// Calculate for 300 RWF

function startCalc300(){
  interval = setInterval("calc300()",1);
}
function calc300(){

  var total = 0;
  var t1 =0;
  var t2 =0;
  var t3 =0;
  var t4 =0;
  var t5 =0;
  var p1 =0;
  var dn=0;
  
  dn =document.f300.denom.value;
  if (dn==1){
  for (var i=0; i < document.f300.t300p.length; i++)
  {
   if (document.f300.t300p[i].checked)
      {
       p1 = document.f300.t300p[i].value;
      }
   }
  }
  else if (dn==2){p1=4;}
  else if (dn==3){p1=4;}
  else if (dn==4){p1=2;}
  else if (dn==5){p1=2;}
  else if (dn==6){p1=1;}
  else{p1=0;}
  s1 = document.f300.t300t1.value;
  s2 = document.f300.t300t2.value; 
  if (s1.length==12 && s2.length==12)
  {
    t1=1;
  }

  s3 = document.f300.t300t3.value;
  s4 = document.f300.t300t4.value;
  if (s3.length==12 && s4.length==12)
  {
    t2=1;
  }
 
  s5 = document.f300.t300t5.value;
  s6 = document.f300.t300t6.value;
  if (s5.length==12 && s6.length==12)
  {
    t3=1;
  }
  
  s7 = document.f300.t300t7.value;
  s8 = document.f300.t300t8.value;
  if (s7.length==12 && s8.length==12)
  {
    t4=1;
  }

  s9 = document.f300.t300t9.value;
  s10 = document.f300.t300t10.value;
  if (s9.length==12 && s10.length==12)
  {
    t5=1;
  }

  total = (s2 * 1) - (s1 * 1) + (s4 * 1) - (s3 * 1) + (s6 * 1) - (s5 * 1) + (s8 * 1) - (s7 * 1) + (s10 * 1) - (s9 * 1) + t1 + t2 + t3 + t4 + t5;
  Display1.innerHTML = total;
  
  Display2.innerHTML = (total / p1);
  
}
function stopCalc300(){
  clearInterval(interval);
}