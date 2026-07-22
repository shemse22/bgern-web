<div class="max-w-xl mx-auto bg-white rounded-3xl shadow-xl p-6 space-y-6">


<h1 class="text-3xl font-bold text-center text-gray-900">
    Age Calculator
</h1>


<p class="text-center text-gray-500">
    Calculate your exact age in years, months and days
</p>



<div>

<label class="block font-medium text-gray-700 mb-2">
Date of Birth
</label>


<input 
type="date"
id="dob-input"
class="
w-full
border
border-gray-300
rounded-xl
p-3
focus:ring-2
focus:ring-indigo-500
outline-none
">


</div>




<button
onclick="calculateAge()"
class="
w-full
bg-indigo-600
hover:bg-indigo-700
text-white
py-3
rounded-xl
font-semibold
transition">

Calculate Age

</button>




<div id="age-result"
class="hidden space-y-4">


<div class="
bg-indigo-50
rounded-2xl
p-5
text-center">

<p class="text-gray-500">
Your Age
</p>


<div class="text-3xl font-bold text-indigo-600">

<span id="years">0</span> Years
<span id="months">0</span> Months
<span id="days">0</span> Days

</div>

</div>





<div class="grid grid-cols-2 gap-4">


<div class="bg-gray-100 rounded-xl p-4 text-center">

<p class="text-sm text-gray-500">
Total Days
</p>

<b id="total-days">
0
</b>

</div>



<div class="bg-gray-100 rounded-xl p-4 text-center">

<p class="text-sm text-gray-500">
Total Weeks
</p>

<b id="total-weeks">
0
</b>

</div>




<div class="bg-gray-100 rounded-xl p-4 text-center">

<p class="text-sm text-gray-500">
Total Hours
</p>

<b id="total-hours">
0
</b>

</div>



<div class="bg-gray-100 rounded-xl p-4 text-center">

<p class="text-sm text-gray-500">
Born On
</p>

<b id="birth-day">
-
</b>

</div>



</div>





<div class="
bg-green-50
rounded-xl
p-4
text-center">

<p class="text-gray-600">
Next Birthday
</p>

<b id="birthday-count">
-
</b>


</div>



</div>



</div>




<script>


function calculateAge(){


const input =
document.getElementById("dob-input").value;


if(!input){

alert("Please select your birthday");

return;

}



const birth =
new Date(input);



const today =
new Date();



let years =
today.getFullYear()-birth.getFullYear();


let months =
today.getMonth()-birth.getMonth();


let days =
today.getDate()-birth.getDate();




if(days<0){

months--;

let previousMonth =
new Date(
today.getFullYear(),
today.getMonth(),
0
);

days += previousMonth.getDate();

}



if(months<0){

years--;

months +=12;

}




document.getElementById("years")
.innerHTML=years;


document.getElementById("months")
.innerHTML=months;


document.getElementById("days")
.innerHTML=days;




let difference =
today-birth;


let totalDays =
Math.floor(
difference/(1000*60*60*24)
);



document.getElementById("total-days")
.innerHTML=
totalDays.toLocaleString();



document.getElementById("total-weeks")
.innerHTML=
Math.floor(totalDays/7)
.toLocaleString();



document.getElementById("total-hours")
.innerHTML=
(totalDays*24)
.toLocaleString();





let weekday =
birth.toLocaleDateString(
"en-US",
{
weekday:"long"
}
);


document.getElementById("birth-day")
.innerHTML=
weekday;




// Next Birthday


let nextBirthday =
new Date(
today.getFullYear(),
birth.getMonth(),
birth.getDate()
);



if(nextBirthday < today){

nextBirthday.setFullYear(
today.getFullYear()+1
);

}



let remaining =
Math.ceil(
(nextBirthday-today)
/
(1000*60*60*24)
);



document.getElementById("birthday-count")
.innerHTML=
remaining+
" days left";





document
.getElementById("age-result")
.classList
.remove("hidden");


}



</script>