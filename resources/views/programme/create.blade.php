<x-app-layout>
<style>
            .container-images {
        padding: 35px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border-radius: 15px;
        background: #ffffff;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        -webkit-border-radius: 15px;
        -moz-border-radius: 15px;
        -ms-border-radius: 15px;
        -o-border-radius: 15px;
    }

    #select-image {
        display: none;
    }

    label {
        display: flex;
        align-items: center;
        background: #025bee;
        padding: 18px 30px;
        color: #ffffff;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        -ms-border-radius: 5px;
        -o-border-radius: 5px;
    }

    label svg {
        fill: #ffffff;
        width: 20px;
        height: 20px;
        margin-right: 8px;
    }

    .preview_image p {
        text-align: center;
    }

    #images {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .image_box {
        width: 30%;
    }

    img {
        height: 80px;
    }

    .image_name {
        display: block;
        font-size: 14px;
        text-align: center;
    }
</style>
@if($errors->all())

@foreach($errors->all() as $error)
<div class="alert alert-danger alert-dismissible" role="alert">
{{ $error }}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endforeach
@endif
<form action="{{route('event-programme',$event_id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">

    <div class="col col-md-8 col-xl-8 container-images">
        <!-- Input element to choose images -->
        <input name="images[]" type="file" id="select-image" accept="image/*" multiple>
        <label for="select-image">
            <?xml version="1.0" ?><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M1344 1472q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm256 0q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm128-224v320q0 40-28 68t-68 28h-1472q-40 0-68-28t-28-68v-320q0-40 28-68t68-28h427q21 56 70.5 92t110.5 36h256q61 0 110.5-36t70.5-92h427q40 0 68 28t28 68zm-325-648q-17 40-59 40h-256v448q0 26-19 45t-45 19h-256q-26 0-45-19t-19-45v-448h-256q-42 0-59-40-17-39 14-69l448-448q18-19 45-19t45 19l448 448q31 30 14 69z" />
            </svg>
            choisir des images
        </label>
    
        <div class="preview_image">
            <!-- It will show the total number of files selected -->
            <p><span id="total-images">0</span> images(s) sélectionné</p>
    
            <!-- All images will display inside this div -->
            <div id="images"></div>
        </div>
    </div>
    <div class="col col-md-4 col-xl-4">
        <a href="{{route('event-programme-show',$event_id)}}" class="btn btn-secondary">retourner</a>
        <button class="btn btn-primary">Ajouter Programes</button>
    </div>
</div>
</form>
<script>
    const fileInput = document.getElementById('select-image');
const images = document.getElementById('images');
const totalImages = document.getElementById('total-images');

// Listen to the change event on the <input> element
fileInput.addEventListener('change', (event) => {
    // Get the selected image file
    const imageFiles = event.target.files;

    // Show the number of images selected
    totalImages.innerText = imageFiles.length;

    // Empty the images div
    images.innerHTML = '';

    if (imageFiles.length > 0) {
        // Loop through all the selected images
        for (const imageFile of imageFiles) {
            const reader = new FileReader();

            // Convert each image file to a string
            reader.readAsDataURL(imageFile);

            // FileReader will emit the load event when the data URL is ready
            // Access the string using reader.result inside the callback function
            reader.addEventListener('load', () => {
                // Create new <img> element and add it to the DOM
                images.insertAdjacentHTML('beforeend',`
                <div class="image_box">
                    <img src='${reader.result}'>
                    <span class='image_name'>${imageFile.name}</span>
                </div>
            `);
            });
        }
    } else {
        // Empty the images div
        images.innerHTML = '';
    }
});
</script>
</x-app-layout>