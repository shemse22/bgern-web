<div class="max-w-3xl mx-auto bg-white rounded-3xl shadow-xl p-6 space-y-6">


<h1 class="text-3xl font-bold text-center text-gray-900">
Case Converter
</h1>


<p class="text-center text-gray-500">
Convert your text into different formats instantly
</p>



<textarea
id="case-input"
rows="8"
placeholder="Type or paste your text here..."
class="
w-full
border
border-gray-300
rounded-2xl
p-5
outline-none
focus:ring-2
focus:ring-indigo-500
resize-none">
</textarea>




<div class="grid grid-cols-2 md:grid-cols-4 gap-3">


<button onclick="convertCase('upper')"
class="btn">
UPPERCASE
</button>


<button onclick="convertCase('lower')"
class="btn">
lowercase
</button>


<button onclick="convertCase('title')"
class="btn">
Title Case
</button>


<button onclick="convertCase('sentence')"
class="btn">
Sentence
</button>


<button onclick="convertCase('capitalize')"
class="btn">
Capitalize
</button>


<button onclick="convertCase('alternate')"
class="btn">
aLtErNaTe
</button>


<button onclick="convertCase('inverse')"
class="btn">
InVeRsE
</button>


<button onclick="removeSpaces()"
class="btn">
Clean Spaces
</button>


</div>





<div class="flex gap-3">


<button onclick="copyText()"
class="
flex-1
bg-green-600
text-white
rounded-xl
py-3">

Copy

</button>



<button onclick="clearText()"
class="
flex-1
bg-gray-200
rounded-xl
py-3">

Clear

</button>


</div>





<div class="
bg-gray-50
rounded-xl
p-4
flex
justify-between
text-sm">


<div>
Words:
<b id="words">0</b>
</div>


<div>
Characters:
<b id="chars">0</b>
</div>


</div>





<button onclick="downloadText()"
class="
w-full
bg-indigo-600
hover:bg-indigo-700
text-white
py-3
rounded-xl
font-semibold">

Download TXT

</button>


</div>





<script>


const input=
document.getElementById("case-input");



input.addEventListener(
"input",
updateStats
);




function convertCase(type){


let text=input.value;



switch(type){


case "upper":

input.value=
text.toUpperCase();

break;



case "lower":

input.value=
text.toLowerCase();

break;



case "title":

input.value=
text.toLowerCase()
.replace(/\b\w/g,
c=>c.toUpperCase());

break;



case "sentence":

input.value=
text.toLowerCase()
.replace(
/(^\s*\w|[.!?]\s*\w)/g,
c=>c.toUpperCase()
);

break;




case "capitalize":

input.value=
text.replace(
/\w\S*/g,
w=>
w.charAt(0)
.toUpperCase()
+
w.slice(1)
.toLowerCase()
);

break;




case "alternate":

input.value=
[...text]
.map((c,i)=>
i%2?
c.toLowerCase():
c.toUpperCase()
)
.join("");

break;




case "inverse":

input.value=
[...text]
.map(c=>
c===c.toUpperCase()
?
c.toLowerCase()
:
c.toUpperCase()
)
.join("");

break;


}


updateStats();


}






function removeSpaces(){

input.value=
input.value
.replace(/\s+/g," ")
.trim();


updateStats();

}





function updateStats(){


let text=
input.value.trim();



document.getElementById("words")
.textContent=
text?
text.split(/\s+/).length:
0;



document.getElementById("chars")
.textContent=
input.value.length;


}





function copyText(){


navigator.clipboard.writeText(
input.value
);


alert("Copied!");

}




function clearText(){

input.value="";

updateStats();

}





function downloadText(){


let blob=
new Blob(
[input.value],
{
type:"text/plain"
}
);


let url=
URL.createObjectURL(blob);


let a=
document.createElement("a");


a.href=url;


a.download=
"text.txt";


a.click();


}


</script>



<style>

.btn{

background:#4f46e5;
color:white;
padding:10px;
border-radius:12px;
font-size:14px;
font-weight:600;
transition:.2s;

}


.btn:hover{

background:#4338ca;

}

</style>