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
  for (var i=0; i < document.f300.t300p.length; i++)
  {
   if (document.f300.t300p[i].checked)
      {
       p1 = document.f300.t300p[i].value;
      }
   }
  
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

// Calculate for 500 RWF

function startCalc500(){
  interval = setInterval("calc500()",1);
}
function calc500(){

  var total = 0;
  var t1 =0;
  var t2 =0;
  var t3 =0;
  var t4 =0;
  var t5 =0;
  s1 = document.f500.t500t1.value;
  s2 = document.f500.t500t2.value;
  if (s1.length==12 && s2.length==12)
  {
    t1=1;
  }
   
  s3= document.f500.t500t3.value;
  s4= document.f500.t500t4.value;
  if (s3.length==12 && s4.length==12)
  {
    t2=1;
  }
 
  s5 = document.f500.t500t5.value;
  s6 = document.f500.t500t6.value;
  if (s5.length==12 && s6.length==12)
  {
    t3=1;
  }
  
  s7 = document.f500.t500t7.value;
  s8 = document.f500.t500t8.value;
  if (s7.length==12 && s8.length==12)
  {
    t4=1;
  }
  
  s9 = document.f500.t500t9.value;
  s10 = document.f500.t500t10.value;
  if (s9.length==12 && s10.length==12)
  {
    t5=1;
  }
 
  total = (s2 * 1) - (s1 * 1) + (s4 * 1) - (s3 * 1) + (s6 * 1) - (s5 * 1) + (s8 * 1) - (s7 * 1) + (s10 * 1) - (s9 * 1) + t1 + t2 + t3 + t4 + t5;

  Display3.innerHTML = total;
  
  Display4.innerHTML = (total / 4);
  
}
function stopCalc500(){
  clearInterval(interval);
}

// Calculate for 1000 RWF

function startCalc1000(){
  interval = setInterval("calc1000()",1);
}
function calc1000(){

  var total = 0;
  var t1 =0;
  var t2 =0;
  var t3 =0;
  var t4 =0;
  var t5 =0;
  s1 = document.f1000.t1000t1.value;
  s2 = document.f1000.t1000t2.value; 
  if (s1.length==12 && s2.length==12)
  {
    t1=1;
  }
  
  s3 = document.f1000.t1000t3.value;
  s4 = document.f1000.t1000t4.value;
  if (s3.length==12 && s4.length==12)
  {
    t2=1;
  }
  
  s5 = document.f1000.t1000t5.value;
  s6 = document.f1000.t1000t6.value;
  if (s5.length==12 && s6.length==12)
  {
    t3=1;
  }
  
  s7 = document.f1000.t1000t7.value;
  s8 = document.f1000.t1000t8.value;
  if (s7.length==12 && s7.length==12)
  {
    t4=1;
   }
 
  s9 = document.f1000.t1000t9.value;
  s10 = document.f1000.t1000t10.value;
  if (s9.length==12 && s10.length==12)
  {
    t5=1;
  }
 
  total = (s2 * 1) - (s1 * 1) + (s4 * 1) - (s3 * 1) + (s6 * 1) - (s5 * 1) + (s8 * 1) - (s7 * 1) + (s10 * 1) - (s9 * 1) + t1 + t2 + t3 + t4 + t5;
  Display5.innerHTML = total;

  Display6.innerHTML = (total / 4);
  
}
function stopCalc1000(){
  clearInterval(interval);
}

// Calculate for 2000 RWF

