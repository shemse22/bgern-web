<div class="max-w-3xl mx-auto bg-white rounded-3xl shadow-xl p-6 space-y-6">


<h1 class="text-3xl font-bold text-center text-gray-900">
Word Counter
</h1>


<p class="text-center text-gray-500">
Count words, characters, sentences and reading time instantly
</p>



<textarea
id="text-input"
rows="10"
placeholder="Start typing or paste your text here..."
class="
w-full
border
border-gray-300
rounded-2xl
p-5
resize-none
focus:ring-2
focus:ring-indigo-500
outline-none
text-gray-800
"></textarea>




<div class="flex gap-3">


<button
onclick="clearText()"
class="
flex-1
bg-gray-200
hover:bg-gray-300
rounded-xl
py-3
font-medium">

Clear

</button>



<button
onclick="copyText()"
class="
flex-1
bg-indigo-600
hover:bg-indigo-700
text-white
rounded-xl
py-3
font-medium">

Copy

</button>


</div>




<div class="grid grid-cols-2 md:grid-cols-4 gap-4">


<div class="bg-indigo-50 rounded-xl p-4 text-center">

<p class="text-sm text-gray-500">
Words
</p>

<b id="word-count"
class="text-2xl text-indigo-600">
0
</b>

</div>



<div class="bg-gray-100 rounded-xl p-4 text-center">

<p class="text-sm text-gray-500">
Characters
</p>

<b id="char-count"
class="text-2xl">
0
</b>

</div>



<div class="bg-gray-100 rounded-xl p-4 text-center">

<p class="text-sm text-gray-500">
Sentences
</p>

<b id="sentence-count"
class="text-2xl">
0
</b>

</div>




<div class="bg-green-50 rounded-xl p-4 text-center">

<p class="text-sm text-gray-500">
Reading Time
</p>

<b id="reading-time"
class="text-2xl text-green-600">
0 min
</b>

</div>


</div>





<div class="grid grid-cols-2 gap-4">


<div class="bg-gray-50 rounded-xl p-4">


<p class="text-sm text-gray-500">
Characters Without Spaces
</p>


<b id="no-space">
0
</b>


</div>



<div class="bg-gray-50 rounded-xl p-4">


<p class="text-sm text-gray-500">
Paragraphs
</p>


<b id="paragraphs">
0
</b>


</div>



</div>



<button
onclick="downloadText()"
class="
w-full
bg-green-600
hover:bg-green-700
text-white
py-3
rounded-xl
font-semibold">

Download TXT

</button>


</div>




<script>


const input =
document.getElementById("text-input");


input.addEventListener(
"input",
updateCounter
);



function updateCounter(){


const text=input.value;



const words=
text.trim()
?
text.trim().split(/\s+/).length
:
0;



const chars=
text.length;



const noSpace=
text.replace(/\s/g,"").length;



const sentences=
(text.match(/[.!?]+/g)||[])
.length;



const paragraphs=
text.trim()
?
text.split(/\n+/).length
:
0;



const reading=
words
?
Math.ceil(words/200)
:
0;



document.getElementById("word-count")
.textContent=
words;



document.getElementById("char-count")
.textContent=
chars;



document.getElementById("no-space")
.textContent=
noSpace;



document.getElementById("sentence-count")
.textContent=
sentences;



document.getElementById("paragraphs")
.textContent=
paragraphs;



document.getElementById("reading-time")
.textContent=
reading+" min";


}





function clearText(){

input.value="";

updateCounter();

}




function copyText(){


navigator.clipboard.writeText(
input.value
);


alert("Copied!");

}




function downloadText(){


const blob=
new Blob(
[input.value],
{
type:"text/plain"
}
);



const url=
URL.createObjectURL(blob);



const a=
document.createElement("a");


a.href=url;


a.download=
"text.txt";


a.click();


}


</script>