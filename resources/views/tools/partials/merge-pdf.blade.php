<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>


<div class="max-w-xl mx-auto bg-white rounded-3xl shadow-xl p-6 space-y-6">


<h1 class="text-3xl font-bold text-center text-gray-900">
PDF Merger
</h1>


<p class="text-center text-gray-500">
Combine multiple PDF files into one document
</p>



<label id="drop-area"
class="
block
border-2
border-dashed
border-indigo-300
rounded-3xl
p-10
text-center
cursor-pointer
hover:bg-indigo-50
transition
">


<svg class="w-14 h-14 mx-auto text-indigo-500 mb-4"
fill="none"
stroke="currentColor"
viewBox="0 0 24 24">

<path
stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>

</svg>


<p class="font-semibold text-gray-700">
Drop PDF files here
</p>


<p class="text-sm text-gray-400">
or click to select files
</p>



<input 
id="pdf-input"
type="file"
multiple
accept="application/pdf"
class="hidden">


</label>




<div id="info"
class="hidden bg-indigo-50 rounded-xl p-4 text-center">

<span id="pdf-count">
0
</span>
PDF files selected

</div>




<div id="file-list"
class="space-y-2">
</div>




<button
id="merge-btn"
disabled
class="
w-full
bg-indigo-600
hover:bg-indigo-700
disabled:opacity-40
text-white
py-3
rounded-xl
font-semibold">

Merge PDFs

</button>




<a
id="download"
class="
hidden
block
text-center
bg-green-600
text-white
py-3
rounded-xl
font-semibold">

Download Merged PDF

</a>



<p id="status"
class="text-center text-sm text-gray-500">

</p>



<p class="text-center text-xs text-gray-400">
🔒 Your files are processed locally in your browser
</p>


</div>






<script>


let selectedPdfs=[];



const input=
document.getElementById("pdf-input");


const drop=
document.getElementById("drop-area");


const list=
document.getElementById("file-list");



input.onchange=e=>{

addFiles(
Array.from(e.target.files)
);

};




drop.ondragover=e=>{

e.preventDefault();

drop.classList.add("bg-indigo-50");

};



drop.ondrop=e=>{

e.preventDefault();

addFiles(
Array.from(e.dataTransfer.files)
);

};





function addFiles(files){


files.forEach(file=>{


if(file.type==="application/pdf"){

selectedPdfs.push(file);

}


});


renderFiles();


}





function renderFiles(){


list.innerHTML="";


selectedPdfs.forEach((file,index)=>{


let item=document.createElement("div");


item.className=
"flex justify-between items-center bg-gray-100 rounded-xl p-3";



item.innerHTML=`

<div>

<p class="font-medium text-gray-700">
${file.name}
</p>

<p class="text-xs text-gray-500">
${formatBytes(file.size)}
</p>

</div>


<button
onclick="removeFile(${index})"
class="text-red-500 font-bold">

×

</button>

`;



list.appendChild(item);



});



document
.getElementById("pdf-count")
.textContent=
selectedPdfs.length;



document
.getElementById("info")
.classList
.toggle(
"hidden",
selectedPdfs.length===0
);



document
.getElementById("merge-btn")
.disabled=
selectedPdfs.length<2;


}





function removeFile(index){

selectedPdfs.splice(index,1);

renderFiles();

}





document
.getElementById("merge-btn")
.onclick=
async()=>{


const status=
document.getElementById("status");


status.textContent=
"Merging PDFs...";



try{


const {PDFDocument}=PDFLib;


const merged=
await PDFDocument.create();



for(
let file of selectedPdfs
){


const bytes=
await file.arrayBuffer();



const pdf=
await PDFDocument.load(bytes);



const pages=
await merged.copyPages(
pdf,
pdf.getPageIndices()
);



pages.forEach(
page=>merged.addPage(page)
);



}




const output=
await merged.save();



const blob=
new Blob(
[output],
{
type:"application/pdf"
}
);



const url=
URL.createObjectURL(blob);



const download=
document.getElementById("download");


download.href=url;


download.download=
"merged-document.pdf";


download.classList.remove("hidden");



status.textContent=
"PDF merged successfully!";


}

catch(error){

status.textContent=
"Error merging PDF";

console.error(error);

}


};






function formatBytes(bytes){


if(bytes<1024)
return bytes+" B";


if(bytes<1024*1024)
return(
bytes/1024
).toFixed(1)+" KB";


return(
bytes/1024/1024
).toFixed(2)+" MB";


}


</script>