function startCalc2000(){
  interval = setInterval("calc2000()",1);
}
function calc2000(){

  var total = 0;
  var t1 =0;
  var t2 =0;
  var t3 =0;
  var t4 =0;
  var t5 =0;
  s1 = document.f2000.t2000t1.value;
  s2 = document.f2000.t2000t2.value;
  if (s1.length==12 && s2.length==12)
  {
    t1=1;
  }
   
  s3 = document.f2000.t2000t3.value;
  s4 = document.f2000.t2000t4.value;
  if (s3.length==12 && s4.length==12)
  {
    t2=1;
  }
  
  s5 = document.f2000.t2000t5.value;
  s6 = document.f2000.t2000t6.value;
  if (s5.length==12 && s6.length==12)
  {
    t3=1;
  }
  
  s7 = document.f2000.t2000t7.value;
  s8 = document.f2000.t2000t8.value;
  if (s7.length==12 && s8.length==12)
  {
    t4=1;
   }
  
  s9 = document.f2000.t2000t9.value;
  s10 = document.f2000.t2000t10.value;
  if (s9.length==12 && s10.length==12)
  {
    t5=1;
  }
 
  total = (s2 * 1) - (s1 * 1) + (s4 * 1) - (s3 * 1) + (s6 * 1) - (s5 * 1) + (s8 * 1) - (s7 * 1) + (s10 * 1) - (s9 * 1) + t1 + t2 + t3 + t4 + t5;
  Display7.innerHTML = total;

  Display8.innerHTML = (total / 2);
  
}
function stopCalc2000(){
  clearInterval(interval);
}

// Calculate for 5000 RWF

function startCalc5000(){
  interval = setInterval("calc5000()",1);
}
function calc5000(){

  var total = 0;
  var t1 =0;
  var t2 =0;
  var t3 =0;
  var t4 =0;
  var t5 =0;
  
  s1 = document.f5000.t5000t1.value;
  s2 = document.f5000.t5000t2.value; 
  if (s1.length==12 && s2.length==12)
  {
    t1=1;
  }
 
  s3 = document.f5000.t5000t3.value;
  s4 = document.f5000.t5000t4.value;
  if (s3.length==12 && s4.length==12)
  {
    t2=1;
  }
  
  s5 = document.f5000.t5000t5.value;
  s6 = document.f5000.t5000t6.value;
  if (s5.length==12 && s6.length==12)
  {
    t3=1;
  }
  
  s7 = document.f5000.t5000t7.value;
  s8 = document.f5000.t5000t8.value;
  if (s7.length==12 && s8.length==12)
  {
    t4=1;
  }
  
  s9 = document.f5000.t5000t9.value;
  s10 = document.f5000.t5000t10.value;
  if (s9.length==12 && s10.length==12)
  {
    t5=1;
  }
 
  total = (s2 * 1) - (s1 * 1) + (s4 * 1) - (s3 * 1) + (s6 * 1) - (s5 * 1) + (s8 * 1) - (s7 * 1) + (s10 * 1) - (s9 * 1) + t1 + t2 + t3 + t4 + t5;
  Display9.innerHTML = total;

  Display10.innerHTML = (total / 2);
  
}
function stopCalc5000(){
  clearInterval(interval);
}

// Calculate for 10000 RWF

function startCalc10000(){
  interval = setInterval("calc10000()",1);
}
function calc10000(){

  var total = 0;
  var t1 =0;
  var t2 =0;
  var t3 =0;
  var t4 =0;
  var t5 =0;
  s1 = document.f10000.t10000t1.value;
  s2 = document.f10000.t10000t2.value;
  if (s1.length==12 && s2.length==12)
  {
    t1=1;
  }
   
  s3 = document.f10000.t10000t3.value;
  s4 = document.f10000.t10000t4.value;
  if (s3.length==12 && s4.length==12)
  {
    t2=1;
  }
 
  s5 = document.f10000.t10000t5.value;
  s6 = document.f10000.t10000t6.value;
  if (s5.length==12 && s6.length==12)
  {
    t3=1;
  }
  
  s7 = document.f10000.t10000t7.value;
  s8 = document.f10000.t10000t8.value;
  if (s7.length==12 && s8.length==12)
  {
    t4=1;
  }
  
  s9 = document.f10000.t10000t9.value;
  s10 = document.f10000.t10000t10.value;
  if (s9.length==12 && s10.length==12)
  {
    t5=1;
  }
  
  total = (s2 * 1) - (s1 * 1) + (s4 * 1) - (s3 * 1) + (s6 * 1) - (s5 * 1) + (s8 * 1) - (s7 * 1) + (s10 * 1) - (s9 * 1) + t1 + t2 + t3 + t4 + t5;
  Display11.innerHTML = total;

  Display12.innerHTML = (total / 1);
  
}
function stopCalc10000(){
  clearInterval(interval);
}