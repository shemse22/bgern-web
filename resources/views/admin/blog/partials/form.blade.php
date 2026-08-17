@php 
    $post = $post ?? null; 
@endphp

<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">

<div class="space-y-8">

{{-- BASIC INFORMATION --}}
<div class="bg-white rounded-2xl shadow-sm border p-6 space-y-5">

    <h2 class="text-xl font-bold text-gray-800">
        📝 Post Information
    </h2>

    <div>
        <label class="font-medium text-sm">
            Title
        </label>

        <input 
            id="title-input"
            type="text"
            name="title"
            value="{{ old('title',$post->title ?? '') }}"
            class="w-full mt-2 rounded-xl border-gray-300 focus:ring-indigo-500"
            placeholder="Enter article title"
        >

        @error('title')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
        @enderror

    </div>

    <div>
        <label class="font-medium text-sm">
            Slug
        </label>

        <input 
            id="slug-input"
            type="text"
            name="slug"
            value="{{ old('slug',$post->slug ?? '') }}"
            class="w-full mt-2 rounded-xl border-gray-300 focus:ring-indigo-500"
            placeholder="post-url-slug"
        >

        @error('slug')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
        @enderror

    </div>

    <div class="grid md:grid-cols-2 gap-5">

        <div>

            <label class="font-medium text-sm">
                Meta Title
            </label>

            <input
            id="meta-title"
            type="text"
            name="meta_title"
            value="{{ old('meta_title',$post->meta_title ?? '') }}"
            class="w-full mt-2 rounded-xl border-gray-300"
            >

            <p class="text-xs text-gray-500 mt-1">
                <span id="meta-title-count">0</span>/60 characters
            </p>

        </div>

        <div>

            <label class="font-medium text-sm">
                Meta Description
            </label>

            <textarea
            id="meta-description"
            name="meta_description"
            rows="3"
            class="w-full mt-2 rounded-xl border-gray-300"
            >{{old('meta_description',$post->meta_description ?? '')}}</textarea>

            <p class="text-xs text-gray-500 mt-1">
                <span id="meta-desc-count">0</span>/160 characters
            </p>

        </div>

    </div>

</div>

{{-- MEDIA --}}
<div class="bg-white rounded-2xl shadow-sm border p-6">

<h2 class="text-xl font-bold mb-5">
🖼 Thumbnail
</h2>

@if($post?->thumbnail)

<img 
src="{{asset('storage/'.$post->thumbnail)}}"
class="w-40 h-40 rounded-xl object-cover mb-4"
/>

@endif

<input
type="file"
name="thumbnail"
accept="image/*"
class="
w-full
border
rounded-xl
p-3
">

@error('thumbnail')
<p class="text-red-500 text-sm mt-1">
    {{ $message }}
</p>
@enderror

</div>

{{-- EXCERPT --}}

<div class="bg-white rounded-2xl shadow-sm border p-6">

<label class="font-semibold">
Short Description
</label>

<textarea
name="excerpt"
rows="4"
class="w-full mt-3 rounded-xl border-gray-300"
placeholder="Article summary..."
>{{old('excerpt',$post->excerpt ?? '')}}</textarea>

</div>

{{-- EDITOR --}}

<div class="bg-white rounded-2xl shadow-sm border p-6">

<div class="flex justify-between items-center mb-4">

<h2 class="text-xl font-bold">
✍️ Content Editor
</h2>

<div class="flex gap-4 text-sm text-gray-500">

<span id="word-count">
0 words
</span>

<span id="reading-time">
0 min read
</span>

<button
type="button"
id="fullscreen-btn"
class="
text-indigo-600
font-semibold">

Fullscreen

</button>

</div>

</div>

<div id="editor-wrapper">

<div 
id="quill-editor"
class="bg-white"
style="height:500px">

{!!old('body',$post->body ?? '')!!}

</div>

</div>

<textarea 
name="body"
id="body-input"
class="hidden"></textarea>

@error('body')
<p class="text-red-500 text-sm mt-1">
    {{ $message }}
</p>
@enderror

</div>

{{-- STATUS --}}

<div class="bg-white rounded-2xl border p-6">

<label class="flex items-center gap-3">

<input

type="checkbox"

name="is_published"

value="1"

{{old('is_published',$post->is_published ?? true)
?'checked':''}}

class="rounded text-indigo-600"

>

<span>
Publish article
</span>

</label>

</div>

<div id="seo-score-container"></div>

</div>

<style>

#editor-wrapper.fullscreen{

position:fixed;

inset:0;

background:white;

z-index:9999;

padding:30px;

}

#editor-wrapper.fullscreen 
#quill-editor{

height:calc(100vh - 150px)!important;

}

.ql-editor{

font-size:18px;

line-height:1.8;

}

.ql-hr {
    border: none;
    border-top: 2px solid #e5e7eb;
    margin: 1em 0;
}

body.dark {
    background: #111827;
    color: #e5e7eb;
}
body.dark .bg-white {
    background: #1f2937 !important;
    border-color: #374151 !important;
    color: #e5e7eb;
}
body.dark input,
body.dark textarea {
    background: #111827 !important;
    color: #e5e7eb !important;
    border-color: #374151 !important;
}
body.dark .text-gray-800,
body.dark .text-gray-500,
body.dark label {
    color: #e5e7eb !important;
}
body.dark .ql-toolbar {
    background: #1f2937 !important;
    filter: invert(1) hue-rotate(180deg);
}
body.dark .ql-editor {
    background: #111827 !important;
    color: #e5e7eb !important;
}
body.dark #seo-score-container .bg-gray-50 {
    background: #1f2937 !important;
    color: #e5e7eb;
}

</style>

<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

<script>

const BlockEmbed = Quill.import('blots/block/embed');
class HrBlot extends BlockEmbed {}
HrBlot.blotName = 'hr';
HrBlot.tagName = 'hr';
HrBlot.className = 'ql-hr';
Quill.register(HrBlot, true);

const quill = new Quill('#quill-editor',{

theme:'snow',

modules:{

toolbar:{
    container: [
        [{ header:[1,2,3,4,5,6,false] }],
        ['font'],
        [{ size:['small', false, 'large', 'huge'] }],
        ['bold','italic','underline','strike'],
        [{ color:[] }, { background:[] }],
        [{ script:'sub' }, { script:'super' }],
        [{ align:[] }],
        [{ list:'ordered' }, { list:'bullet' }, { list:'check' }],
        [{ indent:'-1' }, { indent:'+1' }],
        ['blockquote','code-block'],
        ['link','image','video'],
        ['hr-button'],
        ['undo-button','redo-button'],
        ['clean']
    ],
    handlers: {
        'hr-button': function () {
            const range = quill.getSelection(true);
            quill.insertEmbed(range.index, 'hr', true, 'user');
            quill.setSelection(range.index + 1, 0, 'user');
        },
        'undo-button': function () { quill.history.undo(); },
        'redo-button': function () { quill.history.redo(); }
    }
}

}

});

const hrBtn = document.querySelector('.ql-hr-button');
if (hrBtn) hrBtn.innerHTML = '&mdash;';
const undoBtn = document.querySelector('.ql-undo-button');
if (undoBtn) undoBtn.innerHTML = '&#8630;';
const redoBtn = document.querySelector('.ql-redo-button');
if (redoBtn) redoBtn.innerHTML = '&#8631;';

quill
.getModule('toolbar')
.addHandler(
'image',
()=>{

let input=document.createElement('input');

input.type='file';

input.accept='image/*';

input.click();

input.onchange=async()=>{

let file=input.files[0];

let form=new FormData();

form.append('image', file);

form.append('_token', document.querySelector('input[name="_token"]').value);

let res=await fetch(
'{{route("admin.blog.upload-image")}}',
{
method:'POST',
headers: { 'Accept': 'application/json' },
body:form
}
);

if (!res.ok) {
    const errText = await res.text();
    console.error('Image upload failed:', res.status, errText);
    alert('Image upload failed (status ' + res.status + ').');
    return;
}

let data=await res.json();

if(data.url){

let range=quill.getSelection(true);

quill.insertEmbed(range.index, 'image', data.url);

}

};

}

);

function updateStats(){

let text=quill.getText().trim();

let words=text? text.split(/\s+/).length: 0;

document.getElementById('word-count').innerHTML= words+" words";

document.getElementById('reading-time').innerHTML= Math.ceil(words/200)+" min read";

}

quill.on('text-change', updateStats);

updateStats();

document.getElementById('fullscreen-btn').onclick=()=>{

document.getElementById('editor-wrapper').classList.toggle('fullscreen');

};

let slugChanged=false;

document.getElementById('slug-input').oninput=()=>{ slugChanged=true; };

document.getElementById('title-input').oninput=e=>{

if(slugChanged) return;

document.getElementById('slug-input').value=
e.target.value.toLowerCase().trim().replace(/[^a-z0-9]+/g,'-');

};

document.getElementById('meta-title').oninput=e=>{
document.getElementById('meta-title-count').innerText= e.target.value.length;
};

document.getElementById('meta-description').oninput=e=>{
document.getElementById('meta-desc-count').innerText= e.target.value.length;
};

document.querySelector('form').addEventListener('submit', ()=>{
document.getElementById('body-input').value= quill.root.innerHTML;
});

const draftKey = 'blog_draft_' + (document.getElementById('slug-input').value || 'new');

const editorArea = document.querySelector('#quill-editor');

editorArea.addEventListener('dragover', (e)=>{
e.preventDefault();
editorArea.classList.add('border-2','border-indigo-500');
});

editorArea.addEventListener('dragleave', ()=>{
editorArea.classList.remove('border-2','border-indigo-500');
});

editorArea.addEventListener('drop', async(e)=>{
e.preventDefault();
editorArea.classList.remove('border-2','border-indigo-500');
let file = e.dataTransfer.files[0];
if(file && file.type.startsWith('image/')){ uploadImage(file); }
});

document.querySelector('#quill-editor').addEventListener('paste', (e)=>{
let items = e.clipboardData.items;
for(let item of items){
if(item.type.includes('image')){
e.preventDefault();
let file = item.getAsFile();
uploadImage(file);
}
}
});

async function uploadImage(file){

let form = new FormData();
form.append('image', file);
form.append('_token', document.querySelector('input[name="_token"]').value);

let response = await fetch(
'{{route("admin.blog.upload-image")}}',
{
method:'POST',
headers: { 'Accept': 'application/json' },
body:form
}
);

if (!response.ok) {
    const errText = await response.text();
    console.error('Image upload failed:', response.status, errText);
    alert('Image upload failed (status ' + response.status + ').');
    return;
}

let data = await response.json();

if(data.url){
let range = quill.getSelection(true);
quill.insertEmbed(range.index, 'image', data.url);
}

}

let saveStatus = document.createElement('div');

saveStatus.className = `fixed bottom-5 right-5 bg-gray-900 text-white px-5 py-3 rounded-xl text-sm hidden`;

document.body.appendChild(saveStatus);

function autoSave(){

let draft={
title: document.getElementById('title-input').value,
body: quill.root.innerHTML,
excerpt: document.querySelector('[name="excerpt"]').value
};

localStorage.setItem(draftKey, JSON.stringify(draft));

saveStatus.innerHTML = '✓ Draft saved';
saveStatus.classList.remove('hidden');

setTimeout(()=>{ saveStatus.classList.add('hidden'); },2000);

}

setInterval(autoSave, 30000);

window.addEventListener('load', ()=>{

let draft = localStorage.getItem(draftKey);

if(draft){

draft = JSON.parse(draft);

if(confirm('Restore previous draft?')){
document.getElementById('title-input').value = draft.title;
quill.root.innerHTML = draft.body;
document.querySelector('[name="excerpt"]').value = draft.excerpt;
}

}

});

let seoBox = document.createElement('div');

seoBox.className = `bg-gray-50 rounded-xl p-5 space-y-2`;

seoBox.innerHTML=`
<h3 class="font-bold text-lg">SEO Score</h3>
<div id="seo-score" class="text-3xl font-bold text-indigo-600">0/100</div>
<ul id="seo-checks" class="text-sm space-y-1"></ul>
`;

document.getElementById('seo-score-container').appendChild(seoBox);

function checkSEO(){

let score=0;
let checks=[];

let title = document.getElementById('title-input').value;
let meta = document.getElementById('meta-description').value;
let text = quill.getText();

if(title.length>30){ score+=20; checks.push('✅ Good title length'); }
else{ checks.push('⚠ Improve title length'); }

if(meta.length>120){ score+=20; checks.push('✅ Good meta description'); }
else{ checks.push('⚠ Meta description too short'); }

if(text.split(/\s+/).length>500){ score+=25; checks.push('✅ Good article length'); }
else{ checks.push('⚠ Add more content'); }

if(quill.root.querySelectorAll('h2').length){ score+=15; checks.push('✅ Uses headings'); }
else{ checks.push('⚠ Add H2 headings'); }

if(quill.root.querySelectorAll('img').length){ score+=20; checks.push('✅ Images included'); }
else{ checks.push('⚠ Add images'); }

document.getElementById('seo-score').innerHTML = score+'/100';
document.getElementById('seo-checks').innerHTML = checks.map(x=>`<li>${x}</li>`).join('');

}

quill.on('text-change', checkSEO);

document.querySelectorAll('input,textarea').forEach(el=>{
el.addEventListener('input', checkSEO);
});

checkSEO();

document.addEventListener('keydown', (e)=>{

if((e.ctrlKey || e.metaKey) && e.key==='s'){
e.preventDefault();
autoSave();
}

if(e.key==='F11'){
e.preventDefault();
document.getElementById('editor-wrapper').classList.toggle('fullscreen');
}

});

let darkButton = document.createElement('button');

darkButton.innerHTML = '🌙 Dark Mode';

darkButton.className = `px-4 py-2 rounded-lg bg-gray-800 text-white text-sm`;

document.querySelector('#fullscreen-btn').parentElement.appendChild(darkButton);

darkButton.onclick=()=>{ document.body.classList.toggle('dark'); };

</script